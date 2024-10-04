<table class="table table-striped">   
    <tr>
        <th colspan = "3">Gestion des marques des véhicules</th>
    </tr>
    <tr>
        <td colspan = "3">Ajouter une nouvelle marque<form method="POST" action="index.php?uc=marque&action=ajouter"><button type="submit"><img src="includes/img/plus.png"></button></form></td>
    <tr> 
        <th>Marque</th>
    </tr>
    <?php
    foreach ($lesMarques as $laMarque) {
        echo '<tr>'
        . '<td>' . $laMarque['mq_libelle'] . '</td>'
        . '<td>' . '<form method="POST" action="index.php?uc=marque&action=modifier&id='.$laMarque['mq_id'].'"><button type="submit">Modifier</button></form>' . '</td>'
        . '<td>' . '<form method="POST" action="index.php?uc=marque&action=supprimer&id='.$laMarque['mq_id'].'"><button type="submit">Supprimer</button></form>' . '</td>'
        . '</tr>';
    }
    ?>
</table>

