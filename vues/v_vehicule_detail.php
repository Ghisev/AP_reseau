<div class="home">
    
    <div id="Home_title">Informations détaillées d'un véhicule</div>
    <table class="table table-striped">   
    <?php           
        
        echo '<tr>
            <th>Marque</th>
            <th>Modèle</th>
        </tr>
        <tr>
            <td>'.$leVehicule['mq_libelle'].'</td>
            <td>'.$leVehicule['md_libelle'].'</td>
        </tr>
        <tr>
            <th>Energie</th>
            <th>Kilométrage</th>
        </tr>
        <tr>
            <td>'.$leVehicule['ng_libelle'].'</td>
            <td>'.$leVehicule['vh_km'].'</td>
        </tr>
        <tr>
            <th>Couleur</th>
            <th>Prix</th>
        </tr>
        <tr>
            <td>'.$leVehicule['vh_couleur'].'</td>
            <td>'.$leVehicule['vh_prix'].'</td>
        </tr>
        <tr>
            <th colspan = "2">Options</th>
        </tr>
        <tr>
            <td colspan = "2">'.$leVehicule['vh_options'].'</td>
        </tr>';
        
    ?>
    </table>
</div>