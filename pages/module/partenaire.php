<?php echo '<div class="lien"><span>Partenaires : </span>';
$sql = 'SELECT * FROM partenaire';
$req = $link->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($data = mysqli_fetch_assoc($req)) 
	{
	echo '<a href="'.$data['lien'].'">'.$data['partenaire'].'</a> '.$data['entre_deux'].' ';
	}
echo '</div>';?>