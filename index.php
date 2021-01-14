<?php session_start();
//error_reporting(0);
header( 'content-type: text/html; charset=utf-8' );
require('pages/core/config.php');
require('pages/core/verif_module.php');
require('pages/core/verif_voiture.php');
require('pages/core/core_compte.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<link rel="icon" type="image/png" href="images/icone.png" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/achat.css" rel="stylesheet" type="text/css" />
<link href="css/global.css" rel="stylesheet" type="text/css" />
<head>
<title>éè<?php echo $titre.' :: rev'.$rev_template.'.'.$rev_script.'.'.$rev_debug; ?></title>
<meta charset="UTF-8">
</head>
<script type="text/javascript" src="js/script_div.js"></script>
<?php if(empty($_SESSION["login"]))
	{
	$color = 'bleue';
	}else{
	$result = mysqli_fetch_array($link->query('SELECT * FROM compte WHERE id = '.$_SESSION['id'].' '));
	$color_id = $result['color_template'];
	if($color_id == 0){ $color = 'gris'; }
	if($color_id == 1){ $color = 'bleue'; }
	if($color_id == 2){ $color = 'rose'; }
	}
echo '<link href="css/style_'.$color.'.css"	title="Défaut" rel="stylesheet" type="text/css" media="screen" />
</head><body><div id="superglobal">';



echo '<div id="conteneur">
	<div id="header">';
	if($act_menu_gauche == 1 OR $act_menu_droit == 1){
		echo '<div id="menu">';
		if($act_menu_gauche == 1){include('pages/module/menu_gauche.php');}
		if($act_menu_droit == 1){include('pages/module/menu_droit.php');}
		echo '</div>';
		}
	echo '</div>';
	

	if($color == 'rose' OR $color == 'bleue')
		{
		echo '<br><br><br>';
		}
	
	
	
	echo '<div id="contenu">';

	if(isset($_SESSION['id'])){include('pages/module/menu.php');}
		
		
		
	if($act_nouvelle == 1){include('pages/module/contenu.php');}else{include('pages/module/maintenance.php');}
	echo '</div>
</div><div class="blanc"></div>

<div id="attache">
	<div id="pied"></div>
	<div id="bas_page">
	<br />';
	if($act_copyright == 1){include('pages/module/copyright.php');}
	if($act_partenaire == 1){include('pages/module/partenaire.php');}
	if($act_liens_utiles == 1){include('pages/module/liens_utiles.php');}
	echo '<br>
	</div>
</div>
</div>
</body></html>';
?>