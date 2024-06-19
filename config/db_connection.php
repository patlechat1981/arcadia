<?php
    $config = include('config.php');

    try {
        $bdd = new PDO($config['dbConnectionString'], $config['dbUser'], $config['dbPassword']);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getmessage());
    }
    
    return $bdd;
?>