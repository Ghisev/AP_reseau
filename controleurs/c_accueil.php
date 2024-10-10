<?php
if (!isset($_REQUEST['action']))
	$action = "afficher" ;
else {
	$action = $_REQUEST['action'] ;
}
	
switch ($action)
{
	case "afficher" : {
        require "vues/v_accueil.php";
        break ;
    }
    case "client" : {
        $lgn = $_REQUEST['lgnPt'];
        $_SESSION['idPt'] = getIdPt($lgn);
        require "vues/v_afficherMdctns.php";
        break ;
    }
}
?>
