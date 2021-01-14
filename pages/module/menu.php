<?php
$un = '';
$deux = '';
$trois = '';
$quatre = '';
$news = '';
$cinq = '';
$sponsors = '';
$reclamation = '';
if(isset($_GET['page']))
	{
	if($_GET['page'] == "stand"){$un = 'active';}
	if($_GET['page'] == "preparateur" OR $_GET['page'] == "article_moteur" OR $_GET['page'] == "article_chassis" OR $_GET['page'] == "article_essence" OR $_GET['page'] == "article_electronnique" OR $_GET['page'] == "article_turbo"){$deux = 'active';}
	if($_GET['page'] == "liste_course" OR $_GET['page'] == "verifier_inscription"){$trois = 'active';}
	if($_GET['page'] == "gestion_compte" OR $_GET['page'] == "changement_adresse"){$quatre = 'active';}
	if($_GET['page'] == "acheter_voiture"){$cinq = 'active';}
	if($_GET['page'] == "sponsors"){$sponsors = 'active';}
	if($_GET['page'] == "reclamation"){$reclamation = 'active';}
	if($_GET['page'] == "sponsors"){$sponsors = 'active';}
	}else{
	$news = 'active';
	}
echo '<div align=center><div id="navigation" align="center"><ul>';
if($verif_voiture == '1')
	{
	echo '<li id="'.$news.'"><a href="index.php">News</a></li>';
	echo '<li id="'.$un.'"><a href="index.php?page=stand">Mon Stand</a></li>';
	echo '<li id="'.$deux.'"><a href="index.php?page=preparateur">Préparateur</a></li>';
	echo '<li id="'.$trois.'"><a href="index.php?page=liste_course">Liste des rallyes</a></li>';
	echo '<li id="'.$sponsors.'"><a href="index.php?page=sponsors">Sponsors</a></li>';
	echo '<li id="'.$reclamation.'"><a href="index.php?page=reclamation">Réclamation</a></li>';
	echo '<li id="'.$quatre.'"><a href="index.php?page=gestion_compte">Gestion de compte</a></li>';
	}else{
	echo '<li id="'.$news.'"><a href="index.php">News</a></li>';
	echo '<li id="'.$cinq.'"><a href="index.php?page=acheter_voiture">Acheter une voiture</a></li>';
	echo '<li id="'.$reclamation.'"><a href="index.php?page=reclamation">Réclamation</a></li>';
	echo '<li id="'.$quatre.'"><a href="index.php?page=gestion_compte">Gestion de compte</a></li>';
	}
	echo '</ul></div></div>';
?>