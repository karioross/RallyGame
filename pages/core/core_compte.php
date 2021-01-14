<?php
if(isset($_SESSION["id"]))
	{
	$sql48 = mysqli_fetch_array($link->query('SELECT * FROM compte WHERE id = '.$_SESSION['id']));
	$argent = $sql48['argent'];
	$medaille = $sql48['medaille'];
	$xp = $sql48['xp'];
	$niveau = $sql48['niveau_compte'];
	$email = $sql48['email'];
	$i = '1';
	$sql80 = 'SELECT * FROM position_general ORDER BY nbr_gagné DESC ';
	$req80 = $link->query($sql80);
	while($data80 = mysqli_fetch_assoc($req80)) 
		{
		if($data80['id_compte'] == $_SESSION['id'])
			{
			$position_general = $i;
			}else{
			$position_general = '--';
			}
		$i++;
		}
	
	$sql10 = mysqli_fetch_array($link->query('SELECT * FROM experience_niveau WHERE niveau = '.$niveau));
	if( $xp >= $sql10['xp'] )
		{
		$xp_nouveau = ($xp - $sql10['xp']);
		$niveau_nouveau = ($niveau + 1);
		$link->query('UPDATE compte SET xp = '.$xp_nouveau.' WHERE id = '.$_SESSION['id'].' ');
		$link->query('UPDATE compte SET niveau_compte = '.$niveau_nouveau.' WHERE id = '.$_SESSION['id'].' ');
		include('pages/sponsor/sponsor_script.php');
		}
	
	$verif_spon = mysqli_fetch_array($link->query("SELECT COUNT(*) AS verif_spon FROM sponsor_membre WHERE id_compte = '".$_SESSION['id']."' "));
	if($verif_spon['verif_spon'] == '1')
		{
		$sponsor_compte = '1';
		$spon = mysqli_fetch_array($link->query('SELECT * FROM sponsor_membre WHERE id_compte = '.$_SESSION['id']));
		$sponsor_id = $spon['id_sponsor'];
		$spon_1 = mysqli_fetch_array($link->query('SELECT * FROM config_sponsor WHERE id = '.$sponsor_id));
		$nom_sponsor = $spon_1['nom'];
		$spon_medaille = $spon_1['medaille_plus'];
		$spon_argent = $spon_1['argent_plus'];
		$spon_prix_piece = $spon_1['prix_piece_moin'];
		$spon_prix_rally = $spon_1['prix_rally_moin'];
		}else{
		$sponsor_compte = '0';
		}
	}
?>