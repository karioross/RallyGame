<?php
$boucle = '';
$nbr = mysqli_fetch_array($link->query('SELECT COUNT(*) AS nbr_rally FROM liste_rally WHERE act = 1 '));
$nbr_rally = $nbr['nbr_rally'];
if($nbr_rally >= 1)
	{
	echo 'if($nbr_rally >= 1) == OK<br>';
	$sql = $link->query('SELECT * FROM liste_rally WHERE act = 1 ');
	while($data = mysqli_fetch_assoc($sql))
		{
		do
			{
			$boucle++;
			$result = mysqli_fetch_array($link->query('SELECT * FROM liste_rally WHERE id_rally = '.$boucle.' AND act = 1 '));
			$place_total = $result['place_total'];
			$circuit_1 = $result['circuit_1'];
			$circuit_2 = $result['circuit_2'];
			$circuit_3 = $result['circuit_3'];
			$circuit_4 = $result['circuit_4'];
			$circuit_5 = $result['circuit_5'];

			$nbr1 = mysqli_fetch_array($link->query('SELECT COUNT(*) AS place_prise FROM inscription_rally WHERE id_rally = '.$boucle.''));
			$place_prise = $nbr1['place_prise'];
			if($place_prise == $place_total)
				{
				echo 'if($place_prise == $place_total) == OK<br>';
				
				$sql = $link->query('SELECT * FROM inscription_rally WHERE id_rally = '.$boucle.' ');
				while($data = mysqli_fetch_assoc($sql))
					{
					$result = mysqli_fetch_array($link->query('SELECT * FROM voiture_membre WHERE id_compte = '.$data['id_compte'].' '));
					$puissance = $result['puissance'];
					$result = mysqli_fetch_array($link->query('SELECT * FROM compte WHERE id = '.$data['id_compte'].' '));
					$niveau = $result['niveau_compte'];
					
					$pts_c1 = '0';
					$pts_c2 = '0';
					$pts_c3 = '0';
					$pts_c4 = '0';
					$pts_c5 = '0';
					
					
					if($circuit_1 >= 1)
						{
						$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$circuit_1.' '));
						$c1p1 = $result['partie_1'];
						$c1p2 = $result['partie_2'];
						$c1p3 = $result['partie_3'];
						$c1p4 = $result['partie_4'];
						$c1p5 = $result['partie_5'];
						$pts_c1p1 = ( mt_rand($niveau, $c1p1) * $puissance);
						$pts_c1p2 = ( mt_rand($niveau, $c1p2) * $puissance);
						$pts_c1p3 = ( mt_rand($niveau, $c1p3) * $puissance);
						$pts_c1p4 = ( mt_rand($niveau, $c1p4) * $puissance);
						$pts_c1p5 = ( mt_rand($niveau, $c1p5) * $puissance);
						$pts_c1 = ($pts_c1p1 + $pts_c1p2 + $pts_c1p3 + $pts_c1p4 + $pts_c1p5);
						}

					if($circuit_2 >= 1)
						{
						$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$circuit_2.' '));
						$c2p1 = $result['partie_1'];
						$c2p2 = $result['partie_2'];
						$c2p3 = $result['partie_3'];
						$c2p4 = $result['partie_4'];
						$c2p5 = $result['partie_5'];
						$pts_c2p1 = ( mt_rand($niveau, $c1p1) * $puissance);
						$pts_c2p2 = ( mt_rand($niveau, $c1p2) * $puissance);
						$pts_c2p3 = ( mt_rand($niveau, $c1p3) * $puissance);
						$pts_c2p4 = ( mt_rand($niveau, $c1p4) * $puissance);
						$pts_c2p5 = ( mt_rand($niveau, $c1p5) * $puissance);
						$pts_c2 = ($pts_c2p1 + $pts_c2p2 + $pts_c2p3 + $pts_c2p4 + $pts_c2p5);
						}

					if($circuit_3 >= 1)
						{
						$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$circuit_3.' '));
						$c3p1 = $result['partie_1'];
						$c3p2 = $result['partie_2'];
						$c3p3 = $result['partie_3'];
						$c3p4 = $result['partie_4'];
						$c3p5 = $result['partie_5'];
						$pts_c3p1 = ( mt_rand($niveau, $c1p1) * $puissance);
						$pts_c3p2 = ( mt_rand($niveau, $c1p2) * $puissance);
						$pts_c3p3 = ( mt_rand($niveau, $c1p3) * $puissance);
						$pts_c3p4 = ( mt_rand($niveau, $c1p4) * $puissance);
						$pts_c3p5 = ( mt_rand($niveau, $c1p5) * $puissance);
						$pts_c3 = ($pts_c3p1 + $pts_c3p2 + $pts_c3p3 + $pts_c3p4 + $pts_c3p5);
						}

					if($circuit_4 >= 1)
						{
						$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$circuit_4.' '));
						$c4p1 = $result['partie_1'];
						$c4p2 = $result['partie_2'];
						$c4p3 = $result['partie_3'];
						$c4p4 = $result['partie_4'];
						$c4p5 = $result['partie_5'];
						$pts_c4p1 = ( mt_rand($niveau, $c1p1) * $puissance);
						$pts_c4p2 = ( mt_rand($niveau, $c1p2) * $puissance);
						$pts_c4p3 = ( mt_rand($niveau, $c1p3) * $puissance);
						$pts_c4p4 = ( mt_rand($niveau, $c1p4) * $puissance);
						$pts_c4p5 = ( mt_rand($niveau, $c1p5) * $puissance);
						$pts_c4 = ($pts_c4p1 + $pts_c4p2 + $pts_c4p3 + $pts_c4p4 + $pts_c4p5);
						}

					if($circuit_5 >= 1)
						{
						$result = mysqli_fetch_array($link->query('SELECT * FROM config_circuit WHERE id_circuit = '.$circuit_5.' '));
						$c5p1 = $result['partie_1'];
						$c5p2 = $result['partie_2'];
						$c5p3 = $result['partie_3'];
						$c5p4 = $result['partie_4'];
						$c5p5 = $result['partie_5'];
						$pts_c5p1 = ( mt_rand($niveau, $c1p1) * $puissance);
						$pts_c5p2 = ( mt_rand($niveau, $c1p2) * $puissance);
						$pts_c5p3 = ( mt_rand($niveau, $c1p3) * $puissance);
						$pts_c5p4 = ( mt_rand($niveau, $c1p4) * $puissance);
						$pts_c5p5 = ( mt_rand($niveau, $c1p5) * $puissance);
						$pts_c5 = ($pts_c5p1 + $pts_c5p2 + $pts_c5p3 + $pts_c5p4 + $pts_c5p5);
						}
					$pts_total = ($pts_c1 + $pts_c2 + $pts_c3 + $pts_c4 + $pts_c5);
					//$query = $link->query("INSERT INTO grille VALUES ('".$data['id_compte']."', '".$boucle."', '".$pts_c1."', '".$pts_c2."', '".$pts_c3."', '".$pts_c4."', '".$pts_c5."', '".$pts_total."') ");
					
					$q ="INSERT INTO grille (id_compte, id_rally, pts_c1, pts_c2, pts_c3, pts_c4, pts_c5, pts_total) VALUES('".$data['id_compte']."', '".$boucle."', '".$pts_c1."', '".$pts_c2."', '".$pts_c3."', '".$pts_c4."', '".$pts_c5."', '".$pts_total."')";
					$link->query($q) or die("Impossible de se connecter (erreur #004): " . mysql_error());
					
					
					$query = $link->query("UPDATE liste_rally SET act = 0 WHERE id_rally = '".$boucle."' ");
					
					$query = $link->query("DELETE FROM inscription_rally WHERE id_rally = '".$boucle."' ");
					
					
					
					}				
				echo '<meta http-equiv="refresh" content="0; url=index.php?page=lancer_classement">';
				}
			} while ($boucle <= $nbr_rally);
		}
	}
?>