<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
    //besoin de hote come Localhost -sql mon serveur
//nom de la base : formations Zoo_arcadia
//login :root
//MDP : root




//CONNExION
try{
$bdd = new PDO('mysql:host=localhost;dbname=Zoo_arcadia;charset=utf8','root','');}
catch(Exception $e){die('Erreur : '.$e->getmessage());}

//faire une requette et lire des donnees

$i='';
$requete =$bdd->query('SELECT * FROM animaux');
 while ($donnees = $requete->fetch()) {
 	echo $donnees['id-Animaux'];
 	echo $donnees['nom-A'];
 	echo $i.'<br/>';
 }
?>
</body>
</html>