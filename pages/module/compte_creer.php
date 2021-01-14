<div id="contenu">
	<div class="contenu_haut"></div><div class="contenu_fond">
	<img src="images/logo_accident.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Compte créé sur Rally Game</span>
	<br /> <br>
	<div align="center">
	<?php
	
	if($_SESSION['gm'] == '1')
		{
		$req = $link->query('SELECT * FROM compte');
		while($data = mysqli_fetch_assoc($req)) 
			{
			$id_voiture = "";
			$result = mysqli_fetch_array($link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$data['id'].' '));
			if(empty($result))
				{
				$voiture = 'Aucune voiture';
				}else{
				$id_voiture = $result['voiture'];
				$result = mysqli_fetch_array($link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$id_voiture.' '));
				$voiture = $result['nom'];
				}
			echo '- '.$data['username'].' <font color="red">::</font> Niveau '.$data['niveau_compte'].' <font color="red">::</font> '.$voiture.' -<br>';
			}		
		}else{
		$req = $link->query('SELECT * FROM compte WHERE gm <= 1 ');
		while($data = mysqli_fetch_assoc($req)) 
			{
			$id_voiture = "";
			$result = mysqli_fetch_array($link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$data['id'].' '));
			if(empty($result))
				{
				$voiture = 'Aucune voiture';
				}else{
				$id_voiture = $result['voiture'];
				$result = mysqli_fetch_array($link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$id_voiture.' '));
				$voiture = $result['nom'];
				}
			echo '- '.$data['username'].' <font color="red">::</font> Niveau '.$data['niveau_compte'].' <font color="red">::</font> '.$voiture.' -<br>';
			}
		}
	?>
	
	
	</div>
	
	
	
	</div><div class="contenu_bas"></div>
</div>