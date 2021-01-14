<?php
$total_cont = '0';

	//Pages dans --> pages/article/*
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_chassis.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_chassis_complet.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_moteur.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_moteur_complet.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_essence.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_essence_complet.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_electronnique.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_electronnique_complet.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_turbo.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/article/article_turbo_complet.php'), "\n"));


	//Pages dans --> pages/core/*
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/config.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/core_compte.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/lancement_classement.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/lancement_course.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/nbr_connecte.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/save_variable.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/verif_module.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/verif_session.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/verif_voiture.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/reclamation.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/core/inscription_reclamation.php'), "\n"));

	//Pages dans --> pages/module/*
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/acheter_voiture.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/changement_adresse.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/classement_membre.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/compte_creer.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/connexion.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/contenu.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/copyright.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/deconnexion.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/equipement_installer.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/erreur_404.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/gestion_compte.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/inscription.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/inscription_fin.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/liens_utiles.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/liste_course.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/maintenance.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/menu.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/menu_droit.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/menu_gauche.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/nouvelle.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/partenaire.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/preparateur.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/retry_car.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/valide_commissaire.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/valide_pilote.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/valider_achat.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/verif_inscription.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/module/verif_pseudo.php'), "\n"));


	//Pages dans --> pages/reclamation/*
$total_cont = ($total_cont + substr_count(file_get_contents('pages/reclamation/reclamation.php'), "\n"));

	//Pages dans --> pages/stand/*
$total_cont = ($total_cont + substr_count(file_get_contents('pages/stand/changement_voiture.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/stand/ecurie.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/stand/recap_voiture.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/stand/stand.php'), "\n"));

	//Pages dans --> pages/sponsor/*
$total_cont = ($total_cont + substr_count(file_get_contents('pages/sponsor/sponsor.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/sponsor/sponsor_affichage.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/sponsor/sponsor_script.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/sponsor/sponsor_valider.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('pages/sponsor/sponsor_clear.php'), "\n"));


	//Index et CSS
$total_cont = ($total_cont + substr_count(file_get_contents('index.php'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('css/style_bleue.css'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('css/style_rose.css'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('css/menu.css'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('css/achat.css'), "\n"));
$total_cont = ($total_cont + substr_count(file_get_contents('css/global.css'), "\n"));
?>