<?php
    if(!isset($_SESSION['lgn'])) {
        header ("Location: index.php");
    }
?>
<div class="home">
    <h1>Veuillez Ajouter ou Supprimer ou encore Modifier une médication</h1>

    <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
        <tr>
            <td></td>
            <td></td>
            <td>Médicament</td>
            <td>A prendre</td>
        </tr>
        <?php
            $Meds = getMedication($_REQUEST['patient']);
            $max = count($Meds)-1;
            for($i=0; $i<=$max; $i++) {
                echo '<tr>
                      <td><a href="index.php?uc=admin&action=supp&idP='.$Meds[$i][0].'&idM='.$Meds[$i][1].'&qM='.$Meds[$i][2].'">Supprimer</a></td>
                      <td><a href="index.php?uc=admin&action=modif&idP='.$Meds[$i][0].'&idM='.$Meds[$i][1].'&qM='.$Meds[$i][2].'">Modifier</a></td>
                      <td>'.$Meds[$i][3].'</td>
                      <td>'.$Meds[$i][4].'</td></tr>';
            }
        ?>
    </table>
    <?php echo'<form action="index.php?uc=admin&action=ajouterMdction&idPt='.$_REQUEST['patient'].'" method="POST" name="connect">'?>
        <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
            <tr>
                <select name="idmed">
                    <option selected>Choisissez le Médicament</option>
                    <?php
                        $Medocs = getMedocs();
                        foreach($Medocs as $medoc) {
                            echo '<option value="'.$medoc[0].'">'.$medoc[1].'</option>';
                        }
                    ?>
                </select>
            </tr>
            <tr>
                <select name="qtem">
                    <option selected>Choisissez la Fréquence</option>
                    <?php
                        $Qtes = getQtes();
                        foreach($Qtes as $qte) {
                            echo '<option value="'.$qte[0].'">'.$qte[1].'</option>';
                        }
                    ?>
                </select>
            </tr>
            <td height="34" colspan="2"><div align="center">
                <input type="submit" name="Submit" value="Ajouter">
            </div></td>
            </tr>
        </table>
    </form>
    <br><br>
    <form action="index.php?uc=admin&action=gerer" method="POST" name="connect">
        <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
            <tr>
                <td height="34" colspan="2">
                    <div align="center">
                        <input type="submit" name="Submit" value="Retour">
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>