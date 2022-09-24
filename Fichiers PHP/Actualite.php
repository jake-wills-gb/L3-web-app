<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actualite extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}
	public function afficher($numero){
		if($numero==FALSE){
			$url=base_url();
			header("Location:$url");
		}
		else{
			$data['titre'] = 'Actualite : ';
			$data['actu'] = $this->db_model->get_actualite($numero);
			$this->load->view('templates/haut', $data);
			$this->load->view('actualite_afficher', $data);
			$this->load->view('templates/bas');
		}
	}
}
?>