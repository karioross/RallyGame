<?php echo '<div id="contenu"><div class="contenu_haut"></div><div class="contenu_fond">
<img src="images/icone/ecurie.png" style="float:left;margin:0 20px 0 0" alt=""/>
<span>Ecurie</span><br /><br>';
echo $tab.'Voici la liste des véhicules que vous possédez. Vous ne pouvez possédez seulement que trois véhicules ainsi 
	que trois pilotes. Pour acquérir une écurie a huit emplacements il vous faut vous rendre dans le pannel gestion de compte 
	afin de upgrader votre compte vers un compte premium.<br><br>';
echo '<form method="POST" action="index.php?page=changement_vehicule">';

echo '<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr><td>';


$ecur = ('SELECT * FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' ');
$ecuri = $link->query($ecur) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($ec = mysqli_fetch_assoc($ecuri))
	{
	$sql40 = $link->query('SELECT * FROM config_voiture WHERE id_voiture = '.$ec['voiture'].' ');
	$result40 = mysqli_fetch_array($sql40);
	if($ec['act'] == '1')
		{
		$checked = 'checked';
		}else{
		$checked = '';
		}
	echo '<input type="radio" value="'.$ec['voiture'].'" '.$checked.' name="R1"> '.$result40['nom'].' '.$result40['couleur'].' (<vert>'.$ec['type'].'</vert> | <vert>'.$ec['puissance'].'Ch</vert>)<br>';
	}
echo '</table></tr></td>';

echo '<br><div align="center">';
echo '<input name="send" type="image" ALT="Send" VALUE="Send" border="0" src="images/bouton/valider_off.png" onMouseOver="this.src=\'images/bouton/valider_on.png\'" onMouseOut="this.src=\'images/bouton/valider_off.png\'">';
echo '</form>';
$ecunbr = $link->query('SELECT COUNT(*) AS nbr_voiture FROM voiture_membre WHERE id_compte = '.$_SESSION['id'].' ');
$ecurnbr = mysqli_fetch_array($ecunbr);
if($_SESSION['gm'] == '0')
	{
	if($ecurnbr['nbr_voiture'] < $nbr_voiture_standart)
		{
		echo '<a href="index.php?page=acheter_voiture">';
		echo '<img type="image" ALT="Send" VALUE="Send" border="0" src="images/bouton/acheter_off.png" onMouseOver="this.src=\'images/bouton/acheter_on.png\'" onMouseOut="this.src=\'images/bouton/acheter_off.png\'">';
		echo '</a>';
		}
	}else if($_SESSION['gm'] == '1'){
	if($ecurnbr['nbr_voiture'] < $nbr_voiture_premium)
		{
		echo '<a href="index.php?page=acheter_voiture">';
		echo '<img type="image" ALT="Send" VALUE="Send" border="0" src="images/bouton/acheter_off.png" onMouseOver="this.src=\'images/bouton/acheter_on.png\'" onMouseOut="this.src=\'images/bouton/acheter_off.png\'">';
		echo '</a>';
		}
	}
echo '</div>';
echo '</div><div class="contenu_bas"></div></div>';
?>