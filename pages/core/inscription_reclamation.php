<?php
$retour2 = $link->query('SELECT COUNT(*) AS next FROM reclamation_stat WHERE id_compte = '.$_SESSION['id'].' ');
$donnees2 = mysqli_fetch_array($retour2);
if($donnees2['next'] == '0')
	{
	$link->query('INSERT INTO reclamation_stat VALUES('.$_SESSION['id'].', 1, 0)');
	}
?>