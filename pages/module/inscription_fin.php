<div id="contenu">
	<div class="contenu_haut"></div><div class="contenu_fond"><!-- Début cadre -->
	<img src="images/logo_inscription.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Fin de l'inscription</span>
	<br /> <br>



<?php
//$connect = mysql_connect("db418763407.db.1and1.com","dbo418763407","14mars1990");
//$db = mysql_select_db("db418763407") or die("Impossible de se connecter (erreur #006): " . mysql_error());

if(isset($_POST['pseudo']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['mail']))
	{
	if(!empty($_POST['pseudo']) && !empty($_POST['password1']) &&  !empty($_POST['password2']) && !empty($_POST['mail']))
		{
		$pseudo = strip_tags($_POST['pseudo']);
		$passa = strip_tags($_POST['password1']);
		$passb = strip_tags($_POST['password2']);
		$mail = strip_tags($_POST['mail']);
		$view_p = $link->query("SELECT COUNT(*) AS nb_p FROM compte WHERE username = '".$pseudo."'");
		$p_result = mysqli_fetch_assoc($view_p) or die("Impossible de se connecter (erreur #005): " . mysql_error());
		if($p_result['nb_p'] != '1')
			{
			if($passa == $passb)
				{
				if (preg_match("#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
					{
					$lettres_chiffres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
					$lettres_chiffres_melanges = str_shuffle($lettres_chiffres);
					$code_confirmation = substr($lettres_chiffres_melanges, 1, 100);
					$q = "INSERT INTO compte(username, sha_pass_hash, email, argent, niveau_compte) VALUES('".$pseudo."', SHA1(CONCAT(UPPER('".$pseudo."'),':',UPPER('".$passb."'))), '".$mail."', '25000', '1')";
					$link->query($q) or die("Impossible de se connecter (erreur #004): " . mysql_error());
					mysql_close();
					?>
					<meta http-equiv="refresh" content="3; url=index.php">
					<font color="#00CC00" face="Verdana">Inscription réalisée avec succés, redirection dans 3 secondes...</font>
					<?php
					}else{
					?>
					<font color="#CC3300" face="Verdana">Erreur (code #001): L'adresse Email n'est pas valide...</font>
					<?php
					}
				}else{
				?>
				<font color="#CC3300" face="Verdana">Erreur (code #002): les deux mots de passe ne sont pas identiques...</font>
				<?php
				}
			}else{
			?>
			<meta http-equiv="refresh" content="3; url=index.php">
			<font color="#00CC00" face="Verdana">Inscription réalisée avec succés, redirection dans 3 secondes...</font>
			<?php
			}
		}else{
		?>
		<font color="#CC3300" face="Verdana">Erreur (code #003): tous les champs n'ont pas été remplis...</font>

		<?php
		}
	}
// on d?ruit les variables de session, d?ormais inutiles
session_unset();
session_destroy();
?>

	</div><div class="contenu_bas"></div><!-- Fin cadre -->	
</div><!-- Fin contenu -->	