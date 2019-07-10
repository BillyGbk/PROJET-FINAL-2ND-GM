<?php 
if (empty($_SESSION))
{
      header("location:Routes.php");
}
else
{


echo '<br><h2>Bienvenue dans le forum</h2><br><div class="btn"><a href="'.Settings::getServerRoot().'?action=ajoutCom">Ajouter un Commentaire : </a></div>
<section>';

$commentaire = commentaireManager::getList();


    if (!empty($commentaire))
		{
            
            foreach ( $commentaire as $elt )
            {
                $utilisateur = utilisateurManager::getById($elt->getIdUtilisateur())->getPseudoUtilisateur();
                $idUtilisateur = $elt->getIdUtilisateur();
                echo '<div class="commentaire">
                <div class="pseudoCommentaire">'.$utilisateur.'</div>
                <div class="element">
                <div class="descriptionCommentaire" id="'.$elt->getIdCommentaire().'" >'.$elt->getDescriptionCommentaire().'</div>
                ';
                if ( $_SESSION['idUtilisateur'] == $idUtilisateur )
                {
                    echo '<div class="modifCom"><a href="'.Settings::getServerRoot().'?action=modifCom&id='.$elt->getIdCommentaire().'&text='.$elt->getDescriptionCommentaire().'">Modifier  </a></div>
                          <div class="supprCom"><a href="'.Settings::getServerRoot().'?action=supprimerCom&id='.$elt->getIdCommentaire().'&text='.$elt->getDescriptionCommentaire().'">Supprimer  </a></div>';
                }

                echo'</div></div>';
            }
            

		}
	else
		{
            echo ' <h2> Il n\'y a toujours pas de commentaire, soyez le premier à commnter notre site</h2>';
            
            }
}

?>
</section>