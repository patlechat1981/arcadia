<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous_les_animaux</title>
      <link rel="stylesheet" href="./assets/CSS/style.css"> 
    <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">

    <?php

    $bdd = include('config/db_connection.php');

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


    $image_habitat = 'https://cdn.pixabay.com/photo/2019/09/17/20/47/prague-4484517_1280.jpg'; 
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

    <header class="text-center mx-0 postion:fixed" style="background-image: url(<?php echo $image_habitat ?>) ; ">
        <!-- <img src="./assets/IMAGES/images animaux/suspension-bridge-959853_1280 (1).jpg" class="img_head "
             style="width: 100%;height: 100px; " alt="logo" /> -->
        <!--ceci est ma navbar-->
        <nav class="navbar navbar-expand-lg navbar-light  couleur_nav m-0  " style="background-color: rgba(252, 252, 243, 0.911);font-family: cursive;">
            <div class="container-fluid ">

                <a class="navbar-brand bg-light" href="">
                    <p class="text-success mt-3 " style="font-family: 'Times New Roman', Times, serif;"> <img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="height: 50px ; width: 120px;font-size:smaller;">
                </a><br>ZOO ARCADIA</p>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse link_navbar " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                        <li style="margin-left: 90px;">
                            <a href="/ZOOARCARDIA2/index.php" class=" nav-link text-info mx-5 fw-bold ">Accueil</a>
                        </li>
                        <li class="nav-item dropdown  mx-4">
                            <a class=" fw-bold nav-link dropdown-toggle btn btn-outline-success border border-1 border-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-warning" href="/ZOOARCARDIA2/spectacle.php?id=1"> les Maitres des Airs</a></li>
                                <li><a class="dropdown-item text-warning" href="/ZOOARCARDIA2/spectacle.php?id=1"> les Acivités Ludiques pour enfants</a></li>



                        </li>

                    </ul>
                    </li>

                    <li>
                        <a href="/ZOOARCARDIA2/PAGES/contact" class="text-primary nav-link mx-4 fw-bold ">Contactez-nous</a>
                    </li>

                    <li class="nav-item dropdown mx-3  ">
                        <a class=" nav-link dropdown-toggle btn btn-outline-warning border border-1 border-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nos animaux
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($habitats as $habitat) {
                            ?>
                                <li>
                                    <a class="dropdown-item" style="color: <?php echo $habitat['color'] ?>" href="/ZOOARCARDIA2/touslesanimaux?id=<?php echo $habitat['id_habitat']; ?>">
                                        <?php echo $habitat['nom_habitat'] ?>
                                    </a>
                                </li>
                            <?php   } ?>


                        </ul>
                    </li>





                </div>

            </div>
        </nav>









        <!-- fin de la barre ecrit Animaux du mois -->
        <section class="section_main" style="font-family: cursive;display:flex;flex-direction: row;flex-wrap: wrap;">
            <?php
            foreach ($animaux as $row) {
            ?>

                <!--debut des cards 1-->

                <div class="card m-auto border border-light border-5 mt-5 mx-5 " id="card_card" style="min-width: 30rem;height:1020px;box-shadow:5px 5px 14px 14px <?php echo $habitat_color ?>;">
                    <img style="width:; max-height:17rem;margin:auto;" src="<?php echo $row['images_animal']  ?>" id="img_modal" class="card-img-top " alt="...">

                    <div class="card-body " id="card_body" style="border: 2px solid rgb(134, 241, 157); background: -webkit-linear-gradient(to right, lightcyan, #aff803);background: linear-gradient(to right, lightcyan, #04f18f);max-width: 40rem;max-height: 7rem;">
                        <h4 class="card-title">
                            <b class="text-light fs-1">
                                <?php
                                echo $row['nom_animal'];
                                ?>
                            </b>
                        </h4>

                    </div>
                    <ul class="list-group list-group-flush " id="list_modal">




                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_animaux_<?php echo $row['id_animal']; ?>">
                            En Savoir plus <span class="text-warning fw-bold"><?php echo $row['race_animal']; ?></span> ....
                        </button>

                        <!-- Modal -->

                        <!--  debut Modal 1 -->
                        <div class="modal fade" id="modal_animaux_<?php echo $row['id_animal']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal_animaux_
                                    <?php
                                    echo $row['id_animal'];
                                    ?>
                                    "><b class="text-success">
                                                <?php
                                                echo $row['nom_animal'];
                                                ?>

                                            </b></h1>
                                        <!-- <iframe src="" frameborder="0"></iframe> -->
                                        <iframe 
                                            title="YouTube video player"
                                            width="560" height="315" 
                                            src="<?php echo $row['video_galleries']; ?>"
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                            referrerpolicy="strict-origin-when-cross-origin" 
                                            allowfullscreen>
                                        </iframe>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-light fs-4 bg-info" style=" font-family: cursive;">

                                        <?php
                                        echo $row['description_animal'];
                                        ?>"

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </ul>


                    <!--   bouton commentaire -->

                    <ul class="list-group list-group-flush " id="list_modal">





                        <!-- Modal -->

                        <!--  debut Modal 2 -->
                        <div class="modal fade" id="modal_commentaires_<?php echo $row['id_animal']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-light fs-4 bg-info" style=" font-family: cursive;">
                                        <?php
                                        foreach ($commentaires as $comment) {
                                            if ($comment['id_animal'] == $row['id_animal']) {
                                        ?>
                                                <p>
                                                    <b>
                                                        <?php
                                                        echo $comment['visiteur_nickname'];
                                                        ?>
                                                    </b>
                                                    <br />
                                                    <?php
                                                    echo $comment['avis_commentaire'];
                                                    ?>
                                                </p>
                                                <hr />
                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </ul>
                    <!--     fin bouton commentaire -->

                    <!--    debut de la partie report -->


                    <div class="mx-0" style="background: -webkit-linear-gradient(to right, lightcyan, #ddf3a9);
  background: linear-gradient(to right, lightcyan, #6be795);
">
                        <h3 style=" margin-bottom: 20px;margin-top:20px "><b class="text-success">Etat animal : </b> <b class="fs-5"><?php echo $row['etat_animal']; ?></b></h3>

                        </h4>
                        <h3 style=" margin-bottom: 15px;  "><b class="text-primary"> Habitat : </b> <b class="fs-5"><?php echo $row['nom_habitat']; ?></b> </h3>
                        <h3 style=" margin-bottom:15px;  "><b class="text-warning">Nourriture : </b><b class="fs-5"><?php echo $row['nourriture_animal']; ?></b></h3>
                        <h3 style=" margin-bottom: 15px;  "><b class="text-primary"> Quantité nourriture : </b> <b class="fs-5"><?php echo $row['quantité_nourriture']; ?></b> </h3>
                        <p>Laisser un commentaire!</p>
                        <form action="touslesanimaux.php<?php echo $queryString ?>" method="POST">
                            <p>Nickname
                                <input type="text" name="nickname">
                            </p>
                            <textarea name="commentaire" id="" cols="40" rows="5" class="rounded-2"></textarea><br>
                            <input type="hidden" name="id_animal" value="<?php echo $row['id_animal'] ?>">
                            <button type="submit" class="btn btn-outline-success"> Sauvegarder</button>
                        </form>

                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal_commentaires_<?php echo $row['id_animal']; ?>">
                             lire les commentaires...
                        </button>
                        <h3 class=" mt-2 fs-5 text-1" style="margin-right: 250px; margin-bottom: 30px;  "><b class="text-primary"> Nombre de visite :</b> </h3>
                    </div>

                    <!--   fin de la partie report -->
                </div>
            <?php
            }
            ?>
            <br>
            <br>
        </section>






        <!--    <img  src="./assets/IMAGES/images habitats/veterinaire/giraffe.webp" alt="" class="w-100 mx-0"> -->

        <!--DEBUT DU FOOTER-->


        </div>
        <div class="container-fluid mt-5" style="background-color: rgb(238, 236, 234); "><img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="font-size: 25px; "></div>
        <!-- Remove the container if you want to extend the Footer to full width. -->
        
        <?php
            include('templates/footer.php');
            include('templates/scripts.php');
        ?>
</body>

</html>