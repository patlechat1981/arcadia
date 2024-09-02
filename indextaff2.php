<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
    <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">
    <?php

    $bdd = include('config/db_connection.php');
    
     /******************************************* * requete general ************************************/



     $requete = $bdd->query('SELECT * FROM tous_les_animaux');
   
     $service = $bdd->query('SELECT * FROM service_zoo');
     $habitats = $bdd->query('SELECT * FROM zoohabitats');
 
    
 
     $requette = $bdd->query('SELECT * FROM useradmin');
     if (
         isset($_POST['role']) && isset($_POST['pseudo'])
     ) {
         
         $pseudo = $_POST['pseudo'];
         $employe = $_POST['useradmin'];
     
 
         $requete = $bdd->prepare('INSERT INTO useradmin(pseudo,employe)VALUES(?,?) ') or die(print_r($bdd->errorInfo()));
         $requete->execute(array($pseudo, $employe));}
     
 
   
 
     $requete = $bdd->query('SELECT * FROM avis');
 
     if (
         isset($_POST['nickname']) && isset($_POST['commentaire'])
     ) {
         
         $nick = $_POST['nickname'];
         $com = $_POST['commentaire'];
         $animal = $_POST['id_animal'];
 
         $requete = $bdd->prepare('INSERT INTO avis(visiteur_nickname,avis_commentaire,id_animal)VALUES(?,?,?) ') or die(print_r($bdd->errorInfo()));
         $requete->execute(array($nick, $com, $animal));
 
         if (empty($_GET['id'])) {
             header('Location: ' . $_SERVER['SCRIPT_NAME']);
         } else {
             header('Location: ' . $_SERVER['SCRIPT_NAME'] .  "?id=" . $_GET['id']);
         }
         die();
     }
 
 
 
     $habitat_color = 'gray';
     $useradmin = $bdd->query('SELECT * FROM useradmin');
     $habitats = $bdd->query('SELECT * FROM zoohabitats');
     $queryString = '';
 
     if (empty($_GET['id'])) {
         $animaux = $bdd->query('SELECT * FROM `tous_les_animaux` as anim inner JOIN zoohabitats as zoo on zoo.id_habitat = anim.id_habitat');
     } else {
         $queryString = "?id=" . $_GET["id"];
         $id_habitat = intval($_GET["id"]);
 
         $requete = $bdd->prepare('SELECT * FROM `tous_les_animaux` as anim inner JOIN zoohabitats as zoo on zoo.id_habitat = anim.id_habitat WHERE zoo.id_habitat = :id_habitat');
         $requete->bindParam(':id_habitat', $id_habitat, PDO::PARAM_INT);
         $requete->execute();
 
         $animaux = $requete->fetchAll();
         $image_habitat = $animaux[0]['images_habitat'];
         $habitat_color = $animaux[0]['color'];
     }
 
     $commentaires = $bdd->query('SELECT * FROM `avis`')->fetchAll();




   

     /********************************************************fin requete general********************************************* */

    ?>

</head>

<body>

    <div class="menu">
        <?php
         if($useradmin -> role == 'veterinaire') {
            ?>
                <form>
                    <input type='hidden' name='page' value='animali'>
                    <button type='submit'>animali</button>
                </form>
                
                <form>
                    <input type='hidden' name='page' value='habitat'>
                    <button type='submit'>habitat</button>
                </form>
            <?php
         }  else if  ('employe'){
            ?>
               <form>
                    <input type='hidden' name='page' value='animali'>
                    <button type='submit'>animali</button>
                </form>
                
                <form>
                    <input type='hidden' name='page' value='servizi'>
                    <button type='submit'>servizi</button>
                </form>
            <?php
         }
         else if($useradmin->role=='administrateur'){
            ?>
               <form>
                    <input type='hidden' name='page' value='utenti'>
                    <button type='submit'>utenti</button>
                </form>
                
                <form>
                    <input type='hidden' name='page' value='info'>
                    <button type='submit'>modifica testi sito</button>
                </form>
            <?php
         }
        ?>
    </div>

    <div class="main">
        <?php if(page == 'animali') {
            include('admin_animali.php');
        }
        ?>

        <?php if(page == 'habitat') {
            include('templates/admin/admin_habitat.php');
        }
        ?>

        <?php if(page == 'servizi') {
            include('templates/admin/admin_servizi.php');
        }
        ?>

        <?php if(page == 'utenti') {
            include('templates/admin/admin_utenti.php');
        }
        ?>

        <?php if(page == 'info') {
            include('templates/admin/admin_info.php');
        }
        ?>

    </div>
   
</body>

</html>