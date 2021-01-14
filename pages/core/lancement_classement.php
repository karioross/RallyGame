<?php
$boucle = '';
$place = '';
$nbr = mysqli_fetch_array($link->query('SELECT COUNT(*) AS nbr_rally FROM liste_rally '));
$nbr_rally = $nbr['nbr_rally'];
if($nbr_rally >= 1)
	{
	$sql = $link->query('SELECT * FROM grille WHERE classement = "off" ');
	while($data = mysqli_fetch_assoc($sql))
		{
		do
			{
			$place = '';
			$boucle++;
			$result = $link->query('SELECT * FROM grille WHERE id_rally = '.$boucle.' AND classement = "off" ORDER BY pts_total DESC');
			while($data = mysqli_fetch_assoc($result))
				{
				$place++;
				$afr = mysqli_fetch_array($link->query('SELECT * FROM liste_rally WHERE id_rally = '.$boucle.' '));
				$recompense_base = $afr['recompense'];				
				if($place == '1')
					{
					$recompense = $recompense_base;
					$pos = mysqli_fetch_array($link->query("SELECT COUNT(*) AS valide_compte FROM position_general WHERE id_compte = '".$data['id_compte']."' "));
					if($pos['valide_compte'] == '1')
						{
						$gr = mysqli_fetch_array($link->query('SELECT * FROM position_general WHERE id_compte = '.$data['id_compte'].' '));
						$position_general = ($gr['nbr_gagné'] + 1);
						$tr = $link->query("UPDATE position_general SET nbr_gagné = '".$position_general."' WHERE id_compte = '".$data['id_compte']."' ");
						}else{
						$position_general = '1';
						$tr = $link->query("INSERT INTO position_general (id_compte, nbr_gagné) VALUES ('".$data['id_compte']."', '".$position_general."')");
						}
					}
				if($place == '2'){$recompense = ($recompense_base / 1.2);$recompense = number_format($recompense,0);}
				if($place == '3'){$recompense = ($recompense_base / 1.5);$recompense = number_format($recompense,0);}
				if($place == '4'){$recompense = ($recompense_base / 5);$recompense = number_format($recompense,0);}
				if($place >= '5' AND $place <= '8'){$recompense = ($recompense_base / 10);$recompense = number_format($recompense,0);}
				if($place >= '9'){$recompense = '0';}
				$query = $link->query("UPDATE grille SET classement = 'on' WHERE id_rally = '".$boucle."' ");				
				$a = $link->query("INSERT INTO classement (place, id_compte, id_rally, pts_total, recompense) VALUES ('".$place."', '".$data['id_compte']."', '".$data['id_rally']."', '".$data['pts_total']."', '".$recompense."')");
				echo '<meta http-equiv="refresh" content="5; url=index.php?page=ma_voiture">';
				}
			}while ($boucle <= $nbr_rally);
		}
	echo '<meta http-equiv="refresh" content="5; url=index.php?page=ma_voiture">';
	}	
?>