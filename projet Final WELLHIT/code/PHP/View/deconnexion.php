<?php

session_destroy();
$titre="Déconnexion";

echo '<section>Vous êtes à présent déconnecté </section>';
header("refresh:3;url=Routes.php");
?>