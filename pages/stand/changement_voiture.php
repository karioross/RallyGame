<?php
include('pages/core/verif_session.php');
$query = ("UPDATE voiture_membre SET act = 0 WHERE id_compte = '".$_SESSION['id']."' AND voiture = '".$id_voiture."' ");
$link->query($query) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
$query = ("UPDATE voiture_membre SET act = 1 WHERE id_compte = '".$_SESSION['id']."' AND voiture = '".$_POST['R1']."' ");
$link->query($query) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
echo '<meta http-equiv="refresh" content="0; url=index.php?page=stand">';
?>