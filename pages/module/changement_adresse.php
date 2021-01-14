<?php
include('pages/core/verif_session.php');

if(isset($_GET['ok']))
	{
	$query = ("UPDATE compte SET email = '".$_POST['email']."' WHERE id = '".$_SESSION['id']."' ");
	$link->query($query) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=gestion_compte">';
	}else{
	echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond"><span>Changement adresse e-mail</span><br />
		<div align="center"><form method="POST" action="index.php?page=changement_adresse&&ok=1">
			Notez votre nouvelle adresse e-mail :<br>
			<input type="text" name="email" size="20"><br>
			<input border="0" type="submit" value="Envoyer" name="B1" src="images/bouton/valider_off.png" onMouseOver="this.src=\'images/bouton/valider_on.png\'" onMouseOut="this.src=\'images/bouton/valider_off.png\'">
		</form></div>
	</div><div class="contenu_bas"></div></div>';} ?>
