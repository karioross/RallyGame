<?php
include('pages/core/verif_session.php');
if(empty($id_voiture)){echo '<meta http-equiv="refresh" content="0; url=index.php">'; }


echo '<div id="contenu">
	<div class="contenu_haut"></div><div class="contenu_fond">
	<img src="images/icone_voiture/'.$id_voiture.'.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Bienvenue '.$_SESSION['pseudo'].' dans ton espace perso</span>
	<br /><br>';
	if($position_general > '1' OR $position_general == '--')
		{
		echo '<div id="carte">';
		}else{
		echo '<div id="carte_1">';
		}
	if($position_general > '1' OR $position_general == '--')
		{
		echo '<div id="carte_puissance">'.$puissance.' Ch</div>';
		}else{
		echo '<div id="carte_puissance_1">'.$puissance.' Ch</div>';
		}
	if($position_general > '1' OR $position_general == '--')
		{
		echo '<div id="carte_texte">'.$_SESSION['pseudo'].'<br>'.$nom_voiture.'<br>'.$email.'<br>';
		}else{
		echo '<div id="carte_texte_1">'.$_SESSION['pseudo'].'<br>'.$nom_voiture.'<br>'.$email.'<br>';
		}
	echo $position_general.'<br>'.$argent.' €</div>';
	if($position_general > '1' OR $position_general == '--')
		{
		echo '<div id="carte_niveau">'.$niveau.'</div>';
		}else{
		echo '<div id="carte_niveau_1">'.$niveau.'</div>';
		}
	echo '</div>';
	//include('pages/module/equipement_installer.php');
	include('pages/stand/recap_voiture.php');
	echo '</div><div class="contenu_bas"></div></div>';
	include('pages/stand/ecurie.php');

	$activer = mysqli_fetch_array($link->query('SELECT COUNT(*) AS activer FROM classement WHERE id_compte = '.$_SESSION['id'].' AND act = "off" '));
	if($activer['activer'] >= '1')	{include('pages/module/classement_membre.php');}	
	if($sponsor_compte == '1')
		{
		include('pages/sponsor/sponsor_stand.php');
		}
?>