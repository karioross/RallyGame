<?php
$nbr_sponsor = mt_rand(3, 10);
$date = date("dmY");
$li = '0';
if($nbr_sponsor > '0')
	{
	$query = $link->query("DELETE FROM liste_achat_sponsor WHERE id_compte = '".$_SESSION['id']."' "); 
	do
		{
		$chance = mt_rand(1, 100);
		if($chance == '100')
			{
			$chance_10 = mt_rand(1, 10);
			if($chance_10 == '10')
				{
				$sponsor = '20';
				$retour = $link->query('SELECT COUNT(*) AS val_spons FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' AND id_sponsor = '.$sponsor.' ');
				$donnees = mysqli_fetch_array($retour);
				if($donnees['val_spons'] == '0')
					{
					$q = 'INSERT INTO liste_achat_sponsor VALUES("'.$_SESSION['id'].'" , "'.$sponsor.'" , "'.$date.'" , 0)';
					$link->query($q) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
					}
				}
			}else if($chance >= '1' AND $chance <= '25'){
			$chance_10 = mt_rand(1, 20);
			if($chance_10 >= '19')
				{
				$sponsor = mt_rand(1, 19);
				$retour = $link->query('SELECT COUNT(*) AS val_spons FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' AND id_sponsor = '.$sponsor.' ');
				$donnees = mysqli_fetch_array($retour);
				if($donnees['val_spons'] == '0')
					{
					$q = 'INSERT INTO liste_achat_sponsor VALUES("'.$_SESSION['id'].'" , "'.$sponsor.'" , "'.$date.'" , 0)';
					$link->query($q) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
					}
				}
			}else if($chance >= '26' AND $chance <= '50'){
			$chance_10 = mt_rand(1, 20);
			if($chance_10 >= '18')
				{
				$sponsor = mt_rand(1, 19);
				$retour = $link->query('SELECT COUNT(*) AS val_spons FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' AND id_sponsor = '.$sponsor.' ');
				$donnees = mysqli_fetch_array($retour);
				if($donnees['val_spons'] == '0')
					{
					$q = 'INSERT INTO liste_achat_sponsor VALUES("'.$_SESSION['id'].'" , "'.$sponsor.'" , "'.$date.'" , 0)';
					$link->query($q) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
					}
				}
			}else if($chance >= '51' AND $chance <= '75'){
			$chance_10 = mt_rand(1, 20);
			if($chance_10 >= '17')
				{
				$sponsor = mt_rand(1, 19);
				$retour = $link->query('SELECT COUNT(*) AS val_spons FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' AND id_sponsor = '.$sponsor.' ');
				$donnees = mysqli_fetch_array($retour);
				if($donnees['val_spons'] == '0')
					{
					$q = 'INSERT INTO liste_achat_sponsor VALUES("'.$_SESSION['id'].'" , "'.$sponsor.'" , "'.$date.'" , 0)';
					$link->query($q) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
					}
				}
			}else if($chance >= '76' AND $chance <= '99'){
			$chance_10 = mt_rand(1, 20);
			if($chance_10 >= '16')
				{
				$sponsor = mt_rand(1, 19);
				$retour = $link->query('SELECT COUNT(*) AS val_spons FROM liste_achat_sponsor WHERE id_compte = '.$_SESSION['id'].' AND id_sponsor = '.$sponsor.' ');
				$donnees = mysqli_fetch_array($retour);
				if($donnees['val_spons'] == '0')
					{
					$q = 'INSERT INTO liste_achat_sponsor VALUES("'.$_SESSION['id'].'" , "'.$sponsor.'" , "'.$date.'" , 0)';
					$link->query($q) or die('Erreur SQL !'.$q.'<br />'.mysql_error());
					}
				}
			}
		$li++;
		}while($li < $nbr_sponsor);
	}
?>