<?php
    $config = include('config.php');

    try {
        $bdd = new PDO($config['dbConnectionString'], $config['dbUser'], $config['dbPassword']);
        // uncomment to see errors
        // $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getmessage());
    }
    
    return $bdd;
?>