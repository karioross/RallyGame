<script type="text/javascript" src="js/verif.js"></script>





<div id="contenu">
	<div class="contenu_haut"></div><div class="contenu_fond"><!-- Début cadre -->
	<img src="images/icone/logo_pre-inscription.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Pré-inscription à ClioT16 projet</span>
	<br /><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	L'inscription à clioT16 projet n'est pas obligatoire, elle vous donne simplement 
	accés au info-email (vous recevrez des email à chaque mise à jour du site) mais aussi 
	au mini-jeux ClioT16 Rallye Game (C.T.R.game). Cette inscription est totalement gratuite.
	<br>
	</div><div class="contenu_bas"></div><!-- Fin cadre -->	
	
	<div class="contenu_haut"></div><div class="contenu_fond"><!-- Début cadre -->
	<img src="images/icone/logo_inscription.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Formulaire d'inscription</span>
	<br /><br>
	
	
		<form action="index.php?page=inscription_fin" method="POST">
		<p align="center">
		
		Nom d'utilisateur :
		<br>
		<input type="text" name="pseudo" onchange="verifPseudo(this.value)"/> 
		<div id="pseudo_box" style='text-align:center'></div>
		<br>
		</p>

		<p align="center">
		Mot de passe :
		<br>
		<input type="password" name="password1" />
		<br><br>
		
		Répéter mot de passe : 
		<br>
		<input type="password" name="password2" />
		<br><br>
		
		Adresse Email :
		<br>
		<input type="text" name="mail" />
		<br><br>
		
		<font size="1" color="#FF0000">indiquer une 
		adresse mail valide, en cas de perte de mot de passe<br /> 
		cette adresse sera la seul assurance que vous aurez.</font>
		<br><br>
		
		<input src="images/valider_off.png" onMouseOver="this.src='images/valider_on.png'" onMouseOut="this.src='images/valider_off.png'" type="image" >
		
		</p>
		<br>
		</form>
	
	
	
	</div><div class="contenu_bas"></div><!-- Fin cadre -->	
	
</div><!-- Fin contenu -->	