<?php
$tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		//info cliot16projet.com
//$host = 'db418763407.db.1and1.com';
//$user = 'dbo418763407';
//$pass = '14mars1990';
//$db = 'db418763407';

		//info localhost
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'rallygame';
$couleur_tableau = 'transparent';

$link = mysqli_connect ($host,$user,$pass,$db) or die ('Erreur : '.mysql_error());
$link->set_charset("utf8");

$result = mysqli_fetch_array($link->query('SELECT * FROM config WHERE id = 1 '));
$titre = $result['valeur'];
$result = mysqli_fetch_array($link->query('SELECT * FROM config WHERE id = 2 '));
$rev_template = $result['valeur'];
$result = mysqli_fetch_array($link->query('SELECT * FROM config WHERE id = 3 '));
$rev_script = $result['valeur'];
$result = mysqli_fetch_array($link->query('SELECT * FROM config WHERE id = 4 '));
$rev_debug = $result['valeur'];

$result = mysqli_fetch_array($link->query('SELECT * FROM config WHERE id = 5 '));
$nbr_voiture_standart = $result['valeur'];
$result = mysqli_fetch_array($link->query('SELECT * FROM config WHERE id = 6 '));
$nbr_voiture_premium = $result['valeur'];

?>