<!DOCTYPE html>
<html lang="fr">

<head>

<?php

function chargerClasse($classe)
{
    if (file_exists(adresseRoot . "Php/Controller/" . $classe . ".class.php")) {
        require adresseRoot . "Php/Controller/" . $classe . ".class.php";
    }

    if (file_exists(adresseRoot . "Php/Model/" . $classe . ".class.php")) {
        require adresseRoot . "Php/Model/" . $classe . ".class.php";
    }

}
spl_autoload_register("chargerClasse");

// initialise une connection
DbConnect::init();
session_start();
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre)) ? '<title>' . $titre . '</title>' : '<title> Operation Wellhit </title>';
?>
    <meta charset='utf-8'>
    <title>Opération Wellhit</title>
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo Settings::getAdresseRoot(); ?>CSS/projectWar.css" type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Settings::getAdresseRoot(); ?>JS/script.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $.sbCookieConsentBar({
                        message: 'Ce site utilise des cookies pour optimiser votre expérience de navigation. En continuant votre visite sur notre site, vous consentez à l’utilisation de Cookies.',
                        acceptButton: true,
                        acceptText: 'Accepter',
                        declineButton: true,
                        declineText: 'Refuser',
                        policyButton: false,
                        policyText: 'En savoir plus',
                        policyURL: '/cookies/',
                        acceptOnContinue: false,
                        effect: 'fade',
                        element: 'body',
                        fixed: true,
                        bottom: false
                    });
                });
            </script>
    <?php 
    
    if (!empty($_SESSION['theme']))
    {
        echo '<link rel="stylesheet" href="'.Settings::getAdresseRoot().'CSS/'.$_SESSION["theme"].'.css" type="text/css"> ';
    }
    
    ?>
</head>

<body>
<header>

        <h1>Opération Wellhit</h1>
        <nav>
            <ul id="menu">
                <li class="btn"><a href="<?php echo Settings::getServerRoot()?>">Accueil</a></li>
                <li class="btn"><a href="#histoire">Histoire & Politique</a>
                    <ul class="sousMenu">
                        <li><a href="<?php echo Settings::getServerRoot()."?action=AG";?>">L'Avant-Guerre</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=2GM";?>">La Seconde Guerre mondiale</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=PI";?>">Les Pays Impliqués</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=BHM";?>">Bilan Humain et Matériel</a></li>
                    </ul>
                </li>
                <li class="btn"><a href="#evenements">Événements Militaires</a>
                    <ul class="sousMenu">
                        <li><a href="<?php echo Settings::getServerRoot()."?action=17S";?>">17 Septembre 1944</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=18S";?>">18 Septembre 1944</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=19S";?>">19 Septembre 1944</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=20S";?>">20 Septembre 1944</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=21S";?>">21 Septembre 1944</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=22S";?>">22 Septembre 1944</a></li>
                    </ul>
                </li>
                <li class="btn"><a href="#uniformes">Uniformes</a>
                    <ul class="sousMenu">
                        <li><a href="<?php echo Settings::getServerRoot()."?action=Allemand";?>">Allemand</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=Anglais";?>">Anglais</a></li>
                        <li><a href="<?php echo Settings::getServerRoot()."?action=Canadien";?>">Canadien</a></li>
                    </ul>
                </li>
                <li class="btn cache"><a href="#forum">Forum</a></li>
                <?php 
                
                if (empty($_SESSION['pseudoUtilisateur']))
                {
                    echo '<li class="btn"><a href="'.Settings::getServerRoot().'?action=connect">Connexion</a></li>';
                }
                else
                {
                    echo ' <li class="btn"><a href="'.Settings::getServerRoot().'?action=FRM">Forum</a></li>';
                    echo ' <li class="btn"><a href="'.Settings::getServerRoot().'?action=Deconnect">Deconnexion</a></li>';
                }

               
                ?>
            </ul>
        </nav>
    </header>
    <body>