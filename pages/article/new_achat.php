<?php
if(isset($_GET['type'])){$type_piece = $_GET['type'];}else{echo '<meta http-equiv="refresh" content="0; url=index.php?page=preparateur">';}
if(isset($_GET['id'])){$niveau_piece = $_GET['id'];}else{echo '<meta http-equiv="refresh" content="0; url=index.php?page=preparateur">';}
if(isset($_GET['cat'])){$cat_piece = $_GET['cat'];}else{echo '<meta http-equiv="refresh" content="0; url=index.php?page=preparateur">';}
$sql1 = $link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
$result1 = mysqli_fetch_array($sql1) or die("Impossible de se connecter (erreur #184): " . mysql_error());
if($type_piece == 'pneu')
	{
	$sql = $link->query('SELECT * FROM piece_'.$cat_piece.' WHERE niveau = '.$niveau_piece.' ');
	$result = mysqli_fetch_array($sql) or die("Impossible de se connecter (erreur #184): " . mysql_error());
	if($niveau_piece == '30')
		{
		if($result1['pneu_neige'] == ($niveau_piece - 1))
			{
			$type_piece = 'pneu_neige';
			$grip_new = ($grip + $result['grip']);
			$puissance_new = ($result1['puissance'] + $result['chevaux']);
			$poid_new = ($poid + $result['poid']);
			$solidite_new = ($solidite + $result['solidite']);
			$argent_new = ($argent - $result['prix']);
			$query = $link->query('UPDATE voiture_membre SET '.$type_piece.' = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET puissance = '.$puissance_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET grip = '.$grip_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET poid = '.$poid_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET solidite = '.$solidite_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET pneu_equiper = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query("UPDATE compte SET argent = '".$argent_new."' WHERE id = '".$_SESSION['id']."' ");
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=article_'.$cat_piece.'">';
			}else if($result1['pneu_neige'] == $niveau_piece) {
			$query = $link->query('UPDATE voiture_membre SET pneu_equiper = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=article_'.$cat_piece.'">';
			}
		}else if($niveau_piece == '31'){
		if($result1['pneu_ete'] == ($niveau_piece - 1))
			{
			$type_piece = 'pneu_ete';
			$grip_new = ($grip + $result['grip']);
			$puissance_new = ($result1['puissance'] + $result['chevaux']);
			$poid_new = ($poid + $result['poid']);
			$solidite_new = ($solidite + $result['solidite']);
			$argent_new = ($argent - $result['prix']);
			$query = $link->query('UPDATE voiture_membre SET '.$type_piece.' = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET puissance = '.$puissance_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET grip = '.$grip_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET poid = '.$poid_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET solidite = '.$solidite_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET pneu_equiper = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query("UPDATE compte SET argent = '".$argent_new."' WHERE id = '".$_SESSION['id']."' ");
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=article_'.$cat_piece.'">';
			}else if($result1['pneu_ete'] == $niveau_piece) {
			$query = $link->query('UPDATE voiture_membre SET pneu_equiper = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=article_'.$cat_piece.'">';
			}
		}else if($niveau_piece == '32'){
		if($result1['pneu_pluie'] == ($niveau_piece - 1))
			{
			$type_piece = 'pneu_pluie';
			$grip_new = ($grip + $result['grip']);
			$puissance_new = ($result1['puissance'] + $result['chevaux']);
			$poid_new = ($poid + $result['poid']);
			$solidite_new = ($solidite + $result['solidite']);
			$argent_new = ($argent - $result['prix']);
			$query = $link->query('UPDATE voiture_membre SET '.$type_piece.' = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET puissance = '.$puissance_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET grip = '.$grip_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET poid = '.$poid_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET solidite = '.$solidite_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET pneu_equiper = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query("UPDATE compte SET argent = '".$argent_new."' WHERE id = '".$_SESSION['id']."' ");
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=article_'.$cat_piece.'">';
			}else if($result1['pneu_pluie'] == $niveau_piece) {
			$query = $link->query('UPDATE voiture_membre SET pneu_equiper = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=article_'.$cat_piece.'">';
			}
		}
	}else{
	$sql74 = $link->query("SELECT * FROM piece_$cat_piece WHERE piece = '$type_piece' AND niveau = '$niveau_piece' ");
	$result74 = mysqli_fetch_array($sql74) or die("Impossible de se connecter (erreur #1787):<br> ".$sql74."<br>". mysql_error());
	if($result1["$type_piece"] == ($niveau_piece - 1) AND $niveau >= $result74['niv_exige'] AND $argent >= $result74['prix'])
		{
		$grip_new = ($grip + $result74['grip']);
		$puissance_new = ($result1['puissance'] + $result74['chevaux']);
		$poid_new = ($poid + $result74['poid']);
		$solidite_new = ($solidite + $result74['solidite']);
		$argent_new = ($argent - $result74['prix']);
		if(isset($_GET['turbo']) == '1')
			{
			$type_voiture = 'Turbo compréssé';
			$query = $link->query('UPDATE voiture_membre SET turbo_act = '.$_GET['turbo'].' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$query = $link->query('UPDATE voiture_membre SET type = '.$type_voiture.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			}
		$query = $link->query('UPDATE voiture_membre SET '.$type_piece.' = '.$niveau_piece.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
		$query = $link->query('UPDATE voiture_membre SET puissance = '.$puissance_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
		$query = $link->query('UPDATE voiture_membre SET grip = '.$grip_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
		$query = $link->query('UPDATE voiture_membre SET poid = '.$poid_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
		$query = $link->query('UPDATE voiture_membre SET solidite = '.$solidite_new.' WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
		$query = $link->query("UPDATE compte SET argent = '".$argent_new."' WHERE id = '".$_SESSION['id']."' ");
		$_SESSION['reclam_id'] = '2';
		include('pages/core/reclamation.php');
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=article_'.$cat_piece.'">';
		}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=preparateur">';
		}
	}
?>