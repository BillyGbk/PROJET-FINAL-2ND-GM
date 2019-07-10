<div class='formulaire'>
        <h1>Formulaire</h1>
        <form method="post" id=formulaire action="<?php echo Settings::getServerRoot().'?action=VI';    ?>" >

            <label for='nom'>Nom  : </label>
            <input type='text' name='nomUtilisateur' class='champ'  id='NomUtilisateur' maxlength='20' required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$" >
            <span class='image'></span>
            <span class="span" id='erreurNom'></span><br>


            <label for='prenomUtilisateur'>Prénom  : </label>
            <input type='text' name='prenomUtilisateur' class='champ'  id='prenomUtilisateur' maxlength='20' required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$"  >
            <span class='image'></span>
            <span class="span" id='erreurprenomUtilisateur'></span><br>

            <label for='pseudo'>Pseudo  : </label>
            <input type='text' name='pseudoUtilisateur' class='champ'  id='pseudo' maxlength='20' required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$"  >
            <span class='image'></span>
            <span class="span" id='erreurPseudo'></span><br>

            <label for='date'>Date de naissance  : </label>
            <input type='date' name='dateUtilisateur'  class='champ' id='Date De naissance'    required >
            <span class='image'></span>
            <span class="span" id='erreurDate De naissance'></span><br>


            <label for='mdp'>Mot de passe :</label>
            <input type='password' class='champ' name='motDePasse'   id='Mot De passe' required >
            <span class='image'></span>
            <span class="span" id='erreurMot De passe'></span><br>

            <label for='mdp'>Confirmez votre mot de passe :</label>
            <input type='password' class='champ' name='confirm'   id='Mot De passe' required >
            <span class='image'></span>
            <span class="span" id='erreurMot De passe'></span><br>

            <label for='theme'>Theme :</label>
            <select name="theme" class='champ'>
            <?php
            $list = themeManager::getList() ;
            var_dump($list);
            foreach ( $list as $elt)
            {
               echo '
               <option value="'.$elt->getDescriptionTheme().'">'.$elt->getDescriptionTheme().'</option>';
            }
            

            ?>
            </select><br>
            


            <input id="acceptTerms" type="checkbox" name="acceptTerms" />
            <label for="acceptTerms"> J'accepte<a href=""></a>les conditions d'utilisation</a> et la <a>politique de confidentialité</a> </label><br>

            <input type='submit' class='button' value='Valider' id='valider' ><br><br>



        
        
</form> 
    </div>