<?php
if (!isset($_REQUEST['uc'])) {
    $uc = "accueil" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}

switch ($uc)
{
    case 'accueil' : {  include "c_accueil.php" ; break ;} 
    case 'deconnexion' : {  include "c_deconnexion.php" ; break ;} 
    case 'authentification' : {  include "c_authentification.php" ; break ;}
    case 'marque' : {   include "c_marque.php" ; break ;}
}

?>


