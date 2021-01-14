<?php
echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond"><span>Liste voiture</span><br /><br>';
$retour = mysqli_fetch_array($link->query('SELECT COUNT(*) AS valide FROM liste_achat WHERE id_compte = '.$_SESSION['id'].' AND prix < '.$argent.' '));
if(empty($retour['valide']))
	{
	echo '<div align="center"><img src="images/loading.gif" /><br>';
	echo 'Votre liste d\'achat est en cours de ré-initialisation, veuillez patientez.';
	$sql = $link->query('DELETE FROM liste_achat WHERE id_compte = '.$_SESSION['id'].'');
	echo '<meta http-equiv="refresh" content="3; url=index.php?page=acheter_voiture"></div>';
	}else{
	echo '<div align="center"><img src="images/loading.gif" /><br>';
	echo 'Vous avez une voiture à un prix raisonnable dans votre liste elle ne sera donc pas réinitialisé.<br>Vous allez étre redirigé.';
	echo '<meta http-equiv="refresh" content="5; url=index.php?page=acheter_voiture"></div>';
	}
echo '</div><div class="contenu_bas"></div></div>'; ?>