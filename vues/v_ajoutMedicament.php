<?php
    if(!isset($_SESSION['lgn'])) {
        header ("Location: index.php");
    }
?>
<div class="home">
    <h1>Veuillez Ajouter le Médicament</h1>

    <form action="index.php?uc=admin&action=verifierCreationMedoc" method="POST" name="connect">
        <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
            <tr>
            <td width="50%""><div align="right">Nom</div></td>
            <td width="50%"><input name="nom" type="text" id="Nom"></td>
            </tr>
            <tr>
            <td height="34" colspan="2"><div align="center">
                <input type="submit" name="Submit" value="Ajouter">
            </div></td>
            </tr>
        </table>
    </form>
    <br><br>
    <form action="index.php?uc=admin" method="POST" name="connect">
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