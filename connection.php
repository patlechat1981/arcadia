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
if(!empty($_POST['pseudo']) && !empty($_POST['email'])/* &&!empty($_POST['role'])  */&& !empty($_POST['password']) ){

	// VARIABLES

	$pseudo     = $_POST['pseudo'];
	$email 		= $_POST['email'];
	/* $role 		= $_POST['role']; */
	$password 	= $_POST['password'];
	$error		= 1;

	// CRYPTER LE PASSWORD
	$password = "aq1".sha1($password."1254")."25";

	echo $password;

	$req = $bdd->prepare('SELECT * FROM useradmin WHERE pseudo = ? AND email = ? /* AND role = ?  */ ');
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
 <!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>connexion</title>
	<link rel="stylesheet" type="text/css" href="../assets/CSS/default.css">
</head>
<body>
	 <header>
		<h1>connectez-vous sur Zoo Arcardia</h1>
	</header>
 -->
	<!-- <div class="container">
		<p id="info">Bienvenue,si vous n'êtes pas inscrit, <a href="enregistrement_staff.php">inscrivez-vous.</a></p> -->
	 
		<?php
			/*   if(isset($_GET['error'])){
				echo'<p id="error">Nous ne pouvons pas vous authentifier.</p>';
			}
			else if(isset($_GET['success'])){
				echo '<p id="success"> Vous êtes maintenant connecté.</p>';
			}   */
		?>

	<!-- < <div id="form">
			<form method="POST" action="connection.php">
				<table>
				<tr>
						<td>Pseudo</td>
						<td><input type="text" name="pseudo" id="pseudo" placeholder="Inserer votre pseudo..." required></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" id="email" placeholder="Inserer votre email" required></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="password" placeholder="Inserer votre password required" ></td>
					</tr>
				</table>
				<p><label><input type="checkbox" name="connect" checked>Connexion automatique</label></p>
				<div id="button">
					<button type='submit'>Connexion</button>
				</div>
			</form>
		</div>
	</div>   -->
</body>
</html> 