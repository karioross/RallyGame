<?php
include('pages/core/verif_session.php');
?>
<div id="contenu">
	<div class="contenu_haut"></div><div class="contenu_fond"><!-- Début cadre -->
	<img src="images/icone/logo_achat.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Concession</span>
	<br /> <br>
<?php
$retry = '0';
$date = date("dmY");
$tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
if(empty($_GET["choix"]))
	{
	$retour = $link->query('SELECT COUNT(*) AS nbre_entrees FROM liste_achat WHERE id_compte = '.$_SESSION['id'].' ');
	$donnees = mysqli_fetch_array($retour);
	if($donnees['nbre_entrees'] >= 1)
		{
		$sql = $link->query('SELECT * FROM liste_achat WHERE id_compte = '.$_SESSION['id'].' ');
		$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #245): " . mysql_error());	
		$date_plus = ($result['date'] + 1000000);
		if ($date <= $date_plus)
			{
			echo 'Choisissez une voiture à acheter parmis la liste des véhicules disponnible, attention vous n\'avez que '.$argent.' € :<br><br>';
			$sql = 'SELECT * FROM liste_achat WHERE id_compte = '.$_SESSION['id'].' ';
			$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			while($data = mysqli_fetch_assoc($req)) 
			    {
				$sql = $link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$data['id_voiture'].' ');
				$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #362): " . mysql_error());
				$nom_voiture_1 = $result['nom'];
				$couleur_voiture_1 = $result['couleur'];
			   	echo $tab.'<a href="index.php?page=acheter_voiture&&choix=achat&&num='.$data['id_voiture'].'">- '.$nom_voiture_1.' de couleur '.$couleur_voiture_1.'</a> à '.$data['prix'].' €<br>';
				}
			echo '<br><br><a href="index.php?page=retry_car">Aucune voiture dans les tarifs que je veux.</a>';
			}else{
				$sql = ('DELETE FROM liste_achat WHERE id_compte = '.$_SESSION['id'].'');
				$delete = $link->query($sql);
				$retry++;
			}
		}
	if($donnees['nbre_entrees'] == '0' OR $retry == '1')
		{
		echo 'Choisissez une voiture à acheter parmis la liste des véhicules disponnibles, attention vous avez que '.$argent.' € :<br><br>';
		$tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$nbr_vente = mt_rand(1, 6);
		$id_voiture = mt_rand(3, 31);
		$boucle = '1';
		$sql = 'SELECT * FROM config_voiture WHERE id_voiture = '.$id_voiture.' ';
		$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());	
		while($data = mysqli_fetch_assoc($req))
			{
			do
				{
				$id_voiture = mt_rand(1, 24);
				$retour = $link->query('SELECT COUNT(*) AS nbre_car FROM liste_achat WHERE id_compte = '.$_SESSION['id'].' AND id_voiture = '.$id_voiture.' ');
				$donnees = mysqli_fetch_array($retour);
				$nbr_car = $donnees['nbre_car'];
				if($nbr_car == '0')
					{
					$sql = $link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$id_voiture.' ');
					$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #245): " . mysql_error());	
					$nom_voiture = $result['nom'];
					$couleur_voiture = $result['couleur'];
					$prix_voiture = rand($result['prix_min'], $result['prix_max']);
					echo $tab.'<a href="index.php?page=acheter_voiture&&choix=achat&&num='.$id_voiture.'">- '.$nom_voiture.' de couleur '.$couleur_voiture.'</a> à '.$prix_voiture.'€<br>';
					$boucle++;
					$q = 'INSERT INTO liste_achat(id_compte, id_voiture, prix, date) VALUES("'.$_SESSION['id'].'" , "'.$id_voiture.'" , "'.$prix_voiture.'"  , "'.$date.'")';
					$link->query($q) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
					}
				} while ($boucle <= $nbr_vente);
			}
		echo '<br><br><a href="index.php?page=retry_car">Aucune voiture dans les tarifs que je veux.</a>';
		}
	}
