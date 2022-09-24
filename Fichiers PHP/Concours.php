<?php
class Concours extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url');
	}
	public function afficher(){
		//chargement du data
		$data['concours'] = $this->db_model->get_all_concours();
		//chargement view haut
		$this->load->view('templates/haut');

		//chargement view
		$this->load->view('afficher_concours', $data);

		//chargement view bas
		$this->load->view('templates/bas');
	}
}
?>