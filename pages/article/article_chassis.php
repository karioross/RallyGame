<?php
include('pages/core/verif_session.php');
echo '<div id="contenu">
<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/preparateur_3.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span><a href="index.php?page=preparateur">Pr�parateur</a> :: Article Ch�ssis</span>
<br /> <br>'.$tab.'Hey, regarde moi toutes ces belles pi�ces que j\'ai re�ue, c\'est le paradis des amoureux de la pr�pa ch�ssis. Par contre, si tu fait tomber une pi�ce par terre elle est � toi, donc en gros, tu la paye, c\'est clair sa !?.';
echo '<div id="blank"></div>';
include('pages/article/article_chassis_complet.php');
echo '</div><div class="contenu_bas"></div></div>'; ?>