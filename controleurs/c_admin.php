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
        $id = $_POST['id'];
        $mdp = md5($_POST['pw']);
        if(!verifExisteAdm($id))
        {
            creationAdmin($id,$mdp);
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
        $id = substr($nom,0,3).$prenom;
        $mdp = md5($id);
        if(!verifExisteClt($id))
        {
            creationPatient($id,$mdp,$nom,$prenom);
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
        $idP = $_REQUEST['idP'];
        $idM = $_REQUEST['idM'];
        $qM = $_REQUEST['qM'];
        suppMedction($idP, $idM, $qM);
        header ("Location: index.php?uc=admin&action=afficherMedocs&patient=$idP");
        break;
    }
    case "modif" : {
        $idP = $_REQUEST['idP'];
        $idM = $_REQUEST['idM'];
        $qM = $_REQUEST['qM'];
        $Meds = getMedocs();
        $Qtes = getQtes();
        include "vues/v_modifMed.php";
        break;
    }
    case "modifVerif" : {
        $idP = $_REQUEST['idP'];
        $idM = $_REQUEST['idM'];
        $qM = $_REQUEST['qM'];
        modifMedction($idP, $idM, $qM);
        header ("Location: index.php?uc=admin&action=afficherMedocs&patient=$idP");
        break;
    }
    case "ajouterMdction" : {
        $idP = $_REQUEST['idPt'];
        $idM = $_REQUEST['idmed'];
        $qM = $_REQUEST['qtem'];
        addMdction($idP, $idM, $qM);
        header ("Location: index.php?uc=admin&action=afficherMedocs&patient=$idP");
        break;
    }
}
?>