<?php
include('pages/core/verif_session.php');
echo '<div id="contenu">
<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/preparateur_3.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span><a href="index.php?page=preparateur">Préparateur</a> :: Article Châssis</span>
<br /> <br>'.$tab.'Hey, regarde moi toutes ces belles pièces que j\'ai reçue, c\'est le paradis des amoureux de la prépa châssis. Par contre, si tu fait tomber une pièce par terre elle est à toi, donc en gros, tu la paye, c\'est clair sa !?.';
echo '<div id="blank"></div>';
include('pages/article/article_chassis_complet.php');
echo '</div><div class="contenu_bas"></div></div>'; ?>