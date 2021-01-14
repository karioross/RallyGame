<?php
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 1 '));
$act_menu_gauche = $result['active'];
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 2 '));
$act_menu_droit = $result['active'];
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 3 '));
$act_nouvelle = $result['active'];
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 4 '));
$act_copyright = $result['active'];
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 5 '));
$act_partenaire = $result['active'];
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 6 '));
$act_liens_utiles = $result['active'];
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 7 '));
$act_connecte = $result['active'];
$result = mysqli_fetch_array($link->query('SELECT * FROM module WHERE id = 8 '));
$act_inscription = $result['active'];
?>