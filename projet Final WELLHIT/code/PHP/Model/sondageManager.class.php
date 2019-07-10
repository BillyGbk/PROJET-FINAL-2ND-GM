<?php

class sondageManager
{
   //Fonction ajoutant une entrée dans la base de donnée   
	static public function add(Sondage $Sondage)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Preparation de la requete d'insertion.
		$q = $db->prepare('INSERT INTO sondage (descSondage,noteSondage,idUtilisateur) VALUES(:descSondage,:noteSondage,:idUtilisateur) ') ;
		
		// Assignation des valeurs 
		$q->bindValue(':descSondage', $Sondage>getDescriptionSondage());
		$q->bindValue(':noteSondage', $Sondage>getNoteSondage());
		$q->bindValue(':idUtilisateur', $Sondage>getIdUtilisateur());
		
		// Execution de la requete.
		$q->execute();
		}
		//Fonction supprimant une entrée dans la base de donnée
    static public function delete( $IdSondage)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Execute une requete de type DELETE..
		$idsondage=(int) $idsondage
		$q = $db->prepare('DELETE FROM sondage WHERE idSondage = '.$IdSondage);
		$q->execute();
    }	
   //Fonction retournant un objet correspondant à une ID de la Base De Donnée   
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet sondage.
		$id=(int) $id		
		$q = $db->query('SELECT idSondage, descSondage,noteSondage, idUtilisateur FROM sondage WHERE idSondage = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new sondage($donnees);
		}
		//Fonction retournant une liste contenant tous les enregistrements de la Base De Donnée, sous forme d'objet
    static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les sondages.
		
		$q = $db->query('SELECT idSondage, descSondage,noteSondage,idUtilisateur FROM sondage ');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$sondage[] = new sondage($donnees);
		}
		
		return $sondage;
    }
}