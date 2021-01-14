<?php
include('pages/core/verif_session.php');
if($act_turbo >= '2'){
echo '<div id="contenu">
<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/preparateur_3.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span><a href="index.php?page=preparateur">Préparateur</a> :: Article Turbo</span>
<br /> <br>'.$tab.'Bon, t\'a caisse a un escargot, donc c\'est le moment de te lançer dans une souflerie de luxe, ok ? Bon croit moi ton truc tous vieux vaut rien, c\'est bon pour la casse, c\'est même plus un escargot mais une limace a ce stade la, donc prend moi un gros GT30 et vas te prendre un belle arbre après, ok ?';
echo '<div id="blank"></div>';
include('pages/article/article_turbo_complet.php');
echo '</div><div class="contenu_bas"></div></div>';} ?>