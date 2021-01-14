<?php

//$_SESSION['reclam_id'] = '2';
//include('pages/core/reclamation.php');


$retour8 = $link->query('SELECT COUNT(*) AS actuel FROM reclamation_stat WHERE id_compte = '.$_SESSION['id'].' AND reclamation = '.$_SESSION['reclam_id'].' ');
$donnees8 = mysqli_fetch_array($retour8);
if($donnees8['actuel'] == '1')
	{
	$link->query('UPDATE reclamation_stat SET valider = '.$_SESSION['reclam_id'].' WHERE id_compte = '.$_SESSION['id'].' ');
	}
?>