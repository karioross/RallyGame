<?php
$result = mysqli_fetch_array($link->query('SELECT * FROM liste_rally WHERE id_rally = '.$_SESSION['id_rally'].' '));
$nom_rally = $result['nom'];
echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">
	  <img src="images/icone/commissaire_piste.png" style="float:left;margin:0 20px 0 0" alt=""/>
	  <span>Liste des rallyes :: Commissaire de piste</span><br /><br>
	  '.$tab.'Vous avez choisi de vous inscrire en temps que Commissaire de piste pour le 
	  '.$nom_rally.'. Voulez vous vraiment vous inscrire en temps que commissaire de piste 
	  au '.$nom_rally.' ?<br><br>
	  <div align="center">
	  <a href="index.php?page=valide_commissaire&&ok=14501"><input src="images/bouton/valider_off.png" onMouseOver="this.src=\'images/bouton/valider_on.png\'" onMouseOut="this.src=\'images/bouton/valider_off.png\'" type="image" ></a>
	  <a href="index.php?page=liste_course"><input src="images/bouton/annuler_off.png" onMouseOver="this.src=\'images/bouton/annuler_on.png\'" onMouseOut="this.src=\'images/bouton/annuler_off.png\'" type="image" ></a>
	  </div>
	</div><div class="contenu_bas"></div></div>';
if(isset($_GET['ok']))
	{
	$query = $link->query("UPDATE liste_rally SET commissaire_piste = '".$_SESSION['pseudo']."' WHERE id_rally = '".$_SESSION['id_rally']."' ");
	unset($_SESSION['id_rally']);
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=liste_course">';
	}
?>