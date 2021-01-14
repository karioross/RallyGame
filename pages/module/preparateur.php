<?php
include('pages/core/verif_session.php');

echo '<div id="contenu">
	<div class="contenu_haut"></div><div class="contenu_fond">
	<img src="images/icone/preparateur_'.rand(1, 4).'.png" style="float:left;margin:0 20px 0 0" alt=""/>
	<span>Préparateur</span>
	<br /> <br>';
	?>
<div align="center">
Bienvenue chez le préparateur spécialiste automobile, ce dernier est un gros malade, il ferait une fusée avec un pot de yaourt mais seulement si tu le payes !
<br><br>
</div><div align="right">
<a href='index.php?page=article_chassis'>
<img border="0" src="images/bouton/chassis_off.png" onMouseOver="this.src='images/bouton/chassis_on.png'" onMouseOut="this.src='images/bouton/chassis_off.png'" type="image" >
</a>
<a href='index.php?page=article_moteur'>
<img border="0" src="images/bouton/moteur_off.png" onMouseOver="this.src='images/bouton/moteur_on.png'" onMouseOut="this.src='images/bouton/moteur_off.png'" type="image" >
</a>
<a href='index.php?page=article_essence'>
<img border="0" src="images/bouton/essence_off.png" onMouseOver="this.src='images/bouton/essence_on.png'" onMouseOut="this.src='images/bouton/essence_off.png'" type="image" >
</a>
<a href='index.php?page=article_electronnique'>
<img border="0" src="images/bouton/electronnique_off.png" onMouseOver="this.src='images/bouton/electronnique_on.png'" onMouseOut="this.src='images/bouton/electronnique_off.png'" type="image" >
</a>
<?php
if($act_turbo >= '2'){
echo '<a href="index.php?page=article_turbo">
<img border="0" src="images/bouton/turbo_off.png" onMouseOver="this.src=\'images/bouton/turbo_on.png\'" onMouseOut="this.src=\'images/bouton/turbo_off.png\'" type="image" >
</a>';
}
?>
</div>
	</div><div class="contenu_bas"></div><!-- Fin cadre -->	
</div><!-- Fin contenu -->	