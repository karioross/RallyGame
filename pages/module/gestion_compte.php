<?php
include('pages/core/verif_session.php');

echo '<div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/gestion_compte.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span>Gestion du template</span><br>
<table border="0" width="400px" cellspacing="0" cellpadding="0"><tr><td>
Vous pouvez changez la couleur d\'apparence du site :
<form method="POST" action="index.php?page=gestion_compte">';
$result = mysqli_fetch_array($link->query('SELECT * FROM compte WHERE id = '.$_SESSION['id'].' '));
$color_id = $result['color_template'];
if($color_id == 0){ $gris = 'checked'; }else{ $gris = '';}
if($color_id == 1){ $bleue = 'checked'; }else{ $bleue = '';}
if($color_id == 2){ $rose = 'checked'; }else{ $rose = '';}
echo '<input type="radio" value="1" '.$bleue.' name="R1"> Bleue
<input type="radio" value="2" '.$rose.' name="R1"> Rose<br>
<input type="submit" value="Valider" name="ok">
</form>';
if (isset($_POST['ok']))
{
	$query = $link->query("UPDATE compte SET color_template = '".$_POST['R1']."' WHERE id = '".$_SESSION['id']."' ");
	echo '<meta http-equiv="refresh" content="0; url=index.php?page=gestion_compte">';
}
echo '<br><span>Gestion de l\'adresse email</span><br>
Votre adresse email actuel est '.$_SESSION['email'].'<br>
<a href="index.php?page=changement_adresse">[changer d\'adresse]</a><br>';

echo '<br><span>Acheter une écurie plus grande</span><br>
Vous pourrez avoir cinq pilotes et cinq voitures à la place des deux actuellement gratuites.<br>
<a href="">[acheter]</a><br>';

//echo '<br><span>Acheter des medailles de triomphe</span><br>
//Vous avez '.$medaille.' médailles de triomphe.<br>
//<a href="">[acheter]</a><br>';

echo '<br><span>Acheter des crédits</span><br>
Vous avez '.$argent.'€, acheter 250€ pour 1 allopass ?<br>
<a href="">[acheter]</a><br>';

echo '</td></tr></table>
</div><div class="contenu_bas"></div>';
?>