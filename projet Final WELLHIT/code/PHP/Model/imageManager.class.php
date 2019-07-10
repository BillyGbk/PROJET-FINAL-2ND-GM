<?php

class ImageManager
{
	//Fonction ajoutant une entrée dans la base de donnée   
	static public function add(image $image)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Preparation de la requete d'insertion.
		$q = $db->prepare('INSERT INTO image( source,idUtilisateur ) VALUES(:source,:idUtilisateur)');
		
			// Assignation des valeurs 
		
		$q->bindValue(':source', $image->getSource());
		$q->bindValue(':idUtilisateur', $image->getIdUtilisateur());
		// execution de la requete.
		$q->execute();
		
	}
	//Fonction supprimant une entrée dans la base de donnée
	static public function delete( $id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requete de type DELETE.
		$id=(int) $id
		$db->query('DELETE FROM image WHERE idImage = '.$id);
	}
	//Fonction retournant un objet correspondant à une ID de la Base De Donnée
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Execute une requete de type SELECT avec une clause WHERE, et retourne un objet image.
		$id = (int) $id;
		
		$q = $db->query('SELECT idImage,  idUtilisateur,source FROM image WHERE idImage = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new image($donnees);
	}
	//Fonction retournant une liste contenant tous les enregistrements de la Base De Donnée, sous forme d'objet
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
	
		
		$q = $db->query('SELECT idImage, idUtilisateur,source FROM image ');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$image[] = new image($donnees);
		}
		// Retourne la liste de tous les image.
		return $image;
	}

	
	 //Fonction mettant à jour un enregistrement DB correspondant à l'ID fournie
	static public function update(image $image)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Prepare une requete de type UPDATE.
		$q = $db->prepare('UPDATE image SET source = :source  WHERE idImage = :idImage');
		
		// Assignation des valeurs de la requete.
		$q->bindValue(':idImage', $image->getIdimage());
		$q->bindValue(':source', $image->getsource());
		
		
	
		// execution de la requete.
		$res = $q->execute();
	}

	/*static public function update( $newsource , $idimage )
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requete de type UPDATE.
		$q = $db->prepare('UPDATE image SET source="'.$newsource.'"  WHERE idImage ='.$idimage);
		
		
		// execution de la requete.
		$res = $q->execute();
	}*/

	
}