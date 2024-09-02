<?php
	//$db = new PDO('mysql:host=localhost;dbname=formation_members;charset=utf8','root', '');

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=formation_members;charset=utf8', 'root', '');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Erreur : " . $e->getMessage();
	}

?>