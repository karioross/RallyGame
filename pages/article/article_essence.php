<?php
include('pages/core/verif_session.php');
echo '<div id="contenu">
<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/preparateur_3.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span><a href="index.php?page=preparateur">Préparateur</a> :: Article Essence</span>
<br /> <br>'.$tab.'Bon, je te la fait pas a l\'envers mais sans un bon gros traitement qui amène de l\'essence par litre a ton moteur tu n\'ira pas bien loin, alors je te conseille ces pièces la !';
echo '<div id="blank"></div>';
include('pages/article/article_essence_complet.php');
echo '</div><div class="contenu_bas"></div></div>'; ?>