<?php echo '<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/logo_new.png" style="float:left;margin:0 20px 0 0" alt=""/>';
if($_SESSION['id_piece'] > '0' AND $_SESSION['id_piece'] < '66'){$titre = 'Moteur'; $lien = 'index.php?page=article_moteur';}else{$titre = 'Chassis'; $lien = 'index.php?page=article_chassis';}
echo '<span><a href="index.php?page=preparateur">Préparateur</a> :: <a href="'.$lien.'">'.$titre.'</a> :: Achat</span>';
echo '<br /> <br>';

$sql = mysqli_fetch_array($link->query('SELECT * FROM config_pieces WHERE id_piéce = '.$_SESSION['id_piece'].' '));
$id_piece = $sql['id_piéce'];
$nom_piece = $sql['piéce'];
$prix_piece = $sql['prix'];
$puissance_plus = $sql['p+'];
$categorie = $sql['categorie'];
$reste_argent = ($argent - $prix_piece);


$sql = mysqli_fetch_array($link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' '));
$id_piece_actuel = $sql[$categorie];
$puissance_actuel = $sql['puissance'];
if($id_piece_actuel > 0)
	{
	$sql = mysqli_fetch_array($link->query('SELECT * FROM config_pieces WHERE id_piéce = '.$id_piece_actuel.' '));
	$puissance_piece_actuel = $sql['p+'];
	$puissance_sans_piece = ($puissance_actuel - $puissance_piece_actuel);
	$puissance_final = ($puissance_sans_piece + $puissance_plus);
	}else{
	$puissance_final = ($puissance_actuel + $puissance_plus);
	}
if(isset($_GET['achat']) AND $_GET['achat'] == 'on')
	{
	$query = $link->query("UPDATE compte SET argent = '".$reste_argent."' WHERE id = '".$_SESSION['id']."' ");
	$query = $link->query("UPDATE voiture_membre SET puissance = '".$puissance_final."' WHERE id_compte = '".$_SESSION['id']."' ");
	$query = $link->query("UPDATE voiture_membre SET ".$categorie." = ".$_SESSION['id_piece']." WHERE id_compte = ".$_SESSION['id']." ");
	echo '<meta http-equiv="refresh" content="0; url='.$lien.'">';
	}
echo 'Voulez vous acheter <font color="#660066">"'.$nom_piece.'"</font> à '.$prix_piece.' €, en effectuant cette achat il vous restera '.$reste_argent.' €.<br><br><br><br>';
echo '<div align="center"><font size="5">'.$puissance.' Ch <font color="#FF0000"><b>---></b></font> '.$puissance_final.' Ch</font><br>';
echo '<a href="index.php?page=valider_achat&&achat=on">
	<input src="images/bouton/valider_off.png" onMouseOver="this.src=\'images/bouton/valider_on.png\'" onMouseOut="this.src=\'images/bouton/valider_off.png\'" type="image" ></a>
	<a href="'.$lien.'">
	<input src="images/bouton/annuler_off.png" onMouseOver="this.src=\'images/bouton/annuler_on.png\'" onMouseOut="this.src=\'images/bouton/annuler_off.png\'" type="image" ></a>
</div>';
echo '<br /></div><div class="contenu_bas"></div>'; ?>