<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
    <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/CSS/employe.css">
    <?php

    $bdd = include('config/db_connection.php');

   
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


    
    ?>

</head>

<body>

    <div class='search'>
        <input id="search" onchange="search()">
        <img>
    </div>

    <div class='list'>
        <?php foreach ($animaux as $row) {
           ?>

            <div class="animale">
                <img>
    <!--          debut   nome habitat  ... -->
                
    <div class="cardemploye m-auto border border-light border-5 mt-3 mb-5 mx-5 " id="cardTouslesAnimaux" style=" width:400px; ;height:595px;box-shadow:5px 5px 15px 15px  <?php echo $habitat_color ?>;">
            
            <img style="width:388px; max-height:13rem;margin:auto;" src="<?php echo $row['images_animal']  ?>" id="img_modal" class="card-img-top " alt="...">

            <div class="card-bodynomAnimaux">
                <h4 class="card-title">
                    <b class="text-light fs-5">
                        <?php
                        echo $row['nom_animal'];
                        ?>
                    </b>
                </h4>

            </div>       
                
   <!--          debut   nome habitat  ... -->
                <?php  if('veterinaire') {
                ?>
                
                    <button class="btn border-2 border-success btn-outline-light">ajouter l'etat de l'animal</button>
                    <button class="btn border-2 border-success btn-outline-light">etat ajouté</button>
                    <button class="btn border-2 border-success btn-outline-light">ajout des repas</button>
                <?php
                } 
                ?>
                <?php  if($role== 'employe') {
                ?>
                
                    <button>gestion commentaire</button>
                    <button>ajout de repas</button>
                <?php
                } else {
                ?>
                 <p>'je ne trouve rien'</p>
                 <?php }?>
            </div>

           <?php
        } 
        ?>
    </div>

    </div>

    <script>

        function search() {


        }
        
    </script>

</body>

</html>