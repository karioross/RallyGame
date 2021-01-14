<?php
include('pages/core/config.php');
if(isset($_SESSION["login"]))
	{
	$retour = mysqli_fetch_array($link->query('SELECT COUNT(*) AS nbre_entrees FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' '));
	if($retour['nbre_entrees'] == 0)
		{
		$verif_voiture = 0;
		}else{
		$verif_voiture = 1;
		$result = mysqli_fetch_array($link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' AND act = 1 '));
		$id_voiture = $result['voiture'];
		$puissance = $result['puissance'];
		$grip = $result['grip'];
		$solidite = $result['solidite'];
		$poid = $result['poid'];
		$act_turbo = $result['turbo_act'];
		$result1 = mysqli_fetch_array($link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$id_voiture.' '));
		$img_voiture = $result1['image'];
		$nom_voiture = $result1['nom'];
		$id_voiture = $result1['id_voiture'];
		$couleur_voiture= $result1['couleur'];
		}
	}
?>