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
    /* 
$bdd2 =include('config/connect_db.php'); */
    $bdd = include('config/db_connection.php');
    $config = include('config/config.php');

    $requette = $bdd->query('SELECT * FROM useradmin');
    $requete = $bdd->query('SELECT * FROM tous_les_animaux');
    $service = $bdd->query('SELECT * FROM service_zoo');
    $habitats = $bdd->query('SELECT * FROM zoohabitats');

    $requete = $bdd->query('SELECT * FROM avis');


    $token = $_COOKIE['token'];
    $email = openssl_decrypt($token, 'aes-256-ctr', $config['secret']);

    $requete = $bdd->prepare('SELECT * FROM useradmin WHERE email = ? limit 1');
    $requete->execute(array($email));

    $user = $requete->fetchAll()[0];


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

    <header class="text-center mx-0">

        <img src="./assets/IMAGES/images animaux/suspension-bridge-959853_1280 (1).jpg" class="img_head" style="width: 100%;height: 100px; " alt="logo" />
        <!--ceci est ma navbar-->
        <nav class="navbar navbar-expand-lg navbar-light  couleur_nav ">
            <div class="container-fluid">

                <a class="navbar-brand bg-light" href="">
                    <p class="text-success mt-3 " style="font-family: 'Times New Roman', Times, serif;"> <img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="height: 50px ; width: 120px;font-size:smaller;">
                </a><br>ZOO ARCADIA</p>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse link_navbar " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">

                        <!-- debut form******************************************* -->

                        <form action="" style="display: flex;">
                        <?php  
                        
                            if($user['role'] == 'administrateur') {
                        
                        ?>
                            <li class="nav-item dropdown  mx-4">

                                <a class="nav-link dropdown-toggle btn btn-outline-success border border-1 border-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Espace Administrateur
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    /* foreach ($service as $serv) { */
                                    ?>
                                    <!--  <li>
                                        <a class="dropdown-item text-warning" href="/ZOOARCARDIA2/spectacle.php?id=<?php echo $serv['id_service']; ?>">
                               //             <?php /* echo $serv['nom_service'] */ ?></a>
                                    </li> -->
                                    <?php
                                    /*  } */
                                    ?>
                                    <li class="mx-2 ">
                                       <!--  <input type="text" name="page" value="adminServices"> -->
                                        <a class="btn  text-light bg-info  border border-2 border-primary dropdown-item text-success " onclick="adminServices()" id="adminServices">
                                            services administrateur
                                        </a>
                                    </li><br>
                                    <li class="mx-2">
                                        <!-- <input type="text" name="page" value=""> -->
                                        <a class="text-light bg-success border border-2 border-warning dropdown-item text-success" href="./config/enregistrement_staff.php">
                                            Enregistrement nouveaux menbres
                                        </a>
                                    </li><br>
                                    <li class="mx-2">
                                      <!--   <input type="text" name="page" value=""> -->
                                        <a class="text-light bg-warning border border-2 border-dark dropdown-item text-success" href="/ZOOARCARDIA2/spectacle.php">
                                            Ajouts d'un Animal
                                        </a>
                                    </li>
                            </li>
                    </ul>

                    </li>
<?php  
                        
                }
                else if ($user['role'] == 'employe') {
                        
                        ?>


                    <li class="nav-item dropdown mx-3  ">
                        <a class=" nav-link dropdown-toggle btn btn-outline-warning border border-1 border-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Espace Employé
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            /* foreach ($habitats as $habitat) { */
                            ?>
                            <!--   <li>
                                    <a class="dropdown-item" style="color: <?php echo $habitat['color'] ?>" href="/ZOOARCARDIA2/touslesanimaux?id=<?php echo $habitat['id_habitat']; ?>">
                                        <?php echo $habitat['nom_habitat'] ?>
                                    </a>
                                </li> -->
                            <?php   /* } */ ?>

                            <li class="mx-2 ">
                               <!--  <input type="text" name="page" value="employeLesAnimaux"> -->
                                <a class="btn  text-dark  bg-info  border border-2 border-dark dropdown-item text-success " onclick="employeLesAnimaux()" id="employeLesAnimaux">
                                    Gestion aninmaux
                                </a>
                            </li><br>
                            <li class="mx-2">
                              <!--   <input type="text" name="page" value="employeLeServices"> -->
                                <a class="btn text-dark bg-success border border-2 border-danger dropdown-item text-success" onclick="employeLeServices()" id="employeLeServices">
                                    Gestion Habitat
                                </a>
                            </li><br>






                        </ul>
                    </li>

                    <?php  
                        
                }
                else if ($user['role'] == 'veterinaire') {
                        
                        ?>

                    <li class="nav-item dropdown mx-3  ">
                        <a class=" nav-link dropdown-toggle btn btn-outline-warning border border-1 border-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Espace Veterinaire
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            /*  foreach ($habitats as $habitat) { */
                            ?>
                            <!--  <li>
                                    <a class="dropdown-item" style="color: <?php echo $habitat['color'] ?>" href="/ZOOARCARDIA2/touslesanimaux?id=<?php echo $habitat['id_habitat']; ?>">
                                        <?php /* echo $habitat['nom_habitat'] */ ?>
                                    </a>
                                </li> -->
                            <?php /*   }  */ ?>

                            <!--  <li class="mx-2 ">
                                <a class="  text-dark  bg-danger  border border-2 border-dark dropdown-item text-success " href=""   >
                                    Gestions commentaires.
                                </a>
                            </li><br> -->
                            <li class="mx-2">
                                <!-- <input type="text" name="page" value="veterinaireAnimaux"> -->
                                <a class=" btn text-dark bg-success border border-2 border-danger dropdown-item text-success" onclick="veterinaireAnimaux()" id="veterinaireAnimaux">
                                    soins Animaux
                                </a>
                            </li><br>
                            <li class="mx-2">
                                <!-- <input type="text" name="page" value="veterinaireHabitats"> -->
                                <a class=" btn text-dark bg-info border border-2 border-danger dropdown-item text-success" onclick="veterinaireHabitats()" id="veterinaireHabitats">
                                    Gestions habitats
                                </a>
                            </li><br>


                        </ul>
                    </li>
                    <?php  
                        
                    }
                 
                    ?>

                    </form>

                    <!-- fin debut form******************************************* -->



                    </ul>


                </div>
                <div class="container">

                    <?php
                    if (!isset($_SESSION['connect'])) { ?>


                    <?php

                        if (isset($_GET['error'])) {
                            echo '<p id="error">Nous ne pouvons pas vous authentifier.</p>';
                        } else if (isset($_GET['success'])) {




                            echo '<h2 class="display-5 text-warning fst-bolder">Bonjour </h2>';
                            echo '<p id="success" class="text-success"> Vous êtes maintenant connecté.</p>';
                        }
                    }
                    ?>

                </div>


                <p id="info">

                    <a href="config/disconnection.php" class="  text-danger border border-2 btn btn-outline-light rounded text-decoration-none p-1">Déconnexion</a>
                </p>
            </div>
            <!--fin de ma navbar-->
            <!-- Carousel wrapper -->
            
            
        </nav>
        <!-- Inner -->
        <div class=" main carousel-inner" style="background-image: url(https://www.glmv.com/wp-content/uploads/2022/06/Living-Desert-Rhinos-Savanna-scaled.jpg); height:750px;text-align:center ">
           <?php

            echo $user['pseudo'];
            echo $user['email'];
            echo $user['role'];
            
            include('templates/animaux_employe.php');
            include('templates/admin_serviceSites.php');
            include('templates/services_employe.php');
            include('templates/veterinaire_animaux.php');
         
            ?>
            
        </div>
<?php

   include('templates/veterinaire_habitats.php'); 
?>
    


                <br>

                <!--DEBUT DU FOOTER-->

                <div class="container-fluid " style="background-color: rgb(238, 236, 234); "><img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="font-size: 25px; "></div>

                <?php
                include('templates/footer.php');
                include('templates/scripts.php');
                ?>
                <script src="./templates/employe.js"></script>
</body>

</html>