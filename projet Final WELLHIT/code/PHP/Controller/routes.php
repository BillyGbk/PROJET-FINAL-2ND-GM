<?php
// Le fichier Route permet de gérer toutes les ouvertures de pages

//on definit les constantes qui permet de definir les chemins
if (!class_exists("Settings")) require "Settings.class.php";
Settings::init();
Define ( "adresseRoot" , $_SERVER["DOCUMENT_ROOT"].Settings::getAdresseRoot()) ;
Define ("serverRoot",Settings::getServerRoot());

// La fonction afficherPage, prend 3 paramètres
// Le chemin où trouver les pages, le nom de la partie contenu à afficher et le titre à donner à la page
function afficherPage($chemin, $page, $titre)
{
	require $chemin . "Header.php";
    require $chemin . $page;
    require $chemin . 'Footer.php';
}

// A l'include de la page Route, le code suivant est exécuté
// Si la variable $get existe, on exploite les informations pour afficher la bonne page
if (isset($_GET['action'])) {
    // En fonction de ce que contient la variable action de $_GET, on ouvre la page correspondante

    switch ($_GET['action']) {



		case 'connect':
		{
			afficherPage(adresseRoot . 'PHP/View/', 'pageConnexion.php', "Connexion");
			break;
        }
        case 'VC':
		{
			afficherPage(adresseRoot . 'PHP/View/', 'verifConnexion.php', "Connexion");
			break;
        }
        case 'Deconnect':
		{
			afficherPage(adresseRoot . 'PHP/View/', 'deconnexion.php', "Connexion");
			break;
        }
        case 'inscrip':
		{
			afficherPage(adresseRoot . 'PHP/View/', 'pageInscription.php', "Connexion");
			break;
        }
        case 'VI':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'verifInscription.php', "Inscription");
            break;
        }
        case 'AG':
        {
             afficherPage(adresseRoot . 'PHP/View/', 'avantGuerre.php', "Avant Guerre");
             break;
        }
        case '2GM':
        {
                afficherPage(adresseRoot . 'PHP/View/', 'secondeGuerreMondiale.php', "2nd Guerre Mondiale");
                break;
        }
        case 'PI':
        {
                afficherPage(adresseRoot . 'PHP/View/', 'les Pays Impliques.php', "Pays impliqués");
                break;
        }
        case 'BHM':
        {
                afficherPage(adresseRoot . 'PHP/View/', 'bilanHumain.php', "Pays impliqués");
                break;
        }
        case '17S':
        {
                afficherPage(adresseRoot . 'PHP/View/', '17S.php', "17 Septembre 1944");
                break;
        }
        case '18S':
        {
                afficherPage(adresseRoot . 'PHP/View/', '18S.php', "18 Septembre 1944");
                break;
        }
        case '19S':
        {
            afficherPage(adresseRoot . 'PHP/View/', '19S.php', "19 Septembre 1944");
            break;
        }
        case '20S':
        {
            afficherPage(adresseRoot . 'PHP/View/', '20S.php', "20 Septembre 1944");
            break;
        }
        case '21S':
        {
            afficherPage(adresseRoot . 'PHP/View/', '21S.php', "21 Septembre 1944");
            break;
        }
        case '22S':
        {
            afficherPage(adresseRoot . 'PHP/View/', '22S.php', "22 Septembre 1944");
            break;
        }
        case 'Allemand':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'uniformesAllemand.php', "Allemand");
            break;
        }
        case 'Anglais':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'uniformesAnglais.php', "Anglais");
            break;
        }
        case 'Canadien':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'UniformesCanadien.php', "Canadien");
            break;
        }case 'accueil':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'pagePrincipale.php', "pagePrincipale");
            break;
        }
        case 'FRM':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'forum.php', "Pays impliqués");
            break;
        }
        case 'contact':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'formulaireDeContact.php', "contact");
            break;
        }
        case 'envoyer le message':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'formulaireContactVerif.php', "contact");
            break;
        }
        case 'ajoutCom':
        case 'modifCom':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'commentaireForm.php', "contact");
            break;
        }
        case 'ajoutComAction':
        case 'modifComAction':
        {
            afficherPage(adresseRoot . 'PHP/View/', 'commentaireAction.php', "contact");
            break;
        }
        case 'supprimerCom':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'commentaireAction.php', "contact");
                break;
            }

            
        
       
    }
} else { // Sinon, on affiche la page principale du site
    afficherPage(adresseRoot . 'PHP/View/', 'pagePrincipale.php', "Connexion");
}