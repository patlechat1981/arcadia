<?php
session_start();

if(isset($_SESSION['connect'])){
	header('location: index.php');
	exit();
}

/* require("./config/connect_db.php"); */
$config = include('config.php');
$bdd = include('config/db_connection.php');
// CONNEXION
/* $requete = $bdd->query('SELECT * FROM users '); */
if(!empty($_POST['pseudo']) && !empty($_POST['email']) /* && !empty($_POST['role']) */  && !empty($_POST['password']) ){

	// VARIABLES

	$pseudo     = $_POST['pseudo'];
	$email 		= $_POST['email'];
	/*  $role 		= $_POST['role'];  */
	$password 	= $_POST['password'];
	$error		= 1;

	// CRYPTER LE PASSWORD
	$password = "aq1".sha1($password."1254")."25";

	echo $password;

	$req = $bdd->prepare('SELECT * FROM useradmin WHERE pseudo = ? AND email = ?  /* AND role = ?  */  ');
	$req->execute(array($pseudo,$email,/* $role */));

	while($user = $req->fetch()){

		if($password == $user['password']){
			$error = 0;
			$_SESSION['connect'] = 1;
			$_SESSION['pseudo']	 = $user['pseudo'];

			if(isset($_POST['connect'])) {
				$token = openssl_encrypt($email, 'aes-256-ctr', $config['secret']);
				$semaine = time() + 60 * 60 * 24 * 7;
				setcookie('token', $token, $semaine, true); 
			}

			header('location: indexstaff.php?success=1');
			exit();
		}

	}

	if($error == 1){
		header('location: index.php?error=1');
		exit();
	}

}

?>
 
</body>
</html> 