
<?php

class themeManager
{
	//Fonction ajoutant une entrée dans la base de donnée 
	static public function add(theme $theme)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
	// Praparation de la requete d'insertion.
		$q = $db->prepare('INSERT INTO theme(  descriptionTheme ) VALUES(  :descriptionTheme, )');
		
		// Assignation des valeurs 
		
		
		$q->bindValue(':descriptionTheme', $theme->getdescriptionTheme());
	// Exécution de la requête.
		$q->execute();
		
	}
	//Fonction supprimant une entrée dans la base de donnée
	static public function delete( $id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.

	// Execute une requete de type DELETE.
	  $id=(int) $id;
		$db->query('DELETE FROM theme WHERE idtheme = '.$id);
	}
	//Fonction retournant un objet correspondant à une ID de la Base De Donnée
	
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
	// Execute une requete de type SELECT avec une clause WHERE, et retourne un objet Theme.
		$id = (int) $id;
		
		$q = $db->query('SELECT idtheme,  descriptionTheme   FROM theme WHERE idtheme = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new theme($donnees);
	}
	//Fonction retournant une liste contenant tous les enregistrements de la Base De Donnée, sous forme d'objet

    static public function getByDesc($theme)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
	// Execute une requete de type SELECT avec une clause WHERE, et retourne un objet Theme.
		
		
		$q = $db->query('SELECT idtheme,  descriptionTheme   FROM theme WHERE descriptionTheme = "'.$theme.'"');
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new theme($donnees);
	}


	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
	// Retourne la liste de tous les Theme.
		
		$q = $db->query('SELECT idtheme,  descriptionTheme FROM theme ORDER BY idtheme');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$theme[] = new theme($donnees);
		}
		
		return $theme;
    }
}