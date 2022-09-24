<?php

class Db_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function get_all_compte(){
		$query = $this->db->query("SELECT CPT_compte_pseudo FROM T_Compte_CPT;");
		return $query->result_array();
	}
	public function get_actualite($numero){
		$query = $this->db->query("SELECT ACT_titre_actu, ACT_text FROM T_Actualite_ACT WHERE ACT_actu_id=".$numero.";");
		return $query->row();
	}
	public function get_all_actualite(){
		$query = $this->db->query("SELECT ACT_titre_actu,ACT_text,ACT_date FROM T_Actualite_ACT order by ACT_date DESC;");
		return $query->result_array();
	}
	public function get_nb_comptes(){
		$query = $this->db->query("SELECT count(CPT_compte_pseudo) as nb FROM T_Compte_CPT;");
		return $query->row();
	}
	public function get_all_concours(){
		$query = $this->db->query("SELECT CCR_titre,CPT_compte_pseudo as responsable,DIS_titre,CCR_date_debut,CCR_date_inscription,CCR_date_preselection,CCR_date_fin
FROM T_Concours_CCR
JOIN T_Administrateur_ADM using(ADM_admin_id)
JOIN T_Discipline_DIS using(DIS_discipline_id)
ORDER BY CCR_date_debut;");
		return $query->result_array();
	}
	public function set_compte(){
		$this->load->helper('url');
		$id=$this->input->post('id');
		$mdp=$this->input->post('mdp');
		$req="INSERT INTO T_Compte_CPT VALUES ('".$id."','".$mdp."');";
		$query = $this->db->query($req);
		return($query);
	}
	public function get_candidature(){
		$this->load->helper('url');
		$id=$this->input->post('id');
		$inscr=$this->input->post('inscr');
		$req="SELECT T_Candidature_CDR.CDR_nom,T_Candidature_CDR.CDR_prenom,CDR_etat(T_Candidature_CDR.CDR_candidature_id) as etat,DOC_nom_fichier as fichier FROM T_Candidature_CDR LEFT JOIN T_Document_DOC ON T_Document_DOC.CDR_candidature_id = T_Candidature_CDR.CDR_candidature_id WHERE CDR_code_inscr='".$inscr."' AND CDR_code_id='".$id."';";
		$query = $this->db->query($req);
		return $query->result_array();
	}
	/*public function get_documents(){
		$this->load->helper('url');
		$req="SELECT DOC_nom_fichier FROM T_Document_DOC WHERE CDR_candidature_id="..";";
		$query = $this->db->query($req);
		return $query->result_array();
	}*/
	public function connect_compte($username, $password){
		$query = $this->db->query("SELECT CPT_compte_pseudo, CPT_motdepasse FROM T_Compte_CPT WHERE CPT_compte_pseudo='".$username."' AND CPT_motdepasse='".$password."';");

		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}
?>