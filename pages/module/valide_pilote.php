<?php
$result = mysqli_fetch_array($link->query('SELECT * FROM liste_rally WHERE id_rally = '.$_SESSION['id_rally'].' '));
$nom_rally = $result['nom'];
$place_total = $result['place_total'];

if($result['prix_place'] > '0')
	{
	if($sponsor_compte == '1')
		{
		$prix_en_moin = (($result['prix_place'] * $spon_prix_rally) / 100);
		$prix_place = ($result['prix_place'] - $prix_en_moin);
		$prix_place = number_format($prix_place,0);
		}else{
		$prix_place = $result['prix_place'];
		}
	}

echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">
	  <img src="images/icone/commissaire_piste.png" style="float:left;margin:0 20px 0 0" alt=""/>
	  <span><a href="index.php?page=liste_course">Liste des rallyes</a> :: '.$nom_rally.' :: Pilote</span><br /><br>';
if(isset($_GET['ok']))
	{
	$retour = mysqli_fetch_array($link->query('SELECT COUNT(*) AS place FROM inscription_rally WHERE id_rally = '.$_SESSION['id_rally'].' '));
	if($retour['place'] < $place_total AND $argent > $prix_place)
		{
		$argent_reste = ($argent - $prix_place);
		$q = $link->query("INSERT INTO inscription_rally (id_compte, id_rally) VALUES('".$_SESSION['id']."', '".$_SESSION['id_rally']."')");
		$query = $link->query("UPDATE compte SET argent = '".$argent_reste."' WHERE id = '".$_SESSION['id']."'");
		mysql_close();
		unset($_SESSION['id_rally']);
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=liste_course">';
		}else{
		if($argent > $prix_place)
			{
			echo '<div align="center">Vous n\'avez pas assé d\'argent.<br>';
			}else{
			echo '<div align="center">Plus aucune place de libre.<br>';
			}
		echo '<a href="index.php?page=liste_course"><input src="images/bouton/annuler_off.png" onMouseOver="this.src=\'images/bouton/annuler_on.png\'" onMouseOut="this.src=\'images/bouton/annuler_off.png\'" type="image" ></a>';
		echo '<meta http-equiv="refresh" content="5; url=index.php?page=liste_course">';
		echo '</div>';
		}
	}else{
	echo $tab.'Vous avez choisi de vous inscrire en temps que Pilote pour le '.$nom_rally.'. Voulez vous vraiment vous inscrire en temps que pilote au '.$nom_rally.' ?<br><br>
	<div align="center">
	<a href="index.php?page=valide_pilote&&ok=14501"><input src="images/bouton/valider_off.png" onMouseOver="this.src=\'images/bouton/valider_on.png\'" onMouseOut="this.src=\'images/bouton/valider_off.png\'" type="image" ></a>
	<a href="index.php?page=liste_course"><input src="images/bouton/annuler_off.png" onMouseOver="this.src=\'images/bouton/annuler_on.png\'" onMouseOut="this.src=\'images/bouton/annuler_off.png\'" type="image" ></a>
	</div>';
	}
echo '</div><div class="contenu_bas"></div></div>'; ?>