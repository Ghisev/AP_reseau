<?php
    if(!isset($_SESSION['lgn'])) {
        header ("Location: index.php");
    }
?>
<div class="home">
    <h1>Veuillez Ajouter ou Supprimer ou encore Modifier une médication</h1>

    <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
        <tr>
            <td>Médicament</td>
            <td>A prendre</td>
        </tr>
        <?php
            $Meds = getMedication($_SESSION['idPt'][0]);
            $max = count($Meds)-1;
            for($i=0; $i<=$max; $i++) {
                echo '<tr><td>'.$Meds[$i][3].'</td>
                      <td>'.$Meds[$i][4].'</td></tr>';
            }
        ?>
    </table>
    <a href="index.php?uc=deconnexion"><button>Déconnexion</button></a>
    </form>
</div>