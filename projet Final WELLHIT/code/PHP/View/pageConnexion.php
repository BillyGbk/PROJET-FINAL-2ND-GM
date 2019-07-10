<div class='formulaire'>
        <h1>Formulaire</h1>
        <form method="post" id=formulaire action="<?php echo Settings::getServerRoot().'?action=VC';    ?>" >

            

            <label for='prenom'>Pseudo  : </label>
            <input type='text' name='pseudoUtilisateur' class='champ'  id='Prenom' maxlength='20' required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$"  >
            <span class='image'></span>
            <span class="span" id='erreurPrenom'></span><br>


            <label for='mdp'>Mot de passe :</label>
            <input type='password' class='champ' name='motDePasse'   id='Mot De passe' required >
            <span class='image'></span>
            <span class="span" id='erreurMot De passe'></span><br>


            

            <input type='submit' class='button' value='Valider' id='valider' ><br><br>

            <a href="<?php echo Settings::getServerRoot().'?action=inscrip' ; ?>"> Pas encore inscrit ? </a> 




        
        
</form> 
    </div>