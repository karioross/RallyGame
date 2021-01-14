<?php
$piece_nom_back = '';
$sql5 = ('SELECT * FROM piece_chassis');
$req5 = $link->query($sql5) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($data1 = mysqli_fetch_assoc($req5)) 
	{
	$piece_nom = $data1['piece'];
	if($piece_nom <> $piece_nom_back)
		{
		echo '<table border="0" width="auto" align="center" cellspacing="0" cellpadding="1"><tr>';
		$sql = ('SELECT * FROM piece_chassis WHERE piece = "'.$piece_nom.'" ');
		$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($data = mysqli_fetch_assoc($req)) 
			{
			$sql3 = $link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
			$result3 = mysqli_fetch_array($sql3) or die("Impossible de se connecter (erreur #184): " . mysql_error());
			echo '<td align="center" width="150"><div id="blank"><div id="logo_1"><img border="0" src="images/achat/'.$data['piece'].'.png"></div>';
			
			if($data['niveau'] >= '30' AND $data['niveau'] <= '32')
				{
				if($data['niveau'] == '30' AND $result3['pneu_neige'] == $data['niveau'] AND $result3['pneu_equiper'] == $data['niveau'])
					{
					echo '<div id="logo_2"><img border="0" src="images/achat/valider.png"></div>';
					}else if($data['niveau'] == '30' AND $result3['pneu_neige'] == ($data['niveau'] - 1) AND $data['niv_exige'] <= $niveau){
					echo '<div id="logo_2"><img border="0" src="images/achat/achat.png"></div>';
					}else if($data['niveau'] == '30' AND $result3['pneu_neige'] == ($data['niveau'] - 1) AND $data['niv_exige'] > $niveau){
					echo '<div id="logo_2"><img border="0" src="images/achat/bloquer.png"></div>';
					}else if($data['niveau'] == '30' AND $result3['pneu_neige'] == $data['niveau'] AND $result3['pneu_equiper'] <> $data['niveau']){
					echo '<div id="logo_2"><img border="0" src="images/achat/acheter.png"></div>';
					}
				if($data['niveau'] == '31' AND $result3['pneu_ete'] == $data['niveau'] AND $result3['pneu_equiper'] == $data['niveau'])
					{
					echo '<div id="logo_2"><img border="0" src="images/achat/valider.png"></div>';
					}else if($data['niveau'] == '31' AND $result3['pneu_ete'] == ($data['niveau'] - 1) AND $data['niv_exige'] <= $niveau){
					echo '<div id="logo_2"><img border="0" src="images/achat/achat.png"></div>';
					}else if($data['niveau'] == '31' AND $result3['pneu_ete'] == ($data['niveau'] - 1) AND $data['niv_exige'] > $niveau){
					echo '<div id="logo_2"><img border="0" src="images/achat/bloquer.png"></div>';
					}else if($data['niveau'] == '31' AND $result3['pneu_ete'] == $data['niveau'] AND $result3['pneu_equiper'] <> $data['niveau']){
					echo '<div id="logo_2"><img border="0" src="images/achat/acheter.png"></div>';
					}
				if($data['niveau'] == '32' AND $result3['pneu_pluie'] == $data['niveau'] AND $result3['pneu_equiper'] == $data['niveau'])
					{
					echo '<div id="logo_2"><img border="0" src="images/achat/valider.png"></div>';
					}else if($data['niveau'] == '32' AND $result3['pneu_pluie'] == ($data['niveau'] - 1) AND $data['niv_exige'] <= $niveau){
					echo '<div id="logo_2"><img border="0" src="images/achat/achat.png"></div>';
					}else if($data['niveau'] == '32' AND $result3['pneu_pluie'] == ($data['niveau'] - 1) AND $data['niv_exige'] > $niveau){
					echo '<div id="logo_2"><img border="0" src="images/achat/bloquer.png"></div>';
					}else if($data['niveau'] == '32' AND $result3['pneu_pluie'] == $data['niveau'] AND $result3['pneu_equiper'] <> $data['niveau']){
					echo '<div id="logo_2"><img border="0" src="images/achat/acheter.png"></div>';
					}
				}else if($data['niveau'] < $result3["$piece_nom"]){
				echo '<div id="logo_2"><img border="0" src="images/achat/acheter.png"></div>';
				}else if($data['niveau'] == $result3["$piece_nom"]) {
				echo '<div id="logo_2"><img border="0" src="images/achat/valider.png"></div>';
				}else if($data['niveau'] > $result3["$piece_nom"] AND $data['niv_exige'] <= $niveau) {
				echo '<div id="logo_2"><img border="0" src="images/achat/achat.png"></div>';
				}else{
				echo '<div id="logo_2"><img border="0" src="images/achat/bloquer.png"></div>';
				}
			if($data['niveau'] == '30')
				{
				if($data['niveau'] > $result3['pneu_neige'] AND $argent >= $data['prix'] AND $data['niv_exige'] <= $niveau AND $result3['pneu_equiper'] <> $data['niveau'])
					{
					echo '<div id="logo_3"><a href="index.php?page=new_achat&&type='.$piece_nom.'&&id='.$data['niveau'].'&&cat=chassis"><img border="0" src="images/achat/niv_'.$data['niveau'].'.png"></a></div></div></td>';
					}else if($niveau < $data['niv_exige']){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Débloqué au niveau '.$data['niv_exige'].'\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					} if($argent < $data['prix'] AND $data['niveau'] > $result3['pneu_neige']){
					$manque = ($data['prix'] - $argent);
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Il vous manque '.$manque.' €\')" border="0" src="images/achat/niv_'.$data['niv_exige'].'.png"></div></div></td>';
					} if($result3['pneu_neige'] == $data['niveau'] AND $result3['pneu_equiper'] <> $data['niveau']){
					echo '<div id="logo_3"><a href="index.php?page=new_achat&&type='.$piece_nom.'&&id='.$data['niveau'].'&&cat=chassis"><img border="0" src="images/achat/niv_'.$data['niveau'].'.png"></a></div></div></td>';
					} if($result3['pneu_equiper'] == $data['niveau']){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Vous etes déjà équipé de ces pneux\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					}
				}else if($data['niveau'] == '31'){
				if($data['niveau'] > $result3['pneu_ete'] AND $argent >= $data['prix'] AND $data['niv_exige'] <= $niveau)
					{
					echo '<div id="logo_3"><a href="index.php?page=new_achat&&type='.$piece_nom.'&&id='.$data['niveau'].'&&cat=chassis"><img border="0" src="images/achat/niv_'.$data['niveau'].'.png"></a></div></div></td>';
					}else if($niveau < $data['niv_exige']){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Débloqué au niveau '.$data['niv_exige'].'\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					} if($argent < $data['prix'] AND $data['niveau'] > $result3['pneu_ete']){
					$manque = ($data['prix'] - $argent);
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Il vous manque '.$manque.' €\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					} if($result3['pneu_ete'] == $data['niveau'] AND $result3['pneu_equiper'] <> $data['niveau']){
					echo '<div id="logo_3"><a href="index.php?page=new_achat&&type='.$piece_nom.'&&id='.$data['niveau'].'&&cat=chassis"><img border="0" src="images/achat/niv_'.$data['niveau'].'.png"></a></div></div></td>';
					} if($result3['pneu_equiper'] == $data['niveau']){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Vous etes déjà équipé de ces pneux\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					}
				}else if($data['niveau'] == '32'){
				if($data['niveau'] > $result3['pneu_pluie'] AND $argent >= $data['prix'] AND $data['niv_exige'] <= $niveau)
					{
					echo '<div id="logo_3"><a href="index.php?page=new_achat&&type='.$piece_nom.'&&id='.$data['niveau'].'&&cat=chassis"><img border="0" src="images/achat/niv_'.$data['niveau'].'.png"></a></div></div></td>';
					}else if($niveau < $data['niv_exige']){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Débloqué au niveau '.$data['niv_exige'].'\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					} if($argent < $data['prix'] AND $data['niveau'] > $result3['pneu_pluie']){
					$manque = ($data['prix'] - $argent);
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Il vous manque '.$manque.' €\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					} if($result3['pneu_pluie'] == $data['niveau'] AND $result3['pneu_equiper'] <> $data['niveau']){
					echo '<div id="logo_3"><a href="index.php?page=new_achat&&type='.$piece_nom.'&&id='.$data['niveau'].'&&cat=chassis"><img border="0" src="images/achat/niv_'.$data['niveau'].'.png"></a></div></div></td>';
					} if($result3['pneu_equiper'] == $data['niveau']){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Vous etes déjà équipé de ces pneux\')" border="0" src="images/achat/niv_'.$data['niveau'].'.png"></div></div></td>';
					}
				}else{
				if($argent >= $data['prix'] AND $data['niv_exige'] <= $niveau AND $data['niveau'] > $result3["$piece_nom"])
					{
					echo '<div id="logo_3"><a href="index.php?page=new_achat&&type='.$piece_nom.'&&id='.$data['niveau'].'&&cat=chassis"><img border="0" src="images/achat/niv_'.$data['niv_exige'].'.png"></a></div></div></td>';
					}else if($data['niv_exige'] > $niveau){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Débloqué au niveau '.$data['niv_exige'].'\')" border="0" src="images/achat/niv_'.$data['niv_exige'].'.png"></div></div></td>';
					}else if($argent < $data['prix']){
					$manque = ($data['prix'] - $argent);
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Il vous manque '.$manque.' €\')" border="0" src="images/achat/niv_'.$data['niv_exige'].'.png"></div></div></td>';
					}else if($data['niveau'] <= $result3["$piece_nom"]){
					echo '<div id="logo_3"><img onClick="javascript:alert(\'Vous avez déjà acheter cette pièce\')" border="0" src="images/achat/niv_'.$data['niv_exige'].'.png"></div></div></td>';
					}
				}
			}
		echo '</tr><tr>';
		$sql = ('SELECT * FROM piece_chassis WHERE piece = "'.$piece_nom.'" ');
		$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($data = mysqli_fetch_assoc($req)) 
			{
			echo '<br><td align="center" width="150"><font size="1">'.$data['descriptif'].'</font></td>';
			}
		echo '</tr><tr>';
		$sql = ('SELECT * FROM piece_chassis WHERE piece = "'.$piece_nom.'" ');
		$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($data = mysqli_fetch_assoc($req))
			{
			echo '<td align="center" width="150"><font size="1">';
			if($data['grip'] > '0'){echo '<bleue>Grip : </bleue>+'.$data['grip'].'<br>';}
			if($data['poid'] < '0'){echo '<bleue>Poid : </bleue>'.$data['poid'].'<br>';}
			if($data['chevaux'] > '0'){echo '<bleue>Chevaux : </bleue>+'.$data['chevaux'].'<br>';}
			if($data['solidite'] > '0'){echo '<bleue>Solidité : </bleue>+'.$data['solidite'].'<br>';}
			echo '</font></td>';
			}
		echo '</tr><tr>';
		$sql = ('SELECT * FROM piece_chassis WHERE piece = "'.$piece_nom.'" ');
		$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($data = mysqli_fetch_assoc($req))
			{
			if($data['niveau'] == '30' AND $result3['pneu_neige'] == $data['niveau']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>#####</vert></font></td>';
				}else if($data['niveau'] == '30' AND $result3['pneu_neige'] == ($data['niveau'] - 1) AND $argent >= $data['prix']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>'.$data['prix'].' €</vert></font></td>';
				}else if($data['niveau'] == '30' AND $result3['pneu_neige'] == ($data['niveau'] - 1) AND $argent <= $data['prix']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><rouge>'.$data['prix'].' €</rouge></font></td>';
				}else if($data['niveau'] == '31' AND $result3['pneu_ete'] == $data['niveau']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>#####</vert></font></td>';
				}else if($data['niveau'] == '31' AND $result3['pneu_ete'] == ($data['niveau'] - 1) AND $argent >= $data['prix']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>'.$data['prix'].' €</vert></font></td>';
				}else if($data['niveau'] == '31' AND $result3['pneu_ete'] == ($data['niveau'] - 1) AND $argent <= $data['prix']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><rouge>'.$data['prix'].' €</rouge></font></td>';
				}else if($data['niveau'] == '32' AND $result3['pneu_pluie'] == $data['niveau']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>#####</vert></font></td>';
				}else if($data['niveau'] == '32' AND $result3['pneu_pluie'] == ($data['niveau'] - 1) AND $argent >= $data['prix']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>'.$data['prix'].' €</vert></font></td>';
				}else if($data['niveau'] == '32' AND $result3['pneu_pluie'] == ($data['niveau'] - 1) AND $argent <= $data['prix']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><rouge>'.$data['prix'].' €</rouge></font></td>';
				}else if($data['niveau'] < '29' AND $data['niveau'] <= $result3["$piece_nom"]){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>#####</vert></font></td>';
				}else if($data['niveau'] < '29' AND $data['niveau'] > $result3["$piece_nom"] AND $argent >= $data['prix']){
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><vert>'.$data['prix'].' €</vert></font></td>';
				}else{
				echo '<td align="center" width="150" bgcolor="#000000"><font size="1"><rouge>'.$data['prix'].' €</rouge></font></td>';
				}
			}
		echo '</tr></table>';
		}
	$piece_nom_back = $piece_nom;
	}
?>