<?php
echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">';
echo '<img src="images/sponsor/'.$nom_sponsor.'.png" style="float:left;margin:0 20px 0 0" alt=""/>';

echo '<span>Sponsor de votre écurie</span><br /><br>';

echo '<table border="0" width="400px" cellspacing="0" cellpadding="0"><tr><td>';

if($spon_medaille > '0')
	{
	echo 'Nombre de médaille gagnée en plus pour les rallyes avec une récompense de médaille :<br>';
	echo $tab.'<vert>- '.$spon_medaille.' médaille en plus</vert><br><br>';
	}
if($spon_argent > '0')
	{
	echo 'Pourcentage d\'argent en plus pour les victoires en rallye :<br>';
	echo $tab.'<vert>- '.$spon_argent.'%</vert><br><br>';
	}
if($spon_prix_piece > '0')
	{
	echo 'Réduction sur les prix des pièces performance :<br>';
	echo $tab.'<vert>- '.$spon_prix_piece.'%</vert><br><br>';
	}
if($spon_prix_rally > '0')
	{
	echo 'Réduction sur les inscriptions de rallye :<br>';
	echo $tab.'<vert>- '.$spon_prix_rally.'%</vert><br><br>';
	}

echo '</td></tr></table>';









echo '</div><div class="contenu_bas"></div></div>';
?>