if(isset($_GET["choix"]))
	{
	if($_GET["choix"] == "achat")
		{
		$retour = $link->query('SELECT COUNT(*) AS valider FROM liste_achat WHERE id_compte = '.$_SESSION['id'].' AND id_voiture = '.$_GET['num'].' ');
		$donnees = mysqli_fetch_array($retour);
		$sql2 = mysqli_fetch_array($link->query('SELECT * FROM liste_achat WHERE id_voiture = '.$_GET['num'].' '));
		$prix_voiture = $sql2['prix'];
		$id_voiture = $sql2['id_voiture'];
		if($donnees['valider'] == 1)
			{
			if($argent >= $prix_voiture)
				{
				$sql = $link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$_GET['num'].' ');
				$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #184): " . mysql_error());
				$nom_voiture = $result['nom'];
				$couleur_voiture = $result['couleur'];
				$puissance_voiture = $result['puissance'];
				$type_voiture = $result['type'];
				$traction_voiture = $result['traction'];
				echo 'Vous avez choisi une '.$nom_voiture.' '.$couleur_voiture.' pour '.$prix_voiture.'€.<br><br>';
				echo 'Cette voiture est équipé d\'un moteur '.$type_voiture.' qui développe '.$puissance_voiture.' cheveaux, elle est de type '.$traction_voiture.'<br><br><br>';
				echo '<div align="center">
				<a href="index.php?page=acheter_voiture&&choix=valider&&num='.$id_voiture.'">
				<img border="0" src="images/bouton/valider_off.png" onMouseOver="this.src=\'images/bouton/valider_on.png\'" onMouseOut="this.src=\'images/bouton/valider_off.png\'">
				</a>
				'; ?>
				<a href="index.php?page=acheter_voiture">
				<img border="0" src="images/bouton/annuler_off.png" onMouseOver="this.src='images/bouton/annuler_on.png'" onMouseOut="this.src='images/bouton/annuler_off.png'" type="image" >
				<?php echo '</a></div>';
				}else{
				echo '<font color="red">Tu n\'as pas assé d\'argent désolé.</font><br><br>';
				echo '<div align="center">
				<a href="index.php?page=acheter_voiture">
				<img border="0" src="images/bouton/annuler_off.png" onMouseOver="this.src=\'images/bouton/annuler_on.png\'" onMouseOut="this.src=\'images/bouton/annuler_off.png\'" type="image" >
				</a>
				</form>
				</div>';
				}
			}else{
			echo 'Tu as vraiment cru que sa aurait pu marché, rêve pas trop quand même.';
			}
		}
	}
if(isset($_GET["choix"]))
	{
	if($_GET["choix"] == "valider")
		{
		$sql3 = $link->query('SELECT * FROM compte WHERE id = '.$_SESSION['id'].' ');
		$result3 = mysqli_fetch_array($sql3) or die("Impossible de se connecter (erreur #184): " . mysql_error());
		$argent = $result3['argent'];
		$sql2 = $link->query('SELECT * FROM liste_achat WHERE id_compte = '.$_SESSION['id'].' AND id_voiture = '.$_GET['num'].' ');
		$result2 = mysqli_fetch_array($sql2) or die("Impossible de se connecter (erreur #184): " . mysql_error());
		$id_voiture = $result2['id_voiture'];
		$prix = $result2['prix'];
		$sql = $link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$_GET['num'].' ');
		$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #184): " . mysql_error());
		if($result['type'] == "Turbo compréssé")
			{
			$turbo = '2';
			}else{
			$turbo = '0';
			}
		$puissance = $result['puissance'];
		$traction = $result['traction'];
		$type = $result['type'];
		$prix_ocaz = ($prix / 2);
		$argent_reste = ($argent - $prix);
		if($verif_voiture >= '1')
			{
			$act = '0';
			}else{
			$act = '1';
			}
		$query = ("UPDATE compte SET argent = '".$argent_reste."' WHERE id = '".$_SESSION['id']."'");
		$link->query($query) or die('Erreur SQL !'.$query.'<br />'.$mysqli->error);
		$q = ("INSERT INTO voiture_membre (id_compte, voiture, puissance, traction, type, prix, turbo_act, act) VALUES ('".$_SESSION['id']."' , '".$id_voiture."' , '".$puissance."' , '".$traction."' , '".$type."' , '".$prix_ocaz."' , '".$turbo."' , '".$act."')");
		$link->query($q) or die('Erreur SQL !'.$q.'<br />'.$mysqli->error);
		$sql80 = $link->query('DELETE FROM liste_achat WHERE id_compte = '.$_SESSION['id'].'');
		$_SESSION['reclam_id'] = '1';
		include('pages/core/reclamation.php');
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=stand">';
		}
	}
?>
	</div><div class="contenu_bas"></div><!-- Fin cadre -->	
</div><!-- Fin contenu -->	