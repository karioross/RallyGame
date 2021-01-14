<?php
$query = $link->query("UPDATE liste_achat_sponsor SET vue = 1 WHERE id_compte = '".$_SESSION['id']."' ");	
echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">';
echo '<img src="images/icone/sponsors.png" style="float:left;margin:0 20px 0 0" alt=""/>';
echo '<span>Sponsors</span><br /><br>';
echo 'Les sponsors prennent contacte avec vous uniquement si votre potentiel vos la peine d\'étre affiché. Si un sponsor est intéressé par vous vous seriez immédiatement informé. ';
echo 'Attention, vous n\'avez le droit qu\'à un sponsors, vous pourrez le changer à tous moment.';

$retour = $link->query('SELECT COUNT(*) AS aff FROM sponsor_membre WHERE id_compte = '.$_SESSION['id'].' ');
$donnees = mysqli_fetch_array($retour);
if($donnees['aff'] > '0')
	{
	echo '<br><br>';
	$sql = $link->query('SELECT * FROM sponsor_membre WHERE id_compte = '.$_SESSION['id'].' ');
	$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #184): " . mysql_error());
	$sql = $link->query('SELECT * FROM config_sponsor WHERE id = '.$result['id_sponsor'].' ');
	$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #184): " . mysql_error());
	if($result['id'] == '20')
		{
		$couleur_deb = '<orange>';
		$couleur_fin = '</orange>';
		}else{
		$couleur_deb = '<vert>';
		$couleur_fin = '</vert>';
		}
	echo '<u>Votre sponsor actuel est '.$couleur_deb .$result['nom'] .$couleur_fin.'</u><br>';
	if($spon_medaille > '0')
		{
		echo '| +'.$spon_medaille.' medaille |';
		}
	if($spon_argent > '0')
		{
		echo '| +'.$spon_argent.'% argent |';
		}
	if($spon_prix_piece > '0')
		{
		echo '| -'.$spon_prix_piece.'% pièces |';
		}
	if($spon_prix_rally > '0')
		{
		echo '| -'.$spon_prix_rally.'% inscription |';
		}	
	}
echo '<br><br>';
include ('pages/sponsor/sponsor_affichage.php');
echo '</div><div class="contenu_bas"></div></div>';
?>