<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/liste_course.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span>Liste de rallye organisé</span><br /><br>
<body window.onload = cacher;>
<?php echo $tab; ?>
Voici les rallyes auxquelles vous pouvez vous inscrire. Attention, vous ne pouvez-vous inscrire que sur un seul de 
ces rallye à la fois sauf si les dates de ces rallyes ne sont pas identiques. Vous aurez le choix lors de votre 
inscription entre <font color="#0066FF">Pilote </font>ou <font color="#0066FF">Commissaire de piste</font>, les commissaires de piste sont là pour vérifier que les conditions 
de participation aux rallye soient respecté, il touchera alors un pourcentage des gains réalisés lors de ce rallye, 
toutefois il ne peut y avoir qu'un seul commissaire de piste par rallye alors soyez rapide pour avoir la place et un joueur ne peux pas 
s'inscrire deux fois de suite en tant que commissaire de piste. <br><br><br><br><br>
<?php
$i = '1';
$id = '1';
$req = $link->query('SELECT * FROM liste_rally WHERE act = 1 ');
while($data = mysqli_fetch_assoc($req)) 
	{
	$circuit_1 = '0';
	$circuit_2 = '0';
	$circuit_3 = '0';
	$circuit_4 = '0';
	$circuit_5 = '0';	
	$nbr_circuit = '0';
	if($data['cond_2'] == '1'){$moteur = 'Atmo UNIQUEMENT';}
	if($data['cond_2'] == '2'){$moteur = 'Turbo UNIQUEMENT';}
	if($data['cond_2'] == '3'){$moteur = 'Atmo et Turbo autorisés';}
	if($data['cond_3'] == '1'){$traction = 'Traction UNIQUEMENT';}
	if($data['cond_3'] == '2'){$traction = 'Propulsion UNIQUEMENT';}
	if($data['cond_3'] == '3'){$traction = 'Traction et Propulsion autorisés';}
	if($data["circuit_1"] > "0")
		{
		$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$data['circuit_1'].' '));
		$etape_1 = $result['partie_1'];
		$etape_2 = $result['partie_2'];
		$etape_3 = $result['partie_3'];
		$etape_4 = $result['partie_4'];
		$etape_5 = $result['partie_5'];
		$nbr_circuit++;
		$circuit_1 = (($etape_1 + $etape_2 + $etape_3 + $etape_4 + $etape_5) / 5);
		}
	if($data["circuit_2"] > "0")
		{
		$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$data['circuit_2'].' '));
		$etape_1 = $result['partie_1'];
		$etape_2 = $result['partie_2'];
		$etape_3 = $result['partie_3'];
		$etape_4 = $result['partie_4'];
		$etape_5 = $result['partie_5'];
		$nbr_circuit++;
		$circuit_2 = (($etape_1 + $etape_2 + $etape_3 + $etape_4 + $etape_5) / 5);
		}
	if($data["circuit_3"] > "0")
		{
		$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$data['circuit_3'].' '));
		$etape_1 = $result['partie_1'];
		$etape_2 = $result['partie_2'];
		$etape_3 = $result['partie_3'];
		$etape_4 = $result['partie_4'];
		$etape_5 = $result['partie_5'];
		$nbr_circuit++;
		$circuit_3 = (($etape_1 + $etape_2 + $etape_3 + $etape_4 + $etape_5) / 5);
		}		
	if($data["circuit_4"] > "0")
		{
		$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$data['circuit_4'].' '));
		$etape_1 = $result['partie_1'];
		$etape_2 = $result['partie_2'];
		$etape_3 = $result['partie_3'];
		$etape_4 = $result['partie_4'];
		$etape_5 = $result['partie_5'];
		$nbr_circuit++;
		$circuit_4 = (($etape_1 + $etape_2 + $etape_3 + $etape_4 + $etape_5) / 5);
		}		
	if($data["circuit_5"] > "0")
		{
		$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$data['circuit_5'].' '));
		$etape_1 = $result['partie_1'];
		$etape_2 = $result['partie_2'];
		$etape_3 = $result['partie_3'];
		$etape_4 = $result['partie_4'];
		$etape_5 = $result['partie_5'];
		$nbr_circuit++;
		$circuit_5 = (($etape_1 + $etape_2 + $etape_3 + $etape_4 + $etape_5) / 5);
		}		
	$difficulte = (($circuit_1 + $circuit_2 + $circuit_3 + $circuit_4 + $circuit_5) / $nbr_circuit);
	$difficulte = number_format($difficulte,1);
	$compte = mysqli_fetch_array($link->query('SELECT COUNT(*) AS place_prise FROM inscription_rally WHERE id_rally = '.$data['id_rally'].' '));
	$place_prise = $compte['place_prise'];
	echo $i.' - <font size="4"><a style="cursor: pointer;" onClick="javascript:visibilite(\''.$id.'\');" target="_blank">'.$data['nom'].'</a>';
	echo ' <font color="#990000">|</font> ';
	echo '<a href="">Place('.$place_prise.'/'.$data['place_total'].')</a></font>';
	if($difficulte >= '0.00' AND $difficulte <= '8.99') {$etoile = '1'; echo ' <input type="image" src="images/'.$color.'/etoile_on.png">';}
	if($difficulte >= '9.00' AND $difficulte <= '13.99') {$etoile = '2'; echo ' <input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png">';}
	if($difficulte >= '14.00' AND $difficulte <= '17.99') {$etoile = '3'; echo ' <input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png">';}
	if($difficulte >= '18.00' AND $difficulte <= '19.99') {$etoile = '4'; echo ' <input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png">';}
	if($difficulte >= '20.00' AND $difficulte <= '20.00') {$etoile = '5'; echo ' <input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png"><input type="image" src="images/'.$color.'/etoile_on.png">';}
	if($etoile == '1'){ echo '<input type="image" src="images/'.$color.'/etoile_off.png"><input type="image" src="images/'.$color.'/etoile_off.png"><input type="image" src="images/'.$color.'/etoile_off.png"><input type="image" src="images/'.$color.'/etoile_off.png">';}
	if($etoile == '2'){ echo '<input type="image" src="images/'.$color.'/etoile_off.png"><input type="image" src="images/'.$color.'/etoile_off.png"><input type="image" src="images/'.$color.'/etoile_off.png">';}
	if($etoile == '3'){ echo '<input type="image" src="images/'.$color.'/etoile_off.png"><input type="image" src="images/'.$color.'/etoile_off.png">';}
	if($etoile == '4'){ echo '<input type="image" src="images/'.$color.'/etoile_off.png">';}



	echo '<br>';
	echo '<br><div id="divid'.$id.'" style="display:none;">';

	$retour = mysqli_fetch_array($link->query('SELECT COUNT(*) AS valide_pilote FROM inscription_rally WHERE id_rally = '.$data['id_rally'].' AND id_compte = '.$_SESSION['id'].' '));



	if($sponsor_compte == '1')
		{
		$prix_en_moin = (($data['prix_place'] * $spon_prix_rally) / 100);
		$prix_place = ($data['prix_place'] - $prix_en_moin);
		$prix_place = number_format($prix_place,0);
		}else{
		$prix_place = $data['prix_place'];
		}
	if($argent > $prix_place)
		{
		if($data['commissaire_piste'] <> $_SESSION['pseudo'] AND $place_prise < $data['place_total'] AND $retour['valide_pilote'] == '0' AND $verif_voiture >= '1')
			{
			echo '<a href="index.php?page=save_variable&&rally_pilote='.$data['id_rally'].'"><img border="0" src="images/bouton/pilote_off.png" onMouseOver="this.src=\'images/bouton/pilote_on.png\'" onMouseOut="this.src=\'images/bouton/pilote_off.png\'" type="image" ></a>';
			}
		}







	if($data['commissaire_piste'] == '' AND $retour['valide_pilote'] == '0')
		{
		echo '<a href="index.php?page=save_variable&&rally='.$data['id_rally'].'"><img border="0" src="images/bouton/commissaire_off.png" onMouseOver="this.src=\'images/bouton/commissaire_on.png\'" onMouseOut="this.src=\'images/bouton/commissaire_off.png\'" type="image" ></a>';
		}
		
	if($retour['valide_pilote'] > '0')
		{
		echo $tab.''.$tab.'<font color="red">Vous êtes déjà inscrit sur ce rallye.</font>';	
		}else{
		if($data['commissaire_piste'] == $_SESSION['pseudo'])
			{
			echo $tab.''.$tab.'<font color="red">
			
			<a href="index.php?page=save_variable&&verifier='.$data['id_rally'].'">
			<img border="0" src="images/bouton/verifier_off.png" onMouseOver="this.src=\'images/bouton/verifier_on.png\'" onMouseOut="this.src=\'images/bouton/verifier_off.png\'" type="image" >
			</a>
			</font>';	
			}
		}
	
	echo '</div>';
	echo $tab.'<u>Réglementation :</u><br>';
	if(isset($data['commissaire_piste']))
		{
		echo $tab.''.$tab.'Commissaire de piste <font color="#006600">-></font> '.$data['commissaire_piste'].'<br>';
		}
	if($data['niveau_requis'] > '0')
		{
		echo $tab.''.$tab.'Niveau requis <font color="#006600">-></font> '.$data['niveau_requis'].'<br>';
		}
	echo $tab.''.$tab.'Nombre d\'étape <font color="#006600">-></font> '.$nbr_circuit.'<br>';
	echo $tab.''.$tab.'Difficulté du rallye <font color="#006600">-></font> '.$difficulte.'/20<br>';

	if($sponsor_compte == '1')
		{
		$rec_en_plus = (($data['recompense'] * $spon_argent) / 100);
		$prix_rec_reel = ($data['recompense'] + $rec_en_plus);
		$prix_rec_reel = number_format($prix_rec_reel,0);
		echo $tab.''.$tab.'Prix remporté par le vainqueur <font color="#006600">-></font> '.$data['recompense'].'€ <font color="#FF9933"><i>(gain avec bonus sponsor : '.$prix_rec_reel.'€)</i></font><br>';
		}else{
		echo $tab.''.$tab.'Prix remporté par le vainqueur <font color="#006600">-></font> '.$data['recompense'].'€<br>';
		}

	if($data['prix_place'] > '0')
		{
		if($sponsor_compte == '1')
			{
			$prix_en_moin = (($data['prix_place'] * $spon_prix_rally) / 100);
			$prix_reel = ($data['prix_place'] - $prix_en_moin);
			$prix_reel = number_format($prix_reel,0);
			echo $tab.''.$tab.'Prix d\'une place <font color="#006600">-></font> '.$data['prix_place'].'€ <font color="#FF9933"><i>(prix avec réduction sponsor : '.$prix_reel.'€)</i></font><br>';
			}else{
			echo $tab.''.$tab.'Prix d\'une place <font color="#006600">-></font> '.$data['prix_place'].'€<br>';
			}
		}
	
	
	
	
	if($data['cond_1'] == '0')
		{
		$puissance_requise = '&#8734;';
		echo $tab.''.$tab.'Puissance autorisé <font color="#006600">-></font> '.$puissance_requise.'<br>';
		}else{
		$puissance_requise = $data['cond_1'];
		echo $tab.''.$tab.'Puissance autorisé <font color="#006600">-></font> '.$puissance_requise.'Ch MAXI<br>';
		}
	echo $tab.''.$tab.'Type de moteur autorisé <font color="#006600">-></font> '.$moteur.'<br>';
	echo $tab.''.$tab.'Type d\'entrainement autorisé <font color="#006600">-></font> '.$traction.'<br><br>';
	$i++;
	$id++;
	}
?>
<br /></div><div class="contenu_bas"></div>	