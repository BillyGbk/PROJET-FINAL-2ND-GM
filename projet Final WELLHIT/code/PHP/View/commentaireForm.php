<?php

if (isset($_GET['action'])) {
    // En fonction de ce que contient la variable action de $_GET, on ouvre la page correspondante

    switch ($_GET['action']) {

        case 'ajoutCom':
		{
            echo'<section>
            <form method="post" id=formulaire action="'.Settings::getServerRoot().'?action=ajoutComAction" >
            <label for="commentaire" class="titreCom"  >Merci d\'indiquer votre commentaire :</label><br>

            <textarea id="commentaire" name="descriptionCommentaire"
                placeholder="Tapez votre texte ici"      rows="20" cols="90">
           
            </textarea><br><br>
            <input type="submit" class="button" value="Valider" id="valider">
            <input type="reset" class="button" value="Annuler" id="Annuler" onclick=\'location.href="Routes.php?action=FRM"\'><br><br>
            </form>
            </section>';
            break ;
        }
        case 'modifCom':
            {
                echo'<section>
                <form method="post" id=formulaire action="'.Settings::getServerRoot().'?action=modifComAction&id="'.$_GET['id'].'" >
                <label for="commentaire" class="titreCom"  >Merci de modifier votre commentaire :</label><br>
    
                <textarea id="commentaire" name="descriptionCommentaire"
                          rows="20" cols="90">
                '.$_GET['text'].'
                </textarea><br><br>
                <input type="submit" class="button" value="Valider" id="valider">
                <input type="reset" class="button" value="Annuler" id="Annuler" onclick=\'location.href="Routes.php?action=FRM"\'><br><br>

                </form>
                </section>'; 
                break ;
            }
    }
}
        