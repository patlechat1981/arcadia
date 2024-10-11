<!-- debut Card -->

<main id="afficheAdminMembers" style="display: none; font-family:cursive; " class="mt-5 ">

  <?php
  /* ------------------cancellare operatore */

  if (isset($_POST['deleteOP'])) {
    $id = $_POST['id'];

    /*  $req = $sbdd->exec("DELETE FROM useradmin WHERE id = '$id' ") */
    $req = $bdd->prepare("DELETE FROM useradmin WHERE id = :id ");
    $req->execute(array('id' => $id));
  }
  /* ----------------------aggiungere operatore-------------------------- */

  if (
    isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['role'])
    && isset($_POST['password']) && isset($_POST['password_confirm']) && isset($_POST['images_operateur'])
  ) {

    // VARIABLE

    $pseudo       = $_POST['pseudo'];
    $email        = $_POST['email'];
    $role         = $_POST['role'];
    $password     = $_POST['password'];
    $pass_confirm = $_POST['password_confirm'];
    $images_operateur = $_POST['images_operateur'];
    // TEST SI PASSWORD = PASSWORD CONFIRM
    if ($password != $pass_confirm) {
      ?>
      <script><?php echo ("alert('le mot de passe doit etre egal!!')") ?></script>
    <?php
    }
    // TEST SI EMAIL UTILISE
    $req = $bdd->prepare("SELECT count(*) as numberEmail FROM useradmin WHERE email = ?");
    $req->execute(array($email));

    while ($email_verification = $req->fetch()) {
      if ($email_verification['numberEmail'] != 0) {
        ?>
          <script><?php echo ("alert('L\'indirizzo email \'".$email."\' esiste già.')") ?></script>
        <?php
      }
    }
    // CRYPTAGE DU PASSWORD
    $password = "aq1" . sha1($password . "1254") . "25";

    // ENVOI DE LA REQUETE
    $req = $bdd->prepare("INSERT INTO useradmin(pseudo, email, role, password,images_operateur) VALUES(?,?,?,?,?)");
    $value = $req->execute(array($pseudo, $email, $role, $password, $images_operateur));
  }

  $users = $bdd->query('SELECT * FROM `useradmin`');

  ?>
  <!-- <script><?php /* echo ("location.href='indexstaff.php?error=1&pass=1'") */ ?></script> -->
  <div id="form" class="text-light fst-bolt bg-info border border-3 border-light"
    style=" width:450px; margin-bottom: 80px;height:560px;">


    <?php if (!isset($_SESSION['connect'])) { ?>


      <?php

      if (isset($_GET['error'])) {

        if (isset($_GET['pass'])) {
          echo '<p id="error">Les mots de passe ne correspondent pas.</p>';
        } else if (isset($_GET['email'])) {
          echo '<p id="error">Cette adresse email est déjà utilisée.</p>';
        }
      }

      ?>
    <?php }  ?>



    <!-- debut enregistrement operateur -->

    <h3 class="mb-2 p-3 bg-primary">Enregistrer un nouvel operateur </h3>
    <form class="text-center mx-3 " method="POST" action="">
      <input type="hidden" name="id_for_insert" value="<?php $user['id'] ?>">
      <table>
        <tr class="mb-3">
          <td class="text-dark">Pseudo</td>
          <td><input class="mb-2" type="text" name="pseudo" placeholder="Ex : Patrice.." required></td>
        </tr><br>
        <tr>
          <td class="text-dark">Email</td><br>
          <td><input class="mb-2" type="email" name="email" placeholder="Ex : example@google.com" required></td>
        </tr>
        <tr>
          <td class="text-dark">Role</td><br>
          <td>
            <select class="mb-2" name="role" required>
              <option selected></option>
              <option>veterinaire</option>
              <option>employe</option>
              <option>administrateur</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="text-dark">Photo operateur</td><br>
          <td><input class="mb-2" type="text" name="images_operateur" placeholder="Ex : url" required></td>
        </tr>
        <tr>
          <td class="text-dark">Mot de passe</td><br>
          <td><input id="originalPassword" class="mb-2" type="password" name="password" placeholder="Ex : ********" required
          onkeyup="checkInputEquals(this, 'confirmPassword', 'insertButton')"></td>
        </tr>
        <tr>
          <td class="text-dark">Retaper mot de passe</td>
          <td><input id="confirmPassword" class="mb-2" type="password" name="password_confirm" placeholder="Ex : ********" required
          onkeyup="checkInputEquals(this, 'originalPassword', 'insertButton')"></td>
        </tr>


      </table><br><br>

      <button id="insertButton" type='submit' class=" border border-3 border-primary btn btn-oultine-success text-success">Inscription</button>

    </form><br><br>

    <!-- fin enregistrement operateur -->

    <!-- debut listes operateurs -->
    <div>
      <h3 class="p-3 bg-success">Listes des operateurs du Zoo</h3>
      <?php
      foreach ($users as $user) {
      ?>
        <div style=" border: 3px solid white; margin-bottom: 10px; width:350px;height:460px;" class=" bg-success mx-2">

          <form method="POST" action="">




            <img style="width:300px;height:200px; " class="mt-3" src="<?php echo $user['images_operateur']; ?>" alt="">

            <p class="mb-2 mt-1 text-warning"> <span class="fw-bold text-light">Pseudo :</span><?php echo ' ' . $user['pseudo']; ?></p>
            <p class="mb-2 text-warning"> <span class="fw-bold text-light">Role :</span><?php echo ' ' . $user['role']; ?></p>
            <p class="mb-2 text-warning"><span class="fw-bold text-light">Email :</span><?php echo ' ' . $user['email']; ?></p>
            <p class="mb-2 text-warning"><span class="fw-bold text-light">
                vous pouvez utiliser cette ID pour supprimer cette operateur : </span><?php echo ' ' . $user['id']; ?></p>

            <input type="number" name="id" min="0" onkeyup="checkId(this, <?php echo $user['id']; ?>)">
            <button
              id="delete_submit_<?php echo $user['id']; ?>"
              type="submit" 
              disabled
              name="deleteOP" 
              class="mb-5 mt-2 btn border border-2 bg-warning border-warning" 
            >
              Supprimer ...
            </button>

          </form>

          <!-- debut listes operateurs -->

        </div>
      <?php
      }
      ?>
    </div>
</main>




<!--  /*   error_reporting(E_ALL);
    ini_set("diasplay_errors",1); */

 /*    set_error_handler("var_dump"); */ -->

<!--   
 if($req)
  {    
      echo 'Operateur bien supprimé !!!';
  }
  else
  {     
    echo ' un probleme est survenu !!!';
  }   -->