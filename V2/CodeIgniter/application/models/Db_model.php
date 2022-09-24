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
		$query = $this->db->query("SELECT T_Concours_CCR.CCR_concours_id, CCR_titre,T_Administrateur_ADM.CPT_compte_pseudo as responsable,DIS_titre,CCR_date_debut,CCR_date_inscription,CCR_date_preselection,CCR_date_fin,CCR_getPhase(CCR_concours_id) as phase, TJ_vote.CPT_compte_pseudo as jury,CAT_cat_title
		FROM T_Concours_CCR
		LEFT JOIN T_Administrateur_ADM using(ADM_admin_id)
		LEFT JOIN T_Discipline_DIS using(DIS_discipline_id)
		LEFT JOIN TJ_vote using(CCR_concours_id)
		LEFT JOIN TJ_estCompose using(CCR_concours_id)
		LEFT JOIN T_Categorie_CAT using(CAT_cat_id)
		ORDER BY CCR_date_debut;");
		return $query->result_array();
	}
	public function get_all_candidatures($id){
		$query = $this->db->query("SELECT CDR_etat(CDR_candidature_id) as etat, CDR_email, CDR_nom, CDR_prenom, T_Concours_CCR.CCR_titre as concours, T_Categorie_CAT.CAT_cat_title as categorie
		FROM T_Candidature_CDR
		LEFT JOIN T_Categorie_CAT using(CAT_cat_id)
		LEFT JOIN T_Concours_CCR using(CCR_concours_id)
		WHERE T_Candidature_CDR.CCR_concours_id = $id
		ORDER BY categorie
		;");
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
	public function set_candidature(){
		$this->load->helper('url');
		$this->load->helper('string');
		$id=random_string('alnum',8);
		$inscr=random_string('alnum',20);
		$nom=$this->input->post('nom');
		$prenom=$this->input->post('prenom');
		$email=$this->input->post('email');
		$categorie=$this->input->post('categorie');
		$concours=$this->input->post('concours');
		$req="INSERT INTO T_Candidature_CDR VALUES (NULL,'a','".$email."','".$nom."','".$prenom."','".$inscr."','".$id."','".$concours."','".$categorie."');";
		$query = $this->db->query($req);
		return($query);
	}
	public function get_candidature(){
		$this->load->helper('url');
		$id=$this->input->post('id');
		$inscr=$this->input->post('inscr');
		$req="SELECT T_Candidature_CDR.CDR_candidature_id, T_Candidature_CDR.CDR_nom,T_Candidature_CDR.CDR_prenom,CDR_etat(T_Candidature_CDR.CDR_candidature_id) as etat,DOC_nom_fichier as fichier FROM T_Candidature_CDR LEFT JOIN T_Document_DOC ON T_Document_DOC.CDR_candidature_id = T_Candidature_CDR.CDR_candidature_id WHERE CDR_code_inscr='".$inscr."' AND CDR_code_id='".$id."' AND CDR_visible!='d';";
		$query = $this->db->query($req);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
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
	public function modif_mdp($username, $password){
		$query = $this->db->query("UPDATE T_Compte_CPT set CPT_motdepasse='".$password."'where CPT_compte_pseudo='".$username."';");
		return $query;
	}
	public function status($username){
		$query = $this->db->query("SELECT CPT_compte_pseudo from T_Administrateur_ADM where CPT_compte_pseudo='".$username."';");
		if($query->num_rows() > 0){
			return "ADMIN";
		}
		else{
			$query = $this->db->query("SELECT CPT_compte_pseudo from T_MembreJury_MBJ where CPT_compte_pseudo='".$username."';");
			if($query->num_rows() > 0){
				return "JURY";
			}
			else{
				return "ERROR status not found";
			}
		}
	}
	public function get_preselectione(){
		$query = $this->db->query("SELECT CDR_email, CDR_nom, CDR_prenom, T_Concours_CCR.CCR_titre as concours, T_Categorie_CAT.CAT_cat_title as categorie
		FROM T_Candidature_CDR
		LEFT JOIN T_Categorie_CAT using(CAT_cat_id)
		LEFT JOIN T_Concours_CCR using(CCR_concours_id)
		WHERE T_Candidature_CDR.CDR_visible = 'p'
		ORDER BY categorie
		;");
		return $query->result_array();
	}
	public function suppr_cdr($id){
		$query = $this->db->query("UPDATE T_Candidature_CDR SET CDR_visible = 'd' WHERE CDR_candidature_id=$id;");
		return($query);
	}
}
?>