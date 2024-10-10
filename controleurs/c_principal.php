<?php
if (!isset($_REQUEST['uc'])) {
    $uc = "accueil" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}

switch ($uc)
{
    case "accueil" : {
        include "c_accueil.php" ;
        break ;
    }
    case "connexion" : {
        include "c_authentification.php";
        break;
    }
    case "admin" : {
        include "c_admin.php";
        break;
    }
    case "VALIDATION" : {
        include "vues/v_valid.php";
        break;
    }
    case "ERREUR" : {
        include "vues/v_erreur.php";
        break;
    }
}

?>