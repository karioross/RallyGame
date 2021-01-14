<?php
echo '<div id="right"><ul>';
echo '<div align="center">';
include('pages/core/nbr_connecte.php');
?>
<li ><bleue>Nbr de connecté(s)</bleue></li>
<?php
echo '<li >'.$nbr_connecte.'</li><br>';
echo '<li ><bleue>Nbr de visites</bleue></li>';
echo '<li >'.$nbr_total_visite.'</li><br>';
echo '<li ><bleue>Nbr de comptes</bleue></li>';
echo '<li ><a href="index.php?page=compte_creer">'.$account.'</a></li>';
echo '</br>';
echo '<br>';
echo '</ul></div>';
?>