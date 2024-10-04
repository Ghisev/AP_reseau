<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link type="text/css" rel="stylesheet" href="includes/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="includes/css/dashboard.css">
    <link rel="icon" href="logo.png" width="16" height="16">
</head>

<body>
<div class="loader"></div>
<div class="bgloader"></div>
<div id="background"></div>
    <!--<h1 class="titre" style="text-align:center;">Connexion <br> Administrateur</h1>-->
    <center>
    <div class="titre">
      <div class="glyphicon glyphicon-user " id="usericon"></div>
    </div>
  </center>
<div class="container">
    <div class="col-lg-6 col-md-10 col-lg-offset-3 col-md-offset-5" id="formulaire">
        <p><?php
            if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }

            ?></p>
        <form id="connect" method="POST" action="index.php?uc=auth&action=verif" style="margin-top:8%;">
            <?php
            if (isset($_SESSION['error'])) echo $_SESSION['error'] ;
            ?>
            <center><input type="text" id="loginUser" size="32" class="form-control loginconnect" placeholder="Votre Pseudo" name="login" required></center>
            <center><input type="password" id="passwordUser" size="32" class="form-control passwordconnect" placeholder="******" name="mdp" required></center>
            <center><button type="submit" class="btn btn-primary connectbt"><i class="fa fa-connectdevelop fa-lg"  aria-hidden="true"></i>Se connecter </button></center>
        </form>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="includes/js/connexionstyle.js"></script>
</html>