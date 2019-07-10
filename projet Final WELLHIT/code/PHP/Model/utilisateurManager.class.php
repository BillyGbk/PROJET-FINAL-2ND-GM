
<?php

class utilisateurManager
{
	//Fonction ajoutant une entrée dans la base de donnée   
	static public function add(utilisateur $utilisateur)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Preparation de la requete d'insertion.
		$q = $db->prepare('INSERT INTO utilisateur( nomUtilisateur , prenomUtilisateur,  dateUtilisateur , pseudoUtilisateur  , motDePasse , idTheme ) VALUES(:nomUtilisateur, :prenomUtilisateur, :dateUtilisateur, :pseudoUtilisateur , :motDePasse , :idTheme)');
		
		// Assignation des valeurs
		$q->bindValue(':nomUtilisateur', $utilisateur->getNomUtilisateur());
		$q->bindValue(':prenomUtilisateur', $utilisateur->getPrenomUtilisateur());
		$q->bindValue(':dateUtilisateur', $utilisateur->getDateUtilisateur());
		$q->bindValue(':pseudoUtilisateur', $utilisateur->getPseudoUtilisateur());
		$q->bindValue(':motDePasse', $utilisateur->getMotDePasse());
		$q->bindValue(':idTheme', $utilisateur->getIdTheme());
		
       
       
		
		// Ex�cution de la requ�te.
		$q->execute();
		$q->CloseCursor ();
	}


	//Fonction supprimant une entrée dans la base de donnée
	static public function delete( $id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$id=(int) $id;
		$db->query('DELETE FROM utilisateur WHERE idutilisateur = '.$id);
	}


	//Fonction retournant un objet correspondant à une ID de la Base De Donnée  
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet utilisateur.
		/*$id = (int) $id;*/
		$id=(int) $id;
		$q = $db->query('SELECT idutilisateur, nomUtilisateur, prenomUtilisateur, dateUtilisateur , pseudoUtilisateur , motDePasse, idTheme  FROM utilisateur WHERE idutilisateur = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new utilisateur($donnees);
	}

	
    //Fonction retournant une liste contenant tous les enregistrements de la Base De Donnée, sous forme d'objet	
	static public function getByPseudo($pseudoUtilisateur) {
		$db = DbConnect::getDb (); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
		$q = $db->prepare ( 'SELECT idUtilisateur , nomUtilisateur , prenomUtilisateur, dateUtilisateur , pseudoUtilisateur , motDePasse,   idTheme  FROM utilisateur WHERE pseudoUtilisateur = :pseudoUtilisateur' );
		
		// Assignation des valeurs .
		$q->bindValue ( ':pseudoUtilisateur', $pseudoUtilisateur );
		$q->execute ();
		$donnees = $q->fetch ( PDO::FETCH_ASSOC );
		$q->CloseCursor ();
		if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
			return new utilisateur ();
		} else {
			return new utilisateur ( $donnees );
		}
	}
	
	
    //Fonction mettant à jour un enregistrement DB correspondant à l'ID fournie
	/*static public function update( $champ , $newvalue , $id )
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Prepare une requete de type UPDATE.
		$q = $db->prepare('UPDATE utilisateur SET'.$champ.' =  "'.$newvalue.'"  WHERE idUtilisateur ='.$id);
		
		
	// Execution de la requete.
		$res = $q->execute();
	}*/

	
}



?>

