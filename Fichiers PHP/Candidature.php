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
			//$data['documents']=$this->db_model->get_documents();
			$this->load->view('templates/haut');
			$this->load->view('candidature_get', $data);
			$this->load->view('templates/bas');
		}
	}
}
?>