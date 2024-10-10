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
    case "deconnexion" : {
        $_SESSION = array() ;
        $_REQUEST = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        session_unset();
        session_destroy();
        header ("Location:index.php");
        include "vues/v_accueil.php";
        break;
    }
}

?>