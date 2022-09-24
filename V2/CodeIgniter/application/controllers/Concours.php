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
	public function afficher_admin(){
		//chargement du data
		$data['concours'] = $this->db_model->get_all_concours();
		//chargement view haut
		$this->load->view('templates/haut');

		//chargement view
		$this->load->view('afficher_concours_admin', $data);

		//chargement view bas
		$this->load->view('templates/bas');
	}
	public function candidatures(){
		//chargement du data
		$data['id']=$_GET["id"];
		$data['candidatures'] = $this->db_model->get_all_candidatures($_GET["id"]);
		//chargement view haut
		$this->load->view('templates/haut');

		//chargement view
		$this->load->view('admin_candidatures', $data);

		//chargement view bas
		$this->load->view('templates/bas');
	}
	public function preselections(){
		//chargement du data
		$data['id']=$_GET["id"];
		$data['concours'] = $this->db_model->get_all_concours();
		//chargement view haut
		$this->load->view('templates/haut');

		//chargement view
		$this->load->view('preselections', $data);

		//chargement view bas
		$this->load->view('templates/bas');
	}
}
?>