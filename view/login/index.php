<form action=".?r=login " method="post">
  <?php if ($data == 'error') { ?>
    <div id="error_login">
      <h3>Erreur lors de la connexion</h3>
    </div>
  <?php } ?>
  <br><br><br>
  <div class="container">
  	<h2 id="connexion">CONNEXION</h2>
    <input class="champ" type="text" placeholder="Identifiant" name="uname" required><br>
    <input class="champ" type="password" placeholder="Mot de passe" name="psw" required><br>
    <button type="submit">Login</button>
  </div>
</form>
<div>
  <input type="button" value="Modifier le mot de passe" onclick="javascript:location.href='?r=login/update'">
</div>