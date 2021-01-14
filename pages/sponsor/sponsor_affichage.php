<?php
echo '<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr><td align="center">';
echo '<br>';
$retour = $link->query('SELECT COUNT(*) AS aff FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' ');
$donnees = mysqli_fetch_array($retour);
if($donnees['aff'] > '0')
	{
	$sql = $link->query('SELECT * FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' ');
	$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #184): " . mysql_error());
	$date = date("dmY");
	$date_plus = ($result['date'] + 5000000);
	if ($date <= $date_plus)
		{
		$sql = 'SELECT * FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' ';
		$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($data = mysqli_fetch_assoc($req)) 
		    {
			$sql1 = $link->query('SELECT * FROM config_sponsor WHERE id = '.$data['id_sponsor'].' ');
			$result1 = mysqli_fetch_array($sql1) or die("Impossible de se connecter (erreur #184): " . mysql_error());
			if($data['id_sponsor'] == '20')
				{
				echo '<orange>'.$result1['nom'].'</orange><br>';
				}else{
				echo '<vert>'.$result1['nom'].'</vert><br>';
				}
			if($result1['medaille_plus'] > '0')
				{
				echo '- Plus '.$result1['medaille_plus'].' médaille pour les courses à médaille.<br>';
				}
			if($result1['argent_plus'] > '0')
				{
				echo '- Vous gagnerez '.$result1['argent_plus'].'% d\'argent supplémentaire lors des rallyes.<br>';
				}
			if($result1['prix_piece_moin'] > '0')
				{
				echo '- Les pièces performence sont '.$result1['prix_piece_moin'].'% moins chère.<br>';
				}
			if($result1['prix_rally_moin'] > '0')
				{
				echo '- Les inscriptions rallye sont '.$result1['prix_rally_moin'].'% moins chere.<br>';
				}
			echo '<a href="index.php?page=sponsors_valid&&id='.$data['id_sponsor'].'"><img border="0" type="image" id="ok" src="images/valider_off.png" title="Connexion" onMouseOver="this.src=\'images/valider_on.png\'" onMouseOut="this.src=\'images/valider_off.png\'" /></a>';
			echo '<br><br>';
			}
		echo '<div align="right"><a href="index.php?page=sponsors_clear">Effacer la liste des sponsors.</a></div>';
		}else{
		include('pages/sponsor/sponsor_script.php');
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=sponsors">';
		}
	}else{
	echo 'Aucun sponsor a contacté votre écurie.';
	}
echo '</td></tr></table>';
?>