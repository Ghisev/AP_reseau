<?php
if (!isset($_REQUEST['action']))
{
    $action = "verifier";
}
else
{
    $action = $_REQUEST['action'];
}

switch ($action)
{
    case "verifier" : {
        $_SESSION['lgn'] = $_POST['login'];
        $_SESSION['mdpSaisi'] = md5($_POST['pass']);
        if(verifierIdentificationAdm($_SESSION['lgn'],$_SESSION['mdpSaisi']))
        {
            header ("Location: index.php?uc=admin");
        }
        else
        {
            if(verifierIdentificationClt($_SESSION['lgn'], $_SESSION['mdpSaisi']))
            {
                header ("Location: index.php?uc=accueil&action=client&lgnPt=".$_SESSION['lgn']);
            }
            else
            {
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
                header ("Location: index.php?uc=accueil");
            }
        }
        break;
    }
    case "afficher" : {
        include "vues/v_authentification.php";
        break;
    }
}
?>