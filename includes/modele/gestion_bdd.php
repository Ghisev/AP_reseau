<?php
/**
 * Vérifie les identifiants de connexion et instancie les variables de session
 
 * @param $loginSaisi 
 * @param $mdpSaisi
 * @return un boolÃ©en true si utilisateur connu, false sinon 
*/
function verifierIdentification($loginSaisi,$mdpSaisi) {
    require "connexion.php" ;
    $sql="select tl_login, tl_droit, tl_mdp from utilisateur
          where tl_login = ? and tl_mdp = ?" ;
    $exec=$bdd->prepare($sql);
    $data= [$loginSaisi, $mdpSaisi];
    $trouve = false ;
    $exec->execute($data) ;
    $ligne=$exec->fetch();
    if ($exec->rowCount() > 0) {
        $trouve = true ;
        $_SESSION['tl_login']=$ligne['tl_login'] ;
        $_SESSION['tl_droit']=$ligne['tl_droit'] ;
    }

    return $trouve ;
}

/**
 * Liste des tous les véhicules classés dans l'ordre alphabétique de la marque et du modèle
 
 * @param aucun
 * @return un curseur contenant l'ensemble des lignes à afficher
*/
?>
