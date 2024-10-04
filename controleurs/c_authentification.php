<?php
if (!isset($_REQUEST['action']))
	$action = "verifier" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
{
	case "verifier" : {  
		$loginSaisi = $_POST['login'] ; 
		$mdpSaisi = md5($_POST['mdp']) ;
		
		if (verifierIdentification($loginSaisi, $mdpSaisi)) {
			header ("Location:index.php");
		}
		else {
			session_destroy();
			header ("Location:index.php?uc=accueil") ; 
		}

		break ; 
	}
}
?>
