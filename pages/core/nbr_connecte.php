<?php
$retour = $link->query('SELECT COUNT(*) AS nbre_entrees FROM connectes WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
$donnees = mysqli_fetch_array($retour);
if ($donnees['nbre_entrees'] == 0)
	{
    $link->query('INSERT INTO connectes VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
	$sql2 = $link->query("SELECT * FROM visiteurs WHERE id = 2 ");
	$result2 = mysqli_fetch_array($sql2) or die("Impossible de se connecter : " . mysql_error());	
	$total_visiteur = ($result2['valeur'] + 1);
	$query1 = ("UPDATE visiteurs SET valeur = '".$total_visiteur."' WHERE id = 2");
	$link->query($query1) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
	$_POST['$total_visiteur'] = $total_visiteur;
	}else{
    $link->query('UPDATE connectes SET timestand=' . time() . ' WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
	}
$timestand_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
$link->query('DELETE FROM connectes WHERE timestand < ' . $timestand_5min);
$retour = $link->query('SELECT COUNT(*) AS nbre_entrees FROM connectes');
$donnees = mysqli_fetch_array($retour);
$nbr_connecte = $donnees['nbre_entrees'];


	$sql2 = $link->query("SELECT * FROM visiteurs WHERE id = 2 ");
	$result2 = mysqli_fetch_array($sql2) or die("Impossible de se connecter : " . mysql_error());
	$nbr_total_visite = $result2['valeur'];
	
	
	$total = mysqli_fetch_array($link->query('SELECT COUNT(*) AS account FROM compte'));
	$account = $total['account'];

?>








