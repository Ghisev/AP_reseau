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
function getLesVehicules() {
    require "connexion.php" ;
    $sql = "select mq_libelle, md_libelle, vh_km, vh_annee, vh_prix, vh_id "
            . "from vehicule "
            . "inner join modele on vh_md_id = md_id "
            . "inner join marque on md_mq_id = mq_id "
            . "order by mq_libelle, md_libelle" ;
    $exec=$bdd->query($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getLeVehicule($id) {
    require "connexion.php" ;
    $sql = "select mq_libelle, md_libelle, ng_libelle, vh_km, vh_couleur, vh_prix, vh_options
            from vehicule
            inner join modele on vh_md_id = md_id
            inner join marque on md_mq_id = mq_id
            inner join energie on vh_ng_id = ng_id
            where vh_id = ?" ;
    $exec=$bdd->prepare($sql) ;
    $data = [$id] ;
    $exec->execute($data) ;
    $curseur=$exec->fetch() ;
    return $curseur ;
}

function getLesMarques() {
    require "connexion.php" ;
    $sql = "select mq_libelle, mq_id
            from marque
            order by mq_libelle asc" ;
    $exec=$bdd->query($sql) ;
    $exec->execute() ;
    $curseur=$exec->fetchAll();
    return $curseur;
}

function getLaMarque($id) {
    require "connexion.php" ;
    $sql = "select mq_libelle
            from marque
            where mq_id = ?" ;
    $exec=$bdd->prepare($sql) ;
    $data = [$id] ;
    $exec->execute($data) ;
    $curseur=$exec->fetch() ;
    return $curseur ;
}

function supprimerLaMarque($id) {
    require "connexion.php" ;
    $sql = "DELETE FROM MODELE
            where md_id = ?;
            DELETE FROM MARQUE
            where mq_id = ?" ;
    $exec=$bdd->prepare($sql) ;
    $data = [$id,$id] ;
    $exec->execute($data) ;    
}

function ajouterLaMarque($libellemq) {
    require "connexion.php" ;
    $sql = "INSERT INTO MARQUE (mq_libelle)
            VALUES (?)" ;
    $exec = $bdd->prepare($sql) ;
    $data = [$libellemq] ;
    $exec->execute($data) ; 
}