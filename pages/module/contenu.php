<?php
if(empty($_GET["page"]))
	{
	include ('pages/module/nouvelle.php');	
	$page = 'index.php';
	}else{
	$page = $_GET["page"];
	switch($page) 
		{
		case 'inscription':
		include ('pages/module/inscription.php');
		break;
		case 'inscription_fin':
		include ('pages/module/inscription_fin.php');
		break;
		case 'connexion':
		include ('pages/module/connexion.php');
		break;
		case 'deconnexion':
		include ('pages/module/deconnexion.php');
		break;
		case 'compte_creer':
		include ('pages/module/compte_creer.php');
		break;
		case 'changement_adresse':
		include ('pages/module/changement_adresse.php');
		break;
		
		
		case 'gestion_compte':
		include ('pages/module/gestion_compte.php');
		break;
		case 'stand':
		include ('pages/stand/stand.php');
		break;
		case 'acheter_voiture':
		include ('pages/module/acheter_voiture.php');
		break;
		case 'retry_car':
		include ('pages/module/retry_car.php');
		break;
		case 'preparateur':
		include ('pages/module/preparateur.php');
		break;
		case 'article_moteur':
		include ('pages/article/article_moteur.php');
		break;
		case 'article_chassis':
		include ('pages/article/article_chassis.php');
		break;
		case 'article_essence':
		include ('pages/article/article_essence.php');
		break;
		case 'article_electronnique':
		include ('pages/article/article_electronnique.php');
		break;
		case 'article_turbo':
		include ('pages/article/article_turbo.php');
		break;


		case 'reclamation':
		include ('pages/reclamation/reclamation.php');
		break;


		case 'new_achat':
		include ('pages/article/new_achat.php');
		break;
		
		
		case 'save_variable':
		include ('pages/core/save_variable.php');
		break;
		case 'valider_achat':
		include ('pages/module/valider_achat.php');
		break;
		
		case 'liste_course':
		include ('pages/module/liste_course.php');
		break;
		case 'valide_commissaire':
		include ('pages/module/valide_commissaire.php');
		break;
		case 'valide_pilote':
		include ('pages/module/valide_pilote.php');
		break;
		case 'verifier_inscription':
		include ('pages/module/verif_inscription.php');
		break;
		
		case 'lancer_course':
		include ('pages/core/lancement_course.php');
		break;
		case 'lancer_classement':
		include ('pages/core/lancement_classement.php');
		break;
		
		case 'changement_vehicule':
		include ('pages/stand/changement_voiture.php');
		break;
		
		case 'sponsors':
		include ('pages/sponsor/sponsor.php');
		break;
		case 'sponsors_valid':
		include ('pages/sponsor/sponsor_valider.php');
		break;
		case 'sponsors_clear':
		include ('pages/sponsor/sponsor_clear.php');
		break;
				
		case 'page_de_test':
		include ('page_de_test.php');
		break;
		}
	}
?>