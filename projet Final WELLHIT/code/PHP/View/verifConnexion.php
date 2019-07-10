<?php
$titre = "Connexion";

if (!isset($_POST['pseudoUtilisateur'])) // On est dans la page de formulaire
{
    require adresseRoot.'/Php/View/pageConnexion.php'; // On affiche le formulaire
} else { // Le formulaire a été validé
    $message = '';
    if (empty($_POST['pseudoUtilisateur']) || empty($_POST['motDePasse'])) // Oublie d'un champ
    {
        $message = '<p>Une erreur s\'est produite pendant votre identification.
                       Vous devez remplir tous les champs</p>';
        echo '<div class="section">'.$message.'</div>';
        header("refresh:3;url=Routes.php?action=connect");
	                   
    } else // On check le mot de passe
    {
        $utilisateur = utilisateurManager::getByPseudo($_POST['pseudoUtilisateur']); // On recherche dans la base l'utilisateur et on rempli l'objet utilisateur
        

        if ($utilisateur->getMotDePasse() == md5($_POST['motDePasse'])) // Acces OK !
        {
            $_SESSION['pseudoUtilisateur'] = $utilisateur->getPseudoUtilisateur();
          
            $idtheme = themeManager::getById(intval($utilisateur->getIdTheme()));
            
            $descTheme = $idtheme->getDescriptionTheme();
            
            $_SESSION['theme'] = $descTheme;
            $_SESSION['idUtilisateur'] = $utilisateur->getIdUtilisateur();
            $message = '<p>Bienvenue ' . $utilisateur->getPseudoUtilisateur() . ', vous êtes maintenant connecté!</p>';
		    echo '<section>'.$message.'</section>';
            header("refresh:2;url=Routes.php");
        } 
		else // Acces pas OK !
        {
            $message = '<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou le pseudoUtilisateur
            entré n\'est pas correcte.</p>';
            echo '<section>'.$message.'</section>';
            header("refresh:2;url=Routes.php?action=connect");
        }
    }

}

?>

