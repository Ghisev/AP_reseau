<div class="home">
    <h1>Veuillez renseignez les Modifications</h1>

    <?php
    echo '<form action="index.php?uc=admin&action=modifVerif&idP='.$_REQUEST['idP'].'&idM='.$_REQUEST['idM'].'&qM='.$_REQUEST['qM'].'" method="POST" name="connect">';
    ?>
        <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
            <tr>
                <select name="med">
                    <option selected>Choisissez le Médicament</option>
                    <?php
                        foreach($Meds as $med) {
                            echo '<option value="'.$med[0].'">'.$med[1].'</option>';
                        }
                    ?>
                </select>
            </tr>
            <tr>
                <select name="qte">
                    <option selected>Choisissez la Fréquence</option>
                    <?php
                        foreach($Qtes as $qte) {
                            echo '<option value="'.$qte[0].'">'.$qte[1].'</option>';
                        }
                    ?>
                </select>
            </tr>
            <tr>
            <td height="34" colspan="2"><div align="center">
                <input type="submit" name="Submit" value="Modifier">
            </div></td>
            </tr>
        </table>
    </form>
</div>