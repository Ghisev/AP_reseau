<div class="home">
    <h1>Veuillez créer l'Administrateur</h1>

    <form action="index.php?uc=admin&action=verifierCreationAdm" method="POST" name="connect">
        <table width="300"  border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#eeeeee" class="tableaux">
            <tr>
            <td width="50%""><div align="right">Identifiant</div></td>
            <td width="50%"><input name="id" type="text" id="login"></td>
            </tr>
            <tr>
            <td width="50%""><div align="right">Mot de Passe</div></td>
            <td width="50%"><input name="pw" type="password" id="pass"></td>
            </tr>
            <tr>
            <td height="34" colspan="2"><div align="center">
                <input type="submit" name="Submit" value="Créer">
            </div></td>
            </tr>
        </table>
    </form>
</div>