<?php
if (!isset($_REQUEST['action']))
	$action = "afficher" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
{
	case "afficher" : { 
            $lesVehicules = getLesVehicules();
            require "vues/v_vehicule_liste.php" ; 
            break ;          
        }
    case "detail" : {
            $idVehicule = $_REQUEST['id'] ;
            $leVehicule = getLeVehicule($idVehicule);
            require "vues/v_vehicule_detail.php" ;
            break ; 

        }
}
?>
