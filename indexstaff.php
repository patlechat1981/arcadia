<?php

$bdd = include('config/db_connection.php');
$config = include('config/config.php');
/* ce user sert a verifier si l oprateur est logger */
$user = include('config/user.php');

$requette = $bdd->query('SELECT * FROM useradmin');


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



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
    <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/CSS/employe.css">

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

                            if ($user['role'] == 'administrateur') {

                            ?>
                                <li class="nav-item dropdown  mx-4">

                                    <a class="nav-link dropdown-toggle btn btn-outline-success border border-1 border-success" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Espace Administrateur
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="mx-2 ">
                                            <!--  <input type="text" name="page" value="adminServices"> -->
                                            <a class="btn  text-light bg-info  border border-2 border-primary dropdown-item text-success "
                                                onclick="administrateurService()">
                                                Services administrateur
                                            </a>
                                        </li><br>
                                        <li class="mx-2">
                                            <!-- <input type="text" name="page" value=""> -->
                                            <a  class="text-light bg-success border border-2 border-warning dropdown-item text-success" 
                                                onclick="administrateurMembers()">
                                                Management membres
                                            </a>
                                        </li>
                                </li>
                    </ul>

                    </li>
                <?php

                            } else if ($user['role'] == 'employe') {

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
                                <a class="btn  text-dark  bg-info  border border-2 border-dark dropdown-item text-success "
                                    onclick="employeLesAnimaux()" id="employeLeServices">
                                    Gestion aninmaux
                                </a>
                            </li><br>
                            <li class="mx-2">
                                <!--   <input type="text" name="page" value="employeLeServices"> -->
                                <a class="btn text-dark bg-success border border-2 border-danger dropdown-item text-success"
                                    onclick="employeLeServices()" id="employeLeServices">
                                    Gestion services
                                </a>
                            </li><br>






                        </ul>
                    </li>

                <?php

                            } else if ($user['role'] == 'veterinaire') {

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
                                    Sante et Habitats des animaux
                                </a>
                            </li><br>
                            <li class="mx-2">
                                <!-- <input type="text" name="page" value="veterinaireHabitats"> -->
                                <a class=" btn text-dark bg-info border border-2 border-danger dropdown-item text-success" onclick="veterinaireHabitats()" id="veterinaireHabitats">
                                    ajouter un Animal
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
                <div class="container" style="font-family: cursive;"   >

                    <?php
                    if (!isset($_SESSION['connect'])) { ?>


                    <?php

                        if (isset($_GET['success'])) {
                       
                            echo '<h4 class= text-info ; > Bonjour ' . $user['pseudo'] . '</h4>' . '"' . $user['role'] . '"';
                            echo '<p id="success" class="text-success"> Vous êtes maintenant connecté.</p>';
                        }
                    }
                    ?>

                </div>


                <p id="info" >

                    <a href="config/disconnection.php" class="  text-danger border border-2 btn btn-outline-light rounded text-decoration-none p-1">Déconnexion</a>
                </p>
            </div><br><br>

            <!--fin de ma navbar-->
            <!-- Carousel wrapper -->

        </nav>
        <!-- Inner -->




        <div id="info" class=" main carousel-inner" 
        style="background-image: url(https://www.glmv.com/wp-content/uploads/2022/06/Living-Desert-Rhinos-Savanna-scaled.jpg); height:750px;text-align:center; ">
            <?php


            if ($user['role'] == 'employe') {
                include('templates/employe_animaux.php');
                include('templates/employe_services.php');
            } elseif ($user['role'] == 'administrateur') {

                include('templates/admin_serviceSites.php');
                include('templates/admin_members.php'); 
                /* toues les pages sont uniquement ouvertes par la pages indexstaff et meme si un malintentionné copie le link du super admin 
                et le colle il ne pourra pa s l utiliser et la verifocation de indexstaff est necessaire pour ouvrir la page */
            } elseif ($user['role'] == 'veterinaire') {

                include('templates/veterinaire_animaux.php');
                include('templates/veterinaire_ajouts.php');
            }
            ?>

        </div>




        <br>

        <!--DEBUT DU FOOTER-->

        <div class="container-fluid " style="background-color: rgb(238, 236, 234); "><img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="font-size: 25px; "></div>

        <?php
        include('templates/footer.php');
        include('templates/scripts.php');
        ?>


        <script src="./templates/administration.js"></script>

</body>

</html>