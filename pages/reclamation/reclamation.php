<?php echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/reclamation.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span>Réclamation</span><br /><br>';
if(isset($_GET['valider']))
	{
	$sql35 = $link->query('SELECT * FROM reclamation_stat WHERE id_compte = '.$_SESSION['id'].' ');
	$result35 = mysqli_fetch_array($sql35);
	if($result35['reclamation'] <= $result35['valider'])
		{
		$sql36 = $link->query('SELECT * FROM reclamation WHERE id = '.$result35['valider'].' ');
		$result36 = mysqli_fetch_array($sql36);
		$argent_plus = ($argent + $result36['argent_gagner']);
		$medaille_plus = ($medaille + $result36['medaille_gagner']);
		$xp_plus = ($xp + $result36['xp_gagner']);
		$reclamation_suivante = ($result35['reclamation'] + 1);
		$link->query('UPDATE compte SET argent = '.$argent_plus.' WHERE id = '.$_SESSION['id'].' ');
		$link->query('UPDATE compte SET medaille = '.$medaille_plus.' WHERE id = '.$_SESSION['id'].' ');
		$link->query('UPDATE compte SET xp = '.$xp_plus.' WHERE id = '.$_SESSION['id'].' ');
		$link->query('UPDATE reclamation_stat SET reclamation = '.$reclamation_suivante.' WHERE id_compte = '.$_SESSION['id'].' ');
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=reclamation">';
		}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=reclamation">';
		}
	}else{
	$retour2 = $link->query('SELECT COUNT(*) AS next FROM reclamation_stat WHERE id_compte = '.$_SESSION['id'].' ');
	$donnees2 = mysqli_fetch_array($retour2);
	if($donnees2['next'] == '0')
		{
		$link->query('INSERT INTO reclamation_stat VALUES('.$_SESSION['id'].', 1, 0)');
		echo '<meta http-equiv="refresh" content="0; url=index.php?page=reclamation">';
		}else{
		$sql35 = $link->query('SELECT * FROM reclamation_stat WHERE id_compte = '.$_SESSION['id'].' ');
		$result35 = mysqli_fetch_array($sql35);
		$reclam_actuel = $result35['reclamation'];
		$recl = ('SELECT * FROM reclamation ORDER BY id ASC LIMIT 0,5');
		$recla = $link->query($recl) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($sa = mysqli_fetch_assoc($recla))
			{		
			if($reclam_actuel > $sa['id_back'] AND $sa['id'] > $result35['valider'] AND $sa['niveau_requis'] <= $niveau OR $reclam_actuel <= $result35['valider'] AND $reclam_actuel == $sa['id'] AND $sa['niveau_requis'] <= $niveau)
				{
				echo '<bleue><font size="3">- '.$sa['nom'].'</font></bleue><br>';
				echo $tab .$sa['description'].'<br>';
				echo '<div align="right"><vert>XP : </vert>'.$sa['xp_gagner'].'<br><vert>Argent : </vert>'.$sa['argent_gagner'].' €';
				if($sa['medaille_gagner'] > '0'){ echo '<br><vert>Medaille de triomphe :</vert> +'.$sa['medaille_gagner'].'<br>';}else{echo '<br>';}
				if($result35['valider'] >= $reclam_actuel)
					{
					echo '<a href="index.php?page=reclamation&&valider"><img border="0" type="image" id="ok" src="images/valider_off.png" title="Connexion" onMouseOver="this.src=\'images/valider_on.png\'" onMouseOut="this.src=\'images/valider_off.png\'" /></a></div>';
					}else{
					echo '<a href=""><img border="0" type="image" id="ok" src="images/valider_off.png" title="Connexion" onMouseOver="this.src=\'images/valider_no.png\'" onMouseOut="this.src=\'images/valider_off.png\'" /></a></div>';
					}
				}
			}
		}
	}
echo '</div><div class="contenu_bas"></div></div>';
?>
