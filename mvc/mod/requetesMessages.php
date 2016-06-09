<?php

if (file_exists('mvc/mod/AccesSQL.php')) {
	require_once('mvc/mod/AccesSQL.php'); 
}

class requetesMessages extends AccesSQL  {
	public function ajouterMessage($p) {
		return $this->insertion('INSERT INTO `minichat` ( `pseudo`, `contenu`) 
									VALUES 	( :pseudo, :contenu)', $p);
	}
		
	public function voirMessages() {
		return $this->selection('SELECT * FROM minichat ORDER BY date desc',NULL, true);
	}
}