<?php
$sql_4 = mysqli_fetch_array($link->query("SELECT * FROM liste_rally WHERE id_rally = '".$_SESSION['id_rally']."' "));


if($sql_4['cond_1'] == '0')
	{
	$cond_puissance = '1500';
	$puissance_nul = '1';
	}else{
	$cond_puissance = $sql_4['cond_1'];
	}
$cond_type = $sql_4['cond_2'];
$cond_traction = $sql_4['cond_3'];


$verif = mysqli_fetch_array($link->query("SELECT COUNT(*) AS verif FROM liste_rally WHERE id_rally = '".$_SESSION['id_rally']."' AND commissaire_piste = '".$_SESSION['pseudo']."' "));
if($verif['verif'] >= '1')
	{
	$nom = mysqli_fetch_array($link->query("SELECT * FROM liste_rally WHERE id_rally = '".$_SESSION['id_rally']."' AND commissaire_piste = '".$_SESSION['pseudo']."' "));
	echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond"><img src="images/logo_accident.png" style="float:left;margin:0 20px 0 0" alt=""/>';
	echo '<span>Vérification des inscriptions pour le '.$nom['nom'].'</span><br /><br><div align="center">';
	echo '<table border="0" width="auto">';
	echo '<tr>';
	echo '<td align="center" width="auto"><titel>.::Pseudo::.</titel></td>';
	echo '<td align="center" width="auto"><titel>.::Voiture::.</titel></td>';
	echo '<td align="center" width="auto"><titel>.::Puissance::.</titel></td>';
	echo '<td align="center" width="auto"><titel>.::Type::.</titel></td>';
	echo '<td align="center" width="auto"><titel>.::Traction::.</titel></td>';
	echo '</tr>';
	$req = $link->query("SELECT * FROM inscription_rally WHERE id_rally = '".$_SESSION['id_rally']."' ");
	while($data = mysqli_fetch_assoc($req)) 
		{
		$sql_1 = mysqli_fetch_array($link->query("SELECT * FROM compte WHERE id = '".$data['id_compte']."' "));
		$pseudo = $sql_1['username'];
		$sql_2 = mysqli_fetch_array($link->query("SELECT * FROM voiture_membre WHERE id_compte = '".$data['id_compte']."' "));
		$puissance_voiture = $sql_2['puissance'];
		$traction_voiture = $sql_2['traction'];
		$type_voiture = $sql_2['type'];
		$sql_3 = mysqli_fetch_array($link->query("SELECT * FROM config_voiture WHERE id_voiture = '".$sql_2['voiture']."' "));
		$nom_voiture = $sql_3['nom'];
		echo '<tr>';
		echo '<td align="center" width="auto"><reste>'.$pseudo.'</reste></td>';
		echo '<td align="center" width="auto"><reste>'.$nom_voiture.'</reste></td>';
		echo '<td align="center" width="auto"><reste>'.$puissance_voiture.'</reste></td>';
		echo '<td align="center" width="auto"><reste>'.$type_voiture.'</reste></td>';
		echo '<td align="center" width="auto"><reste>'.$traction_voiture.'</reste></td>';
		if($type_voiture == 'Atmosphérique'){ $type = '1'; }
		if($type_voiture == 'Turbo compréssé'){ $type = '2'; }
		if($traction_voiture == 'traction'){ $traction = '1'; }
		if($traction_voiture == 'propulsion'){ $traction = '2'; }
		if($cond_type == '3'){$type = '3';}
		if($cond_traction == '3'){$traction = '3';}
		if($puissance_voiture > $cond_puissance OR $type <> $cond_type OR $traction <> $cond_traction)
			{
			echo '<td align="center"><a href="index.php?page=verifier_inscription&&ref='.$data['id_compte'].'"><img src="images/bouton/not.png"></a></td>';
			}else{
			echo '<td align="center"><img src="images/bouton/ok.png"></td>';
			}
		echo '</tr>';
		}
	echo '</table></div><br>';
	if($cond_type == '1'){ $typ_mot = 'Atmosphérique'; }
	if($cond_type == '2'){ $typ_mot = 'Turbo compréssé'; }
	if($cond_type == '3'){ $typ_mot = 'Atmosphérique et Turbo compréssé'; }
	if($cond_traction == '1'){ $trac_mot = 'Traction'; }
	if($cond_traction == '2'){ $trac_mot = 'Propulsion'; }
	if($cond_traction == '3'){ $trac_mot = 'Traction et Propulsion'; }
	echo '<orange>Réglementation pour le '.$nom['nom'].' :</orange><br>';
	if($puissance_nul <> '1')
		{
		echo $tab.'- Puissance autorisé maximum : <vert>'.$cond_puissance.' Ch</vert><br>';
		}else{
		echo $tab.'- Puissance autorisé maximum : <vert>&#8734;</vert><br>';
		}
	echo $tab.'- Type de moteur autorisé : <vert>'.$typ_mot.'</vert><br>';
	echo $tab.'- Type d\'entrainement autorisé : <vert>'.$trac_mot.'</vert><br>';
	$sql_10 = mysqli_fetch_array($link->query("SELECT * FROM liste_rally WHERE commissaire_piste = '".$_SESSION['pseudo']."' "));
	$ancien_nbr = $sql_10['nbr_verif'];
	
	if($ancien_nbr == '0')
		{
		echo '<br>'.$tab.'<jaune>- Aucune inscription n\'a été annulée.</orange><br><br>';
		}else if($ancien_nbr == '1'){
		echo '<br>'.$tab.'<jaune>- Vous avez annulé une inscription.</jaune><br><br>';
		}else if($ancien_nbr > '1'){
		echo '<br>'.$tab.'<jaune>- Vous avez annulé '.$ancien_nbr.' inscriptions.</jaune><br><br>';
		}
	
	
	$verif = mysqli_fetch_array($link->query("SELECT COUNT(*) AS inscription FROM inscription_rally WHERE id_rally = '".$_SESSION['id_rally']."' "));
	$sql_20 = mysqli_fetch_array($link->query("SELECT * FROM liste_rally WHERE id_rally = '".$_SESSION['id_rally']."' "));
	$place_total = $sql_20['place_total'];
	echo '<div align="center">';
	if($verif['inscription'] == $place_total)
		{
		echo '<a href="index.php?page=lancer_course"><input src="images/bouton/lancer_off.png" onMouseOver="this.src=\'images/bouton/lancer_on.png\'" onMouseOut="this.src=\'images/bouton/lancer_off.png\'" type="image"></a>';
		}else{
		echo '<input src="images/bouton/lancer_off_off.png" onMouseOver="this.src=\'images/bouton/lancer_off_off.png\'" onMouseOut="this.src=\'images/bouton/lancer_off_off.png\'" type="image">';
		}
	echo '</div>';
	echo '</div><div class="contenu_bas"></div></div>';
	}else{
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=liste_course">';
	}
if(isset($_GET['ref']))
	{
	$id_compte = $_GET['ref'];
	$verif = mysqli_fetch_array($link->query("SELECT COUNT(*) AS verif_1 FROM inscription_rally WHERE id_compte = '".$id_compte."' "));
	if($verif['verif_1'] >= '1')
		{
		$sql_2 = mysqli_fetch_array($link->query("SELECT * FROM voiture_membre WHERE id_compte = '".$id_compte."' "));
		$puissance_voiture = $sql_2['puissance'];
		$traction_voiture = $sql_2['traction'];
		$type_voiture = $sql_2['type'];
		if($type_voiture == 'Atmosphérique'){ $type = '1'; }
		if($type_voiture == 'Turbo compréssé'){ $type = '2'; }
		if($traction_voiture == 'traction'){ $traction = '1'; }
		if($traction_voiture == 'propulsion'){ $traction = '2'; }
		if($cond_type == '3'){$type = '3';}
		if($cond_traction == '3'){$traction = '3';}
		if($puissance_voiture > $cond_puissance OR $type <> $cond_type OR $traction <> $cond_traction)
			{
			$sql = $link->query("DELETE FROM inscription_rally WHERE id_compte = '".$id_compte."' ");
			$sql_10 = mysqli_fetch_array($link->query("SELECT * FROM liste_rally WHERE commissaire_piste = '".$_SESSION['pseudo']."' "));
			$ancien_nbr = $sql_10['nbr_verif'];
			$new_verif = ($ancien_nbr + 1);
			$query = $link->query("UPDATE liste_rally SET nbr_verif = '".$new_verif."' WHERE commissaire_piste = '".$_SESSION['pseudo']."' ");
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=verifier_inscription">';
			}else{
			echo '<meta http-equiv="refresh" content="0; url=index.php?page=liste_course">';
			}
		}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=liste_course">';
		}
	}
?>