<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidature extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}
	public function get(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('inscr', 'inscr', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/haut');
			$this->load->view('candidature_get');
			$this->load->view('templates/bas');
		}
		else{
			$data['candidature']=$this->db_model->get_candidature();
			if($data['candidature']){
				$this->load->view('templates/haut');
				$this->load->view('candidature_get', $data);
				$this->load->view('templates/bas');
			}
			else{
				$this->load->view('templates/haut');
				$this->load->view('candidature_get');
				$this->load->view('templates/bas');
			}
		}
	}
	public function galerie(){
		$data['candidatures'] = $this->db_model->get_preselectione();
		$this->load->view('templates/haut');
		$this->load->view('galerie',$data);
		$this->load->view('templates/bas');
	}
	public function supprimer(){
		//$data['id']=$_GET["id"];
		if($this->db_model->suppr_cdr($_GET["id"])!=NULL){
			$this->load->view('templates/haut');
			$this->load->view('candidature_suppr_succes');
			$this->load->view('templates/bas');
		}
		else{
			echo '???';
		}
		
	}
	public function inscription(){
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('prenom', 'prenom', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('categorie', 'categorie', 'required');
		$this->form_validation->set_rules('concours', 'concours', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/haut');
			$this->load->view('candidature_creer');
			$this->load->view('templates/bas');
		}
		else{
			$this->db_model->set_candidature();
			$this->load->view('templates/haut');
			$this->load->view('candidature_succes');
			$this->load->view('templates/bas');
		}
	}
}
?>