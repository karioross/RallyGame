<?php
include('pages/core/verif_session.php');
echo '<div id="contenu">
<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/preparateur_1.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span><a href="index.php?page=preparateur">Préparateur</a> :: Article Moteur</span>
<br /> <br>'.$tab.'Bon alors, il te faut quoi ? Un bon gros williams saurin ? Ou plus dans la finesse avec un ptit 
GT30 sur bille ? Bon bah j\'te laisse jeter un coup d\'oeil aux étagères et fait moi signe quand t\'aura choisis..';
echo '<div id="blank"></div>';
include('pages/article/article_moteur_complet.php');
echo '</div><div class="contenu_bas"></div></div>'; ?>