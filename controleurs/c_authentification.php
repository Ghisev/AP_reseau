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
        $loginSaisi = $_POST['login'];
        $mdpSaisi = md5($_POST['pass']);
        if(verifierIdentificationAdm($loginSaisi,$mdpSaisi))
        {
            header ("Location: index.php?uc=admin");
        }
        else
        {
            if(verifierIdentificationClt($loginSaisi, $mdpSaisi))
            {
                header ("Location: index.php?uc=accueil&action=client&lgnPt=$loginSaisi");
            }
            else
            {
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