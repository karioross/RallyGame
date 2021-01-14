<?php echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">
	<img src="images/icone/logo_jeux.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Classement des derniers rallyes</span>
	<br /><br>';
	$boucle = '';
	$nbr = mysqli_fetch_array($link->query('SELECT COUNT(*) AS nbr_rally FROM liste_rally '));
	$nbr_rally = $nbr['nbr_rally'];
	$nbr = mysqli_fetch_array($link->query('SELECT COUNT(*) AS valide FROM classement WHERE id_compte = '.$_SESSION['id'].' '));
	if($nbr['valide'] >= '1')
		{
		$sql = $link->query('SELECT * FROM classement WHERE id_compte = "'.$_SESSION['id'].'" AND act = "off" ');
		while($data = mysqli_fetch_assoc($sql))
			{
			$nom_rally = mysqli_fetch_array($link->query('SELECT * FROM liste_rally WHERE id_rally = '.$data['id_rally'].' '));
			echo '<div align="center"><nom_rally> >>> '.$nom_rally['nom'].' <<< </nom_rally>';
			echo '<table border="0" cellspacing="0" bgcolor="">';
			echo '<tr>';
			echo '<td align="center" width="auto"><titel> .::Place::. </titel></td>';
			echo '<td align="center" width="auto"><titel> .::Pseudo::. </titel></td>';
			echo '<td align="center" width="auto"><titel> .::Gain::.  </titel></td>';
			echo '<td align="center" width="auto"><titel> .::Points::. </titel></td>';
			echo '<td align="center" width="auto">  </td>';
			echo '</tr>';
			$boucle++;
			$result = $link->query('SELECT * FROM classement WHERE id_rally = '.$data['id_rally'].' ORDER BY pts_total DESC');
			while($dataa = mysqli_fetch_assoc($result))
				{
				$pseudo = mysqli_fetch_array($link->query('SELECT * FROM compte WHERE id = '.$dataa['id_compte'].' '));
				$pseudo_compte = $pseudo['username'];
				echo '<tr>';
				echo '<td align="center" width="auto">';
				if($dataa['place'] == '1') { echo '<premier>'.$dataa['place'].'</premier>';}
				if($dataa['place'] == '2') { echo '<deuxieme>'.$dataa['place'].'</deuxieme>';}
				if($dataa['place'] == '3') { echo '<troisieme>'.$dataa['place'].'</troisieme>';}
				if($dataa['place'] >= '4') { echo '<reste>'.$dataa['place'].'</reste>';}
				echo '</td>';
				echo '<td align="center" width="auto">';
				if($dataa['place'] == '1') { echo '<premier>'.$pseudo_compte.'</premier>';}
				if($dataa['place'] == '2') { echo '<deuxieme>'.$pseudo_compte.'</deuxieme>';}
				if($dataa['place'] == '3') { echo '<troisieme>'.$pseudo_compte.'</troisieme>';}
				if($dataa['place'] >= '4') { echo '<reste>'.$pseudo_compte.'</reste>';}
				echo '</td>';
				echo '<td align="center" width="auto">';
				if($dataa['place'] == '1') { echo '<premier>'.$dataa['recompense'].' €</premier>';}
				if($dataa['place'] == '2') { echo '<deuxieme>'.$dataa['recompense'].' €</deuxieme>';}
				if($dataa['place'] == '3') { echo '<troisieme>'.$dataa['recompense'].' €</troisieme>';}
				if($dataa['place'] >= '4') { echo '<reste>'.$dataa['recompense'].' €</reste>';}
				echo '</td>';
				echo '<td align="center" width="auto">';
				if($dataa['place'] == '1') { echo '<premier>'.$dataa['pts_total'].'</premier>';}
				if($dataa['place'] == '2') { echo '<deuxieme>'.$dataa['pts_total'].'</deuxieme>';}
				if($dataa['place'] == '3') { echo '<troisieme>'.$dataa['pts_total'].'</troisieme>';}
				if($dataa['place'] >= '4') { echo '<reste>'.$dataa['pts_total'].'</reste>';}
				echo '</td>';
				if($_SESSION['id'] == $dataa['id_compte'])
					{
					echo '<td align="center" width="auto"><a href="index.php?page=stand&&rec='.$dataa['id_rally'].'"><input src="images/bouton/obtenir_on.png" onMouseOver="this.src=\'images/bouton/obtenir_off.png\'" onMouseOut="this.src=\'images/bouton/obtenir_on.png\'" type="image" ></a></td>';
					}else{
					echo '<td align="center" width="auto"><br><font color="transparent">.</font></td>';
					}
				echo '</tr>';
				}
			echo '</table></div><br><br>';
			}
		}
	echo '</div><div class="contenu_bas"></div></div>';	
if(isset($_GET['rec']))
	{
	$verif_1 = mysqli_fetch_array($link->query('SELECT * FROM classement WHERE id_rally = '.$_GET['rec'].' AND id_compte = '.$_SESSION['id'].' '));
	$recompense = $verif_1['recompense'];
	$argent_new = ($argent + $recompense);
	$on = 'on';
	$query = $link->query("UPDATE compte SET argent = '".$argent_new."' WHERE id = '".$_SESSION['id']."'");
	$query = $link->query("UPDATE classement SET act = '".$on."' WHERE id_compte = '".$_SESSION['id']."' AND id_rally = '".$_GET['rec']."' ");
	$nbr_1 = mysqli_fetch_array($link->query('SELECT COUNT(*) AS nbr_1 FROM classement WHERE id_rally = '.$_GET['rec'].' AND act = "on" '));
	$nbr_2 = mysqli_fetch_array($link->query('SELECT COUNT(*) AS nbr_2 FROM classement WHERE id_rally = '.$_GET['rec'].' '));
	if($nbr_1['nbr_1'] == $nbr_2['nbr_2'])
		{
		$sql = $link->query('DELETE FROM classement WHERE id_rally = '.$_GET['rec'].'');
		}
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=stand">';	
} ?>