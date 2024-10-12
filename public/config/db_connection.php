<?php
    $config = include('config.php');

    try {
        $bdd = new PDO($config['dbConnectionString'], $config['dbUser'], $config['dbPassword']);
        $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getmessage());
    }
    
    return $bdd;
?>