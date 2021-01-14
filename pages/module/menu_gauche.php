<?php
echo '<div id="left"><ul><div align="center">';
if(empty($_SESSION['id']))
	{
	echo '<form action="index.php?page=connexion" method="POST">';
	echo '<li >Pseudo : <input type="text" class="champ1" id="login" name="login" size="10" style="border: 0px solid #FFF; background-color: transparent; color: #FFFFFF" /></li>';
	echo '<li >Mdp : <input type="password" name="password" id="password" class="champ1" size="10" style="border: 0px solid #FFF; background-color: transparent; color: #FFFFFF" /></li>';
	echo '<input type="image" id="ok" src="images/valider_off.png" title="Connexion" onMouseOver="this.src=\'images/valider_on.png\'" onMouseOut="this.src=\'images/valider_off.png\'" />
	</form>';
	echo '<a href="index.php?page=inscription">creer un compte</a>';
	}else{
	echo '<li ><bleue>Pseudo</bleue><br>'.$_SESSION['pseudo'].'</li>';
	echo '<li ><bleue>Argent</bleue><br>'.$argent.' €</li>';
	echo '<li ><bleue>Niveau</bleue><br>'.$niveau.'</li>';
	if($verif_voiture == '1')
		{
		echo '<li ><bleue>Voiture</bleue><br>'.$nom_voiture.'</li>';
		}
	
	$retour = $link->query('SELECT COUNT(*) AS affi FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' ');
	$donnees = mysqli_fetch_array($retour);
	if($donnees['affi'] > '0')
		{
		$sql38 = $link->query('SELECT * FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' ');
		$result38 = mysqli_fetch_array($sql38);
		if($result38['vue'] == '0')
			{
			if(isset($_GET['page']) <> 'sponsors' OR $_GET['page'] <> 'sponsors')
				{
				echo '<blink><a href="index.php?page=sponsors"><font color="red">Nouveaux sponsors</font></a></blink>';
				}
			}
		}
	$sql37 = $link->query('SELECT * FROM reclamation_stat WHERE id_compte = '.$_SESSION['id'].' ');
	$result37 = mysqli_fetch_array($sql37);
	if(isset($_GET['page']) <> 'reclamation' OR $_GET['page'] <> 'reclamation')
		{
		if($result37['reclamation'] <= $result37['valider'])
			{
			echo '<blink><a href="index.php?page=reclamation"><font color="red">Réclamation acquise</font></a></blink>';
			}else{
			echo '<br>';
			}
		}
	echo '<li ><a href="index.php?page=deconnexion">Déconnexion</a></li>';
	}
echo '</div></ul></div>';
?>