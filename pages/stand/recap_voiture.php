<?php
$sql1 = $link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' AND act = 1 ');
$result1 = mysqli_fetch_array($sql1) or die("Impossible de se connecter (erreur #184): " . mysql_error());

echo 'Puissance = '.$result1['puissance'].'Ch<br>';
echo 'Grip = '.$result1['grip'].'/40 (10 debut)<br>';
echo 'Poids = '.$result1['poid'].'/20 (10 debut)<br>';
echo 'Solidité = '.$result1['solidite'].'/30 (10 debut)<br>';

?>