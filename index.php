<?php

session_start();

include('setup.php');
include('mvc/mod/requetesMessages.php');
include('mvc/cont/fonctions.php');
include('mvc/cont/lesMessages.php');

$messages = new LesMessages();	
$messages->ajouterMessage();
$pseudo = $messages->retenirPseudo();
$liste = $messages->afficheLesMessages();

include('mvc/vue/template.php');

?>