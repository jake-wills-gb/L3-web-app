
CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Compte_CPT` (
  `CPT_compte_pseudo` VARCHAR(20) NULL DEFAULT NULL,
  `CPT_motdepasse` CHAR(64) NOT NULL,
  `ADM_admin_id` INT NOT NULL,
  PRIMARY KEY (`CPT_compte_pseudo`),
  UNIQUE INDEX `CPT_compte_pseudo_UNIQUE` (`CPT_compte_pseudo` ASC) );

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Administrateur_ADM` (
  `ADM_admin_id` INT NOT NULL AUTO_INCREMENT,
  `CPT_compte_pseudo` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ADM_admin_id`),
  INDEX `fk_T_Administrateur_ADM_T_Compte_CPT1_idx` (`CPT_compte_pseudo` ASC) ,
  UNIQUE INDEX `CPT_compte_pseudo_UNIQUE` (`CPT_compte_pseudo` ASC) ,
  CONSTRAINT `fk_T_Administrateur_ADM_T_Compte_CPT1`
    FOREIGN KEY (`CPT_compte_pseudo`)
    REFERENCES `zal3-zwillsja0`.`T_Compte_CPT` (`CPT_compte_pseudo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Discipline_DIS` (
  `DIS_discipline_id` INT NOT NULL AUTO_INCREMENT,
  `DIS_titre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`DIS_discipline_id`));

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Concours_CCR` (
  `CCR_concours_id` INT NOT NULL AUTO_INCREMENT,
  `CCR_titre` VARCHAR(255) NOT NULL,
  `ADM_admin_id` INT NOT NULL,
  `DIS_discipline_id` INT NOT NULL,
  `CCR_date_debut` VARCHAR(45) NOT NULL,
  `CCR_date_preselection` VARCHAR(45) NOT NULL,
  `CCR_date_fin` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CCR_concours_id`),
  INDEX `fk_T_Concours_CCR_T_Administrateur_ADM1_idx` (`ADM_admin_id` ASC) ,
  INDEX `fk_T_Concours_CCR_T_Discipline_DIS1_idx` (`DIS_discipline_id` ASC) ,
  CONSTRAINT `fk_T_Concours_CCR_T_Administrateur_ADM1`
    FOREIGN KEY (`ADM_admin_id`)
    REFERENCES `zal3-zwillsja0`.`T_Administrateur_ADM` (`ADM_admin_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_T_Concours_CCR_T_Discipline_DIS1`
    FOREIGN KEY (`DIS_discipline_id`)
    REFERENCES `zal3-zwillsja0`.`T_Discipline_DIS` (`DIS_discipline_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Categorie_CAT` (
  `CAT_cat_id` INT NOT NULL AUTO_INCREMENT,
  `CAT_cat_title` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`CAT_cat_id`));

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Candidature_CDR` (
  `CDR_candidature_id` INT NOT NULL AUTO_INCREMENT,
  `CDR_` ENUM('a', 'd', 'p') NOT NULL,
  `CDR_email` VARCHAR(200) NOT NULL,
  `CDR_code_inscr` CHAR(20) NOT NULL,
  `CDR_code_id` CHAR(8) NOT NULL,
  `CCR_concours_id` INT NOT NULL,
  `CAT_cat_id` INT NOT NULL,
  PRIMARY KEY (`CDR_candidature_id`),
  INDEX `fk_T_Candidature_CDR_T_Concours_CCR1_idx` (`CCR_concours_id` ASC) ,
  INDEX `fk_T_Candidature_CDR_T_Categorie_CAT1_idx` (`CAT_cat_id` ASC) ,
  CONSTRAINT `fk_T_Candidature_CDR_T_Concours_CCR1`
    FOREIGN KEY (`CCR_concours_id`)
    REFERENCES `zal3-zwillsja0`.`T_Concours_CCR` (`CCR_concours_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_T_Candidature_CDR_T_Categorie_CAT1`
    FOREIGN KEY (`CAT_cat_id`)
    REFERENCES `zal3-zwillsja0`.`T_Categorie_CAT` (`CAT_cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Document_DOC` (
  `DOC_doc_id` INT NOT NULL AUTO_INCREMENT,
  `DOC_nom_fichier` VARCHAR(100) NOT NULL,
  `CDR_candidature_id` INT NOT NULL,
  PRIMARY KEY (`DOC_doc_id`),
  INDEX `fk_T_Document_DOC_T_Candidature_CDR1_idx` (`CDR_candidature_id` ASC) ,
  CONSTRAINT `fk_T_Document_DOC_T_Candidature_CDR1`
    FOREIGN KEY (`CDR_candidature_id`)
    REFERENCES `zal3-zwillsja0`.`T_Candidature_CDR` (`CDR_candidature_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_FileDiscussion_FIL` (
  `FIL_file_id` INT NOT NULL AUTO_INCREMENT,
  `FIL_file_nom` VARCHAR(45) NOT NULL,
  `FIL_file_` ENUM('a', 'd') NOT NULL,
  `CCR_concours_id` INT NOT NULL,
  PRIMARY KEY (`FIL_file_id`),
  INDEX `fk_T_FileDiscussion_FIL_T_Concours_CCR1_idx` (`CCR_concours_id` ASC) ,
  CONSTRAINT `fk_T_FileDiscussion_FIL_T_Concours_CCR1`
    FOREIGN KEY (`CCR_concours_id`)
    REFERENCES `zal3-zwillsja0`.`T_Concours_CCR` (`CCR_concours_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_MembreJury_MBJ` (
  `CPT_compte_pseudo` VARCHAR(20) NOT NULL,
  `MBJ_nom` VARCHAR(80) NOT NULL,
  `MBJ_prenom` VARCHAR(80) NOT NULL,
  `MBJ_URL` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`CPT_compte_pseudo`),
  INDEX `fk_T_MembreJury_MBJ_T_Compte_CPT1_idx` (`CPT_compte_pseudo` ASC) ,
  UNIQUE INDEX `CPT_compte_pseudo_UNIQUE` (`CPT_compte_pseudo` ASC) ,
  CONSTRAINT `fk_T_MembreJury_MBJ_T_Compte_CPT1`
    FOREIGN KEY (`CPT_compte_pseudo`)
    REFERENCES `zal3-zwillsja0`.`T_Compte_CPT` (`CPT_compte_pseudo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Message_MSG` (
  `MSG_message_id` INT NOT NULL AUTO_INCREMENT,
  `MSG_contenu` VARCHAR(255) NOT NULL,
  `MSG_etat` ENUM('a', 'd') NOT NULL,
  `FIL_file_id` INT NOT NULL,
  `CPT_compte_pseudo` CHAR(20) NOT NULL,
  PRIMARY KEY (`MSG_message_id`),
  INDEX `fk_T_Message_MSG_T_FileDiscussion_FIL1_idx` (`FIL_file_id` ASC) ,
  INDEX `fk_T_Message_MSG_T_MembreJury_MBJ1_idx` (`CPT_compte_pseudo` ASC) ,
  CONSTRAINT `fk_T_Message_MSG_T_FileDiscussion_FIL1`
    FOREIGN KEY (`FIL_file_id`)
    REFERENCES `zal3-zwillsja0`.`T_FileDiscussion_FIL` (`FIL_file_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_T_Message_MSG_T_MembreJury_MBJ1`
    FOREIGN KEY (`CPT_compte_pseudo`)
    REFERENCES `zal3-zwillsja0`.`T_MembreJury_MBJ` (`CPT_compte_pseudo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`TJ_evalue` (
  `CPT_compte_pseudo` CHAR(20) NOT NULL,
  `CDR_candidature_id` INT NOT NULL,
  `note` INT NULL,
  INDEX `fk_TJ_Evalue_EVL_T_MembreJury_MBJ1_idx` (`CPT_compte_pseudo` ASC) ,
  INDEX `fk_TJ_Evalue_EVL_T_Candidature_CDR1_idx` (`CDR_candidature_id` ASC) ,
  PRIMARY KEY (`CPT_compte_pseudo`, `CDR_candidature_id`),
  CONSTRAINT `fk_TJ_Evalue_EVL_T_MembreJury_MBJ1`
    FOREIGN KEY (`CPT_compte_pseudo`)
    REFERENCES `zal3-zwillsja0`.`T_MembreJury_MBJ` (`CPT_compte_pseudo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TJ_Evalue_EVL_T_Candidature_CDR1`
    FOREIGN KEY (`CDR_candidature_id`)
    REFERENCES `zal3-zwillsja0`.`T_Candidature_CDR` (`CDR_candidature_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`T_Actualite_ACT` (
  `ACT_actu_id` INT NOT NULL AUTO_INCREMENT,
  `ACT_titre_actu` VARCHAR(80) NOT NULL,
  `ACT_text` VARCHAR(255) NOT NULL,
  `ADM_admin_id` INT NOT NULL,
  PRIMARY KEY (`ACT_actu_id`),
  INDEX `fk_T_Actualite_ACT_T_Administrateur_ADM1_idx` (`ADM_admin_id` ASC) ,
  CONSTRAINT `fk_T_Actualite_ACT_T_Administrateur_ADM1`
    FOREIGN KEY (`ADM_admin_id`)
    REFERENCES `zal3-zwillsja0`.`T_Administrateur_ADM` (`ADM_admin_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`TJ_vote` (
  `CCR_concours_id` INT NOT NULL,
  `CPT_compte_pseudo` CHAR(20) NOT NULL,
  INDEX `fk_TJ_Vote_VOT_T_Concours_CCR1_idx` (`CCR_concours_id` ASC) ,
  INDEX `fk_TJ_Vote_VOT_T_MembreJury_MBJ1_idx` (`CPT_compte_pseudo` ASC) ,
  PRIMARY KEY (`CCR_concours_id`, `CPT_compte_pseudo`),
  CONSTRAINT `fk_TJ_Vote_VOT_T_Concours_CCR1`
    FOREIGN KEY (`CCR_concours_id`)
    REFERENCES `zal3-zwillsja0`.`T_Concours_CCR` (`CCR_concours_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TJ_Vote_VOT_T_MembreJury_MBJ1`
    FOREIGN KEY (`CPT_compte_pseudo`)
    REFERENCES `zal3-zwillsja0`.`T_MembreJury_MBJ` (`CPT_compte_pseudo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `zal3-zwillsja0`.`TJ_estCompose` (
  `CAT_cat_id` INT NOT NULL,
  `CCR_concours_id` INT NOT NULL,
  INDEX `fk_TJ_estCompose_T_Categorie_CAT1_idx` (`CAT_cat_id` ASC) ,
  INDEX `fk_TJ_estCompose_T_Concours_CCR1_idx` (`CCR_concours_id` ASC) ,
  PRIMARY KEY (`CCR_concours_id`, `CAT_cat_id`),
  CONSTRAINT `fk_TJ_estCompose_T_Categorie_CAT1`
    FOREIGN KEY (`CAT_cat_id`)
    REFERENCES `zal3-zwillsja0`.`T_Categorie_CAT` (`CAT_cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TJ_estCompose_T_Concours_CCR1`
    FOREIGN KEY (`CCR_concours_id`)
    REFERENCES `zal3-zwillsja0`.`T_Concours_CCR` (`CCR_concours_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);