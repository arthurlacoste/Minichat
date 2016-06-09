<?php

class AccesSQL {
	private $demande,$stmtn,$pdo;
	public $erreur;

	public function ajouterMessage($p) {
		return $this->insertion('INSERT INTO `minichat` ( `pseudo`, `contenu`) 
									VALUES 	( :pseudo, :contenu)', $p);
	}
		
	public function voirMessages() {
		return $this->selection('SELECT * FROM minichat ORDER BY date desc',NULL, true);
	}
		
	public function getErrorMessage() {
		return $this->erreur;
	}

	public function pourcentage($n)
	{
		return('%' . $n .'%');
	}
	
	
	public function customQ($q){
		return $this->insertion($q);
	}
	
	/*
		La fonction selection permet de faire un acces SQL via la préparation d'une requète
		PDO, elle prend optionnellement en charge un tableau de variables à executer, et 
		peux retourner un tableau ou seulement la première ligne. 
		
		$q = requete	
		$var tableau comprenant les variables pour constituer une requete préparé (NULL par défaut)
		$tab =	true : retourne un tableau (valeur par défaut)
				false : retourne la première entrée
	*/
	
	public function selection($q,$var=NULL,$tab=TRUE) {
		try {
			if($var)
			{
				$this->stmt = $this->pdo->prepare($q);
				$this->demande = $this->stmt->execute($var);	
				$this->demande = $this->stmt->fetchAll();
		
			}else{ 
				$this->demande = $this->pdo->query($q); 
				//$this->demande->setFetchMode(PDO::FETCH_OBJ);
			}
		
			$this->pdo = null;

			if($tab==TRUE) {
				return $this->demande; }
			return $this->demande[0];
		} 
		catch (Exception $e) {
			$this->pdo->rollback();
			$_SESSION['message'][] = $e->getMessage();
			return false;
		}
	}
	
	
	/*
		$q = requete	
		$var = tableau comprenant les variables pour constituer une requete préparé
		$tab =	true : retourne un tableau 
				false : retourne la première entrée
	*/
	
	public function uneValeur($q,$var=NULL,$tab=FALSE)
	{
		try {
			if($var) {
				$this->stmt = $this->pdo->prepare($q);
				$this->stmt->execute($var);	
			}else{ 
				$this->stmt = $this->pdo->query($q); 
			}
	
			$this->demande = $this->stmt->fetch();
			$this->pdo = null;
		
			if($tab==TRUE) {
				return $this->demande; }
			return $this->demande[0];
		} catch (PDOException $e) {
			$this->pdo->rollback();
			$_SESSION['message'][] = $e->getMessage();
			return false;
		}
	}

	/*	
		$q = requete
		$var = tableau comprenant les variables pour constituer une requete préparé
	*/
	
	public function insertion($q,$var=NULL)
	{	
		try {
			$this->pdo->beginTransaction();					
			if($var){ 
				$insert = $this->pdo->prepare($q);
				$insert->execute($var); 
			} else {
				$this->pdo->exec($q);
			}
			$this->pdo->commit();

			//$this->pdo = null;
			return true;
		} 
		catch (PDOException $e) {
			$this->pdo->rollback();
			$_SESSION['message'][] = $e->getMessage();
			return false;
		}
	}

	public function AccesSQL() {
		try {
			$this->pdo = new PDO(DSN, LOGIN, MDP);
		} catch (PDOException $e) {
			$this->error =  'Oh noes! There\'s an error in the query : <br />' . $e->getMessage();
		}
		$this->demande ='';
		$this->stmt='';
	}
	
}
