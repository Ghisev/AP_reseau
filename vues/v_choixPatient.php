<div class="home">
    <h1>Veuillez Choisir le Patient dont vous voulez Modifier les Préscriptions</h1>

    <form action="index.php?uc=admin&action=afficherMedocs" method="POST" name="connect">
        <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
            <tr>
            <!-- <td width="50%""><div align="right">Nom</div></td>
            <td width="50%"><input name="nom" type="text" id="Nom"></td> -->
                <select name="patient">
                    <option selected>Choisissez le Patient</option>
                    <?php
                        foreach($lesPatients as $patient) {
                            echo '<option value="'.$patient[0].'">'.$patient[1].' '.$patient[2].'</option>';
                        }
                    ?>
                </select>
            </tr>
            <tr>
            <td height="34" colspan="2"><div align="center">
                <input type="submit" name="Submit" value="Choisir">
            </div></td>
            </tr>
        </table>
    </form>
</div>