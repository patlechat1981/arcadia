<?php
session_start();

//if(isset($_SESSION['connect'])){
//	header('location: indexstaff.php');
//	exit();
//}

$config = include('config/config.php');
$bdd = include('config/db_connection.php');

// CONNEXION
if(!empty($_POST['pseudo']) && !empty($_POST['email'])  && !empty($_POST['password']) ){

	$pseudo     = $_POST['pseudo'];
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$error		= 1;

	// CRYPTER LE PASSWORD
	$password = "aq1".sha1($password."1254")."25";

	$req = $bdd->prepare('SELECT * FROM useradmin WHERE pseudo = ? AND email = ?');
	$req->execute(array($pseudo,$email,));

	while($user = $req->fetch()){

		if($password == $user['password']){
			$error = 0;
			$_SESSION['connect'] = 1;
			$_SESSION['pseudo']	 = $user['pseudo'];
			
			if(isset($_POST['connect'])) {
				$semaine = time() + 60 * 60 * 24 * 7;
				ob_start();
				//$token = "mpp7XvBaEvfOp44UMfx6AUc=";
				$token = openssl_encrypt($email, 'aes-256-ctr', $config['secret']);

				setcookie('token', ''.$token, $semaine); 
			}
			
			header('Location: indexstaff.php?success=1');
			ob_end_flush();
			exit();
		}

	}

	if($error == 1){
		header('Location: index.php?error=1');
		exit();
	}

}

?>
 
</body>
</html> 