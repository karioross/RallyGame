<?php
if(isset($_GET['ref']))
	{
	$_SESSION['id_piece'] = $_GET['ref'];
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=valider_achat">';
	}
if(isset($_GET['rally']))
	{
	$_SESSION['id_rally'] = $_GET['rally'];
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=valide_commissaire">';
	}
if(isset($_GET['rally_pilote']))
	{
	$_SESSION['id_rally'] = $_GET['rally_pilote'];
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=valide_pilote">';
	}
if(isset($_GET['verifier']))
	{
	$_SESSION['id_rally'] = $_GET['verifier'];
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=verifier_inscription">';
	}


?>