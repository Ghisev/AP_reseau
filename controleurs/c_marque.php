<?php
if (!isset($_REQUEST['action']))
	$action = "afficher" ;
else
	$action = $_REQUEST['action'] ;
	 
switch ($action)
{
	case "afficher" : { 
        $lesMarques = getLesMarques();
        require "vues/v_marque.php" ; 
        break ;          
    }
    case "supprimer" : {
        $idMarque = $_REQUEST['id'] ;
        supprimerLaMarque($idMarque) ;
        $lesMarques = getLesMarques() ;
        require "vues/v_marque.php" ; 
        break ;
    }
    case "modifier" : {
        $idMarque = $_REQUEST['id'] ;
        modifierLaMarque($idMarque) ;
        $lesMarques = getLesMarques() ;
        require "vues/v_marque.php" ; 
        break ;
    }
    case "ajouter" : {
        require "vues/v_marque_ajouter.php" ; 
        break ;
    }

    case "validajout" : {
        $libellemq = $_POST['libellemq'];
        ajouterLaMarque($libellemq);
        $lesMarques = getLesMarques();
        require "vues/v_marque.php" ; 
        break ;
    }    
}
?>
