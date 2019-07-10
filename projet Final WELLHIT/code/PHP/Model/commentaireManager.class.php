<?php

class commentaireManager
{
	//Fonction ajoutant une entrée en DB
	static public function add(commentaire $commentaire)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Preparation de la requete d'insertion.
        $q = $db->prepare('INSERT INTO commentaire  (  descriptionCommentaire , idUtilisateur ) VALUES( :descriptionCommentaire , :idUtilisateur  )');
	// Assignation des valeurs
	    $q->bindValue ( ':descriptionCommentaire', $commentaire->getDescriptionCommentaire () );
	    $q->bindValue ( ':idUtilisateur', $commentaire->getIdUtilisateur () );

    // Exécution de la requête.
		$q->execute();
		$q->CloseCursor ();
	}
	



    //Fonction supprimant l'entrée correspondant à l'ID
    static public function delete($id)
	{
		$db = DbConnect::getDb();
	 // Instance de PDO.
	// Execute une requete de type DELETE.
		$id=(int) $id;
		$db->query('DELETE FROM commentaire WHERE commentaire = '.$id);
		
	}

	

    //Fonction mettant à jour un enregistrement DB correspondant à l'ID fournie
	static public function update( $newcommentaire , $id )
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Prepare une requete de type UPDATE.
		$q = $db->prepare('UPDATE commentaire SET descriptionCommentaire="'.$newcommentaire.'"  WHERE idCommentaire ='.$id);
		
		
	// Execution de la requete.
		$res = $q->execute();
	}
	


    //Fonction retournant un objet correspondant à une ID de la BDD
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Execute une requete de type SELECT avec une clause WHERE, et retourne un objet commentaire.
		
		$id=(int) $id;
		$q = $db->query('SELECT idCommentaire, descriptionCommentaire, idUtilisateur  FROM commentaire WHERE idCommentaire = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new commentaire($donnees);
	}




    //Fonction retournant une liste contenant tous les enregistrements de la BDD, sous forme d'objet

	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les commentaires.
		
		$q = $db->query('SELECT idCommentaire, descriptionCommentaire , idUtilisateur FROM commentaire ');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$commentaire[] = new commentaire($donnees);
		}
		
		return $commentaire;
	}


	
	/*static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les personnes.
		
		$q = $db->query('SELECT id, nom, prenom, codePostal, adresse, ville FROM personnes ORDER BY nom');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personne($donnees);
		}
		
		return $persos;
	}*/
	





   
	
	
}