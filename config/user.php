<?php 
    /* ritorna utente che hq fatto il login */
    
    $token = $_COOKIE['token'];
    $email = openssl_decrypt($token, 'aes-256-ctr', $config['secret']);

    $requete = $bdd->prepare('SELECT * FROM useradmin WHERE email = ? limit 1');
    $requete->execute(array($email));

    $user = $requete->fetchAll()[0];

    return $user;
?>