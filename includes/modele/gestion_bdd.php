<?php
/**
 * Vérifie les identifiants de connexion et instancie les variables de session
 
 * @param $loginSaisi 
 * @param $mdpSaisi
 * @return un boolÃ©en true si utilisateur connu, false sinon 
*/
function verifierIdentificationAdm($loginSaisi,$mdpSaisi) {
    require "connexion.php" ;
    $sql="select identifiantAdm, mdpAdm from admin
          where identifiantAdm = ? and mdpAdm = ?" ;
    $exec=$bdd->prepare($sql);
    $data= [$loginSaisi, $mdpSaisi];
    $trouve = false ;
    $exec->execute($data) ;
    $ligne=$exec->fetch();
    if ($exec->rowCount() > 0) {
        $trouve = true ;
        $_SESSION['identifiantAdm']=$ligne['identifiantAdm'] ;
    }
    return $trouve ;
}

function verifierIdentificationClt($loginSaisi,$mdpSaisi) {
    require "connexion.php" ;
    $sql="select identifiantPt, mdpPt from patient
          where identifiantPt = ? and mdpPt = ?" ;
    $exec=$bdd->prepare($sql);
    $data= [$loginSaisi, $mdpSaisi];
    $trouve = false ;
    $exec->execute($data) ;
    $ligne=$exec->fetch();
    if ($exec->rowCount() > 0) {
        $trouve = true ;
        $_SESSION['identifiantPt']=$ligne['identifiantPt'];
    }
    return $trouve ;
}

// Retourne vrai si un administarteur avec l'identifiant passé en parametre existe
function verifExisteAdm($login) {
    require "connexion.php";
    $sql="select identifiantAdm from admin
          where identifiantAdm = ?";
    $exec=$bdd->prepare($sql);
    $data= [$login];
    $trouve = false ;
    $exec->execute($data) ;
    $ligne=$exec->fetch();
    if ($exec->rowCount() > 0) {
        $trouve = true ;
    }
    return $trouve ; 
}

function creationAdmin($login, $pw) {
    require "connexion.php";
    $sql="insert into admin (identifiantAdm, mdpAdm)
          values(?,?)";
    $exec=$bdd->prepare($sql);
    $data= [$login,$pw];
    $exec->execute($data);
}

// Retourne vrai si un patient avec l'identifiant passé en parametre existe
function verifExisteClt($login) {
    require "connexion.php";
    $sql="select identifiantPt from patient
          where identifiantPt = ?";
    $exec=$bdd->prepare($sql);
    $data= [$login];
    $trouve = false ;
    $exec->execute($data) ;
    $ligne=$exec->fetch();
    if ($exec->rowCount() > 0) {
        $trouve = true ;
    }
    return $trouve ; 
}

function creationPatient($login, $pw, $nom, $prenom) {
    require "connexion.php";
    $sql="insert into patient (identifiantPt, mdpPt, nomPt, prenomPt) 
          values(?,?,?,?)";
    $exec=$bdd->prepare($sql);
    $data= [$login,$pw, $nom, $prenom];
    $exec->execute($data);
}

// Retourne vrai si un médicament avec le nom passé en parametre existe
function verifExisteMedoc($nom) {
    require "connexion.php";
    $sql="select libelleMedoc from medoc 
          where libelleMedoc = ?";
    $exec=$bdd->prepare($sql);
    $data= [$nom];
    $trouve = false ;
    $exec->execute($data) ;
    $ligne=$exec->fetch();
    if ($exec->rowCount() > 0) {
        $trouve = true ;
    }
    return $trouve ; 
}

function ajoutMedicament($nom) {
    require "connexion.php";
    $sql="insert into medoc (libelleMedoc)
          values(?)";
    $exec=$bdd->prepare($sql);
    $data= [$nom];
    $exec->execute($data);
}

//Récupère tout les patient existant dans la base de donnée
function getPatients() {
    require "connexion.php";
    $sql="select idPatient, nomPt, prenomPt from patient";
    $exec=$bdd->query($sql);
    $exec->execute();
    $patients = $exec->fetchAll();
    return $patients;
}

//Récupère toutes les medications existantes dans la base de donnée pour le patient dont l'id est passe en parametre
function getMedication($idPatient) {
    require "connexion.php";
    $sql="select idPatientPrsc, idMedocPrsc, prescrire.qteMed, libelleMedoc, libelleQte 
          from prescrire 
          inner join patient on idPatient=idPatientPrsc 
          inner join medoc on idMedoc=idMedocPrsc 
          inner join quantite on quantite.qteMed=prescrire.qteMed 
          where idPatientPrsc=?";
    $exec=$bdd->prepare($sql);
    $data= [$idPatient];
    $exec->execute($data);
    $meds = $exec->fetchAll();
    return $meds;
}

//Permet de supprimer une medication
function suppMedction($idP, $idM, $qM) {
    require "connexion.php";
    $sql="delete from prescrire
          where idPatientPrsc=? and idMedocPrsc=? and qteMed=?";
    $exec=$bdd->prepare($sql);
    $data= [$idP,$idM,$qM];
    $exec->execute($data);
}

//Récupère tout les medicaments existant dans la base de donnée
function getMedocs() {
    require "connexion.php";
    $sql="select idMedoc, libelleMedoc from medoc";
    $exec=$bdd->query($sql);
    $exec->execute();
    $meds = $exec->fetchAll();
    return $meds;
}

//Récupère tout les patient existant dans la base de donnée
function getQtes() {
    require "connexion.php";
    $sql="select qteMed, libelleQte from quantite";
    $exec=$bdd->query($sql);
    $exec->execute();
    $qtes = $exec->fetchAll();
    return $qtes;
}

//Permet de Modifier une medication
function modifMedction($idP, $idM, $qM) {
    require "connexion.php";
    $sql="update prescrire 
          set idMedocPrsc=?, prescrire.qteMed=? 
          where idPatientPrsc=? and idMedocPrsc=? and prescrire.qteMed=?";
    $exec=$bdd->prepare($sql);
    $data= [$_REQUEST['med'],$_REQUEST['qte'],$idP,$idM,$qM];
    $exec->execute($data);
}

//Permet d'ajouter une médication
function addMdction($idP, $idM, $qM) {
    require "connexion.php";
    $sql="insert into prescrire
          values(?,?,?)";
    $exec=$bdd->prepare($sql);
    $data= [$idP,$idM,$qM];
    $exec->execute($data);
}

function getIdPt($lg) {
    require "connexion.php";
    $sql="select idPatient from patient
          where identifiantPt=?";
    $exec=$bdd->prepare($sql);
    $data= [$lg];
    $exec->execute($data);
    $id=$exec->fetch();
    return $id;
}