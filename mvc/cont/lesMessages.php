<?php

class LesMessages {
	
	public function retenirPseudo() {
		if(!isset($_SESSION['pseudo'])) { 
			$_SESSION['pseudo'] = ''; 
		}
		
		if(isset($_POST['pseudo']) && $_POST['pseudo']!='') { 
			$_SESSION['pseudo'] = $_POST['pseudo']; 
		}
		
		return $_SESSION['pseudo'];
	}

	public function ajouterMessage() {
		
		if(!isset($_POST['pseudo'])) { $_POST['pseudo'] = ''; }
		if(!isset($_POST['contenu'])) { $_POST['contenu'] = ''; }
		
		if($_POST['pseudo']!='' && $_POST['contenu']!='') {
			
			$_POST = checkStringIntegrity($_POST);
			
			$message = array(
				':pseudo' => $_POST['pseudo'],
				':contenu' => $_POST['contenu'],				
			);				
										
			$SQL = new AccesSQL();
			$ap = $SQL->ajouterMessage($message);
		
			return $ap;		
		}
	}

	public function afficheLesMessages() {

		$SQL = new AccesSQL();
		$liste = $SQL->voirMessages();
		
		//$liste = $this->checkStringIntegrity($liste);
		
		return $liste;
	}

}