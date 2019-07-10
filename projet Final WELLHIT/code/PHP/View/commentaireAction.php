<?php

switch ($_GET['action']) {
    case "ajoutComAction":
        {
            $p = new commentaire(["descriptionCommentaire" => $_POST["descriptionCommentaire"], "idUtilisateur" => $_SESSION["idUtilisateur"]]);
            commentaireManager::add($p);
            break;
        }
    case "modifComAction":
        {
            //$p = new commentaire(["descriptionCommentaire" => $_POST["descriptionCommentaire"], "idUtilisateur" => $_SESSION["idUtilisateur"]]);
            commentaireManager::update($_POST["descriptionCommentaire"] , $_GET['id']);
            break;
        }
    case "supprimerCom":
        {
            
            commentaireManager::delete($_GET['id']);
            break;
        }
}

header("location:Routes.php?action=FRM");
