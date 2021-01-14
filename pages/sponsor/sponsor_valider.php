<?php
echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">';
echo '<img src="images/icone/sponsors.png" style="float:left;margin:0 20px 0 0" alt=""/>';
echo '<span>Sponsors</span><br /><br>';
echo 'Les sponsors prennent contacte avec vous uniquement si votre potentiel vos la peine d\'étre affiché. Si un sponsor est intéressé par vous vous seriez immédiatement informé. ';
echo 'Attention, vous n\'avez le droit qu\'à un sponsors, vous pourrez le changer à tous moment.';
echo '<br><br>';
$retour = $link->query('SELECT COUNT(*) AS aff FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' AND id_sponsor = '.$_GET['id'].' ');
$donnees = mysqli_fetch_array($retour);
if($donnees['aff'] > '0')
	{
	echo '<div align="center"><img src="images/loading.gif" /></div>';
	$retour = $link->query('SELECT COUNT(*) AS deja FROM sponsor_membre WHERE id_compte = '.$_SESSION['id'].' ');
	$donnees = mysqli_fetch_array($retour);
	if($donnees['deja'] == '0')
		{
		$q = 'INSERT INTO sponsor_membre VALUES("'.$_SESSION['id'].'" , "'.$_GET['id'].'")';
		$link->query($q) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
		$query = $link->query("DELETE FROM liste_achat_sponsor WHERE id_compte = '".$_SESSION['id']."' AND id_sponsor = '".$_GET['id']."' "); 
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=sponsors">';
		}else{
		$query = $link->query("UPDATE sponsor_membre SET id_sponsor = '".$_GET['id']."' WHERE id_compte = '".$_SESSION['id']."' ");	
		$query = $link->query("DELETE FROM liste_achat_sponsor WHERE id_compte = '".$_SESSION['id']."' AND id_sponsor = '".$_GET['id']."' "); 
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=sponsors">';
		}
	}else{
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=sponsors">';
	}
echo '</div><div class="contenu_bas"></div></div>';
?>