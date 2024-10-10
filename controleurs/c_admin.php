<?php
if (!isset($_REQUEST['action'])) {
    $action = "choix" ;
}
else {
    $action = $_REQUEST['action'] ;
}

switch ($action)
{
    case "choix" : {
        include "vues/v_choixAdmin.php";
        break;
    }
    case "creerAdm" : {
        include "vues/v_creationAdm.php";
        break;
    }
    case "verifierCreationAdm" : {
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['mdp'] = md5($_POST['pw']);
        if(!verifExisteAdm($_SESSION['id']))
        {
            creationAdmin($_SESSION['id'],$_SESSION['mdp']);
            header ("Location: index.php?uc=VALIDATION");
        }
        else
        {
            header ("Location: index.php?uc=ERREUR");
        }
        break;
    }
    case "creerClt" : {
        include "vues/v_creationClient.php";
        break;
    }
    case "verifierCreationClt" : {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $_SESSION['id'] = substr($nom,0,3).$prenom;
        $_SESSION['mdp'] = md5($_SESSION['id']);
        if(!verifExisteClt($_SESSION['id']))
        {
            creationPatient($_SESSION['id'],$_SESSION['mdp'],$nom,$prenom);
            header ("Location: index.php?uc=VALIDATION");
        }
        else
        {
            header ("Location: index.php?uc=ERREUR");
        }
        break;
    }
    case "ajoutMdcmt" : {
        include "vues/v_ajoutMedicament.php";
        break;
    }
    case "verifierCreationMedoc" : {
        $nom = $_POST['nom'];
        if(!verifExisteMedoc($nom))
        {
            ajoutMedicament($nom);
            header ("Location: index.php?uc=VALIDATION");
        }
        else
        {
            header ("Location: index.php?uc=ERREUR");
        }
        break;
    }
    case "gerer" : {
        $lesPatients = getPatients();
        include "vues/v_choixPatient.php";
        break;
    }
    case "afficherMedocs" : {
        $Meds = getMedocs();
        $Qtes = getQtes();
        include "vues/v_gestionMedication.php";
        break;
    }
    case "supp" : {
        $_SESSION['idP'] = $_REQUEST['idP'];
        $_SESSION['idM'] = $_REQUEST['idM'];
        $_SESSION['qM'] = $_REQUEST['qM'];
        suppMedction($_SESSION['idP'], $_SESSION['idM'], $_SESSION['qM']);
        header ("Location: index.php?uc=admin&action=afficherMedocs&patient=".$_SESSION['idP']);
        break;
    }
    case "modif" : {
        $_SESSION['idP'] = $_REQUEST['idP'];
        $_SESSION['idM'] = $_REQUEST['idM'];
        $_SESSION['qM'] = $_REQUEST['qM'];
        $Meds = getMedocs();
        $Qtes = getQtes();
        include "vues/v_modifMed.php";
        break;
    }
    case "modifVerif" : {
        $_SESSION['idP'] = $_REQUEST['idP'];
        $_SESSION['idM'] = $_REQUEST['idM'];
        $_SESSION['qM'] = $_REQUEST['qM'];
        modifMedction($_SESSION['idP'], $_SESSION['idM'], $_SESSION['qM']);
        header ("Location: index.php?uc=admin&action=afficherMedocs&patient=".$_SESSION['idP']);
        break;
    }
    case "ajouterMdction" : {
        $_SESSION['idP'] = $_REQUEST['idPt'];
        $_SESSION['idM'] = $_REQUEST['idmed'];
        $_SESSION['qM'] = $_REQUEST['qtem'];
        addMdction($_SESSION['idP'], $_SESSION['idM'], $_SESSION['qM']);
        header ("Location: index.php?uc=admin&action=afficherMedocs&patient=".$_SESSION['idP']);
        break;
    }
}
?>