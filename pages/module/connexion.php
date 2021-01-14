<?php echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond"><img src="images/logo_accident.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span>Connexion en cours....</span><br />';
if($_POST['login'] && $_POST['password'])
	{
	if(!empty($_POST['login']) && !empty($_POST['password']))
		{
		$link->query("DELETE FROM password_template") or die (mysql_error());
		$pseudo = htmlspecialchars(strip_tags($_POST['login']));
		$pseudo = str_replace("java script:","",$pseudo);
		$pseudo = str_replace("<script>","",$pseudo); 
		$password = htmlspecialchars(strip_tags($_POST['password']));
		$password = str_replace("java script:","",$password);
		$password = str_replace("<script>","",$password);
		$count_p = $link->query("SELECT COUNT(*) AS nb_p FROM compte WHERE username = '".$pseudo."'");
		$p_result = mysqli_fetch_array($count_p);
		if($p_result['nb_p'] == '1')
			{
			$q = "INSERT INTO password_template(password) VALUES (SHA1(CONCAT(UPPER('".$pseudo."'),':',UPPER('".$password."'))));";
			$link->query($q) or die(mysql_error());
			$password_post = $link->query("SELECT * FROM password_template");
			$password_result = mysqli_fetch_assoc($password_post);
			$compare_pa = $link->query("SELECT * FROM compte WHERE sha_pass_hash = '".$password_result['password']."' AND username = '".$pseudo."'");
			$compare_result = mysqli_fetch_array($compare_pa);
			if($compare_result['sha_pass_hash'] == $password_result['password'])
				{
				$view_information = $link->query("SELECT * FROM compte WHERE username = '".$pseudo."'");
				$information_result = mysqli_fetch_assoc($view_information);
				$_SESSION['login'] = TRUE;
				$_SESSION['pseudo'] = $pseudo;
				$_SESSION['id'] = $information_result['id'];
				$_SESSION['email'] = $information_result['email'];
				$_SESSION['argent'] = $information_result['argent'];
				$_SESSION['niveau'] = $information_result['niveau_compte'];
				$_SESSION['gm'] = $information_result['gm'];
				include('pages/core/inscription_reclamation.php');
				echo '<meta http-equiv="refresh" content="1; url=index.php"><div align="center"><img src="images/loading.gif" /><p></p>Bienvenue '.$_SESSION['pseudo'].' chargement de vos param&egrave;tres...</div>';
				}else{
				echo '<div align="center"><font color="#CC3300">Erreur : Le pseudo ou le mot de passe choisis est invalide ... </font></div>';
				$link->query("DELETE FROM password_template");
				}
			}else{
			echo '<div align="center"><font color="#CC3300">Erreur : Le pseudo ou le mot de passe choisis est invalide ... </font></div>';
			}
		}else{
	echo '<div align="center"><font color="#CC3300">Erreur : Vous n\'avez pas remplis tous les champ ...</font></div>';
	}
}else{
echo '<div align="center"><font color="#CC3300">Erreur : Vous n\'avez pas remplis tous les champ ...</font></div>';
}
?>















	</div><div class="contenu_bas"></div><!-- Fin cadre -->	
</div><!-- Fin contenu -->	