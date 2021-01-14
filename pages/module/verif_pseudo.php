<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'rallygame';

$link = mysqli_connect ($host,$user,$pass,$db) or die ('Erreur : '.mysql_error());

$result = $link->query("SELECT username FROM compte WHERE username = '".$_GET["pseudo"]."' ");
if(mysqli_num_rows($result)>=1)
echo "1";
else
echo "2";
?>