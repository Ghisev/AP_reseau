

<form method="POST" action="index.php?uc=authentification&action=verifier">
    <?php
        if (!isset($_SESSION['tl_login']))
        {
            echo '<input type="text" id="loginUser" size="16" placeholder="Login" name="login" required>
            <input type="password" id="passwordUser" size="16" placeholder="******" name="mdp" required>
            <button type="submit">OK</button>';
        }
    ?>
    
</form>
<div class="home">
    
    <div id="Home_title">Liste de tous les véhicules</div>
    <table class="table table-striped">   
        <tr>
            <th>N°</th>
            <th>Marque</th>
            <th>Modèle</th>  
            <th>Km</th>
            <th>Prix</th>
        </tr>
        <?php
        $cpt = 1;
        foreach ($lesVehicules as $leVehicule) {
            echo '<tr>'
            . '<td> <a href="index.php?uc=accueil&action=detail&id='.$leVehicule['vh_id'].'">' .$cpt++.'</a></td>'
            . '<td>' . $leVehicule['mq_libelle'] . '</td>'
            . '<td>' . $leVehicule['md_libelle'] . '</td>'
            . '<td>' . $leVehicule['vh_km'] . '</td>'
            . '<td>' . number_format($leVehicule['vh_prix'], 2, ',', ' ') . ' €</td>'
            . '</tr>';
        }
        ?>
    </table>
</div>