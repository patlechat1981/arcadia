<?php


session_start();

/* require("connect_db.php"); */
$bdd = include('db_connection.php'); 

if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['role']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {

	// VARIABLE

	$pseudo       = $_POST['pseudo'];
	$email        = $_POST['email'];
    $role       = $_POST['role'];
	$password     = $_POST['password'];
	$pass_confirm = $_POST['password_confirm'];

	// TEST SI PASSWORD = PASSWORD CONFIRM

	if ($password != $pass_confirm) {
		header('Location: enregistrement_staff.php?error=1&pass=1');
		exit();
	}

	// TEST SI EMAIL UTILISE
	$req = $bdd->prepare("SELECT count(*) as numberEmail FROM useradmin WHERE email = ?");
	$req->execute(array($email));

	while ($email_verification = $req->fetch()) {
		if ($email_verification['numberEmail'] != 0) {
			header('location: enregistrement_staff.php?error=1&email=1');

			exit();
		}
	}

	// HASH
	$secret = sha1($email) . time();
	$secret = sha1($secret) . time() . time();

	// CRYPTAGE DU PASSWORD
	$password = "aq1" . sha1($password . "1254") . "25";

	// ENVOI DE LA REQUETE
	$requete = $bdd->query('SELECT * FROM useradmin');
	$req = $bdd->prepare("INSERT INTO useradmin(pseudo, email,role, password, secret) VALUES(?,?,?,?,?)");
	$value = $req->execute(array($pseudo, $email,$role, $password, $secret));

	header('location:   enregistrement_staff.php?success=1');
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PHP et MySQL : la formation ULTIME</title>
	<!-- 	<link rel="icon" type="image/png" href="/logo.png"> -->
	<link rel="stylesheet" type="text/css" href="../assets/CSS/default.css">
	<link rel="stylesheet" href="../assets/CSS/bootstrap.min.css">
</head>

<body style="background-image: url(../assets/IMAGES/images_habitats/habitat_savane/la_savane_Arborée.png);">
	<header>
		<h1 class="text-center">zoo Arcadia</h1>
	</header>

	<div class="container">

		<?php
		if (!isset($_SESSION['connect'])) { ?>

			<!-- <p class="text-center" id="info">Reserver au Staff du Zoo Arcadia, inscrivez-vous.<br> Sinon, <a href="./config/indexstaff.php">Connectez-vous.</a></p>
 -->

			<?php

			if (isset($_GET['error'])) {

				if (isset($_GET['pass'])) {
					echo '<p id="error">Les mots de passe ne correspondent pas.</p>';
				} else if (isset($_GET['email'])) {
					echo '<p id="error">Cette adresse email est déjà utilisée.</p>';
				}
			} else if (isset($_GET['success'])) {
				echo '<p id="success">Inscription prise correctement en compte.</p>';
				echo '<a href="/ZOOARCARDIA2/indexstaff.php" >Vous pouvez a present vous Connectez.</a>';
			}

			?>

			<div id="form" class="text-light fst-bolt">
				<form class="text-center" method="POST" action="enregistrement_staff.php">
					<table>
						<tr class="mb-3">
							<td class="">Pseudo</td>
							<td><input class="mx-2" type="text" name="pseudo" placeholder="Ex : Nicolas" required></td>
						</tr><br>
						<tr>
							<td>Email</td><br>
							<td><input class="mx-2" type="email" name="email" placeholder="Ex : example@google.com" required></td>
						</tr>
						<tr>
							<td>Role</td><br>
							<td><input class="mx-2" type="text" name="role" placeholder="Ex : veterinaire" required></td>
						</tr>
						<tr>
							<td>Mot de passe</td><br>
							<td><input class="mx-2" type="password" name="password" placeholder="Ex : ********" required></td>
						</tr>
						<tr>
							<td>Retaper mot de passe</td>
							<td><input class="mx-2" type="password" name="password_confirm" placeholder="Ex : ********" required></td>
						</tr>
					</table><br><br>
					<div id="button" class="text-center">
						<button type='submit' class=" border border-3 border-info btn btn-oultine-success text-light">Inscription</button>
					</div>
				</form><br><br>
				<P>Retourner a la page  <a href="/ZOOARCARDIA2/indexstaff.php" class=" nav-link text-info mx-5 ">Accueil</a> </P>
			</div>

		<?php } else { ?>

			<p id="info">
				Bonjour <?php $pseudo ?><br>
				<a href="disconnection.php">Déconnexion</a>
			</p>

		<?php } ?>

	</div>
	<?php include('templates/veterinaire_animaux.php'); ?>
</body>

</html>