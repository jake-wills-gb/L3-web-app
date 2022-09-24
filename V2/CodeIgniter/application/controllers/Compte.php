<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}
	public function lister(){
		$data['titre'] = 'Liste des pseudos :';
		$data['pseudos'] = $this->db_model->get_all_compte();
		$this->load->view('templates/haut', $data);
		$this->load->view('compte_liste',$data);
		$this->load->view('templates/bas');
	}
	public function creer(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('mdp', 'mdp', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/haut');
			$this->load->view('compte_creer');
			$this->load->view('templates/bas');
		}
		else{
			$this->db_model->set_compte();
			$this->load->view('templates/haut');
			$this->load->view('compte_succes');
			$this->load->view('templates/bas');
		}
	}
	public function connecter(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('pseudo', 'pseudo', 'required');
		$this->form_validation->set_rules('mdp', 'mdp', 'required');

		if($this->session->userdata("username")!=NULL){
			$this->load->view('templates/haut');
			$this->load->view('compte_menu');
			$this->load->view('templates/bas');
		}
		else{
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/haut');
				$this->load->view('compte_connecter');
				$this->load->view('templates/bas');
			}
			else{
				$username = $this->input->post('pseudo');
				$password = $this->input->post('mdp');
				$status = $this->db_model->status($username);

				if($this->db_model->connect_compte($username, $password)){
					$session_data = array('username' => $username,'status' => $status);
					$this->session->set_userdata($session_data);
					$this->load->view('templates/haut');
					$this->load->view('compte_menu');
					$this->load->view('templates/bas');
				}
				else{
					$this->load->view('templates/haut');
					$this->load->view('compte_connecter');
					$this->load->view('templates/bas');
				}
			}
		}
	}
	public function modif_mdp(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('mdp', 'mdp', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/haut');
			$this->load->view('compte_mdp');
			$this->load->view('templates/bas');
		}
		else{
			$password = $this->input->post('mdp');

			if($this->db_model->modif_mdp($this->session->userdata("username"),$password)){
				$this->load->view('templates/haut');
				$this->load->view('compte_mdp_succes');
				$this->load->view('templates/bas');
			}
			else{
				$this->load->view('templates/haut');
				$this->load->view('compte_mdp');
				$this->load->view('templates/bas');
			}
		}
	}
	public function deconnecter(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		session_destroy();
		$this->load->view('templates/haut');
		$this->load->view('compte_connecter');
		$this->load->view('templates/bas');
	}
}
?>