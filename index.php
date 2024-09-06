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
    $requet = $bdd->query('SELECT * FROM useradmin');
    $requete = $bdd->query('SELECT * FROM tous_les_animaux');
    $service = $bdd->query('SELECT * FROM service_zoo ');
    $habitats = $bdd->query('SELECT * FROM zoohabitats ');
    ?>

</head>

<body>

    <header class="text-center mx-0">
        <!-- <img src="./assets/IMAGES/images animaux/suspension-bridge-959853_1280 (1).jpg" class="img_head" style="width: 100%;height: 100px; " alt="logo" /> -->
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
                        <!--  <li style="margin-left: 90px;">
                            <a href="" class=" nav-link text-info mx-5 ">Accueil</a>
                        </li> -->
                        <li class="nav-item dropdown  mx-4">

                            <a class="nav-link dropdown-toggle btn btn-outline-success border border-1 border-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                foreach ($service as $serv) {
                                ?>
                                    <li>
                                        <a class="dropdown-item text-warning" href="/ZOOARCARDIA2/spectacle.php?id=<?php echo $serv['id_service']; ?>">
                                            <?php echo $serv['nom_service'] ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li><a class="dropdown-item text-success" href="/ZOOARCARDIA2/PAGES/veterinaire.html">
                                        Véterinaires
                                    </a></li>
                        </li>
                    </ul>
                    </li>

                    <li>
                        <a href="/ZOOARCARDIA2/PAGES/contact" class="text-primary nav-link mx-4 ">Contactez-nous</a>
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
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item " href="/ZOOARCARDIA2/touslesanimaux">Tous les animaux</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" style="margin-left: 110px;">
                        <a class="nav-link dropdown-toggle btn btn-outline-success border border-1 border-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Access membres
                        </a>
                        <ul class="dropdown-menu  ">
                            <form style="width: 450px;height: 450px;" class="text-center" method="POST" action="connection.php"><br>

                                <!--  debut form relier a la connexion -->

                                <header>
                                    <h1>Accès reservé aux menbres du Zoo</h1>
                                </header>

                                <div class="container">                                 

                                    <div id="form">
                                        <form method="POST" action="connection.php">
                                            <table>
                                                <tr>
                                                    <td>Pseudo</td>
                                                    <td><input type="text" name="pseudo" id="pseudo" placeholder="Inserer votre pseudo..." required></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><input type="email" name="email" id="email" placeholder="Inserer votre email..." required></td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td><input type="text" name="role" id="role" placeholder=" votre role..." required></td>
                                                </tr>
                                                <tr>
                                                    <td>Mot de passe</td>
                                                    <td><input type="password" name="password" placeholder="Inserer votre password ..." required></td>
                                                </tr>
                                            </table>
                                            <p><label><input type="checkbox" name="connect" checked>Connexion automatique</label></p>
                                            <div id="button">
                                                <button type='submit'>Connexion</button>
                                            </div>


                                           
                                    </div>
                                </div>


                                <!--  fin form relier a la connexion -->


                                <br>ou
                                <hr>



                                <a href="./config/enregistrement_staff.php" class="text-decoration-none border border-4 border-warning p-3  rounded">Enregistrez-vous</a>





                            </form>
                        </ul>
                    </li>

                    </ul>


                </div id="success">


                <?php
			 /* if(isset($_GET['error'])){
				echo'<p id="error">Nous ne pouvons pas vous authentifier.</p>';
			}
			else if(isset($_GET['success'])){
				echo'<p id="success">Vous êtes maintenant connecté.</p>';
			}  */
		?>



            </div>
        </nav>
        <!--fin de ma navbar-->
        <!-- Carousel wrapper -->


        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active " id="video_carousel1">
                <video height="500px" autoplay loop muted style=" box-shadow: 10px 5px 100px 100px; ">
                    <source src="./assets/IMAGES/video/Testo del paragrafo (23).mp4" type="video/mp4" />
                </video>
                <!--  <div class="carousel-caption d-none d-md-block" >
                     
                        <p class="display-1 text-light"  style="font-family: cursive;">
                          Bienvenue au Zoo Arcadia
                        </p>
                    </div> -->
            </div>




            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselVideoExample" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->



        <br>

        <!-- debut mon mon article ecrit en blanc -->
        <div>
            <article class="article ">
                <p class="fs-1 text-light m-auto w-75" style="font-family: 'Times New Roman', Times, serif;">

                    <b class="fs-1 text-success">Arcadia</b> est un zoo situé en France près de la forêt de Brocéliande,
                    en bretagne depuis 1960.
                    Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font
                    extrêmement attention à leurs santés. Chaque jour, plusieurs vétérinaires viennent afin
                    d’effectuer les contrôles sur chaque animal avant l’ouverture du zoo afin de s’assurer que tout
                    se passe bien, de même, toute la nourriture donnée est calculée afin d’avoir le bon grammage
                    (le bon grammage est précisé dans le rapport du vétérinaire).
                </p>

            </article>
        </div>
        <!-- fin d mon mon article ecrit en blanc -->
        </main>
        <!-- debut de la barre ecrit Animaux du mois -->
        <section class="bg-secondary mt-2 p-3" id="barre_horizontale1">
            <div>
                <h1 class="m-0 " style="font-family:cursive; color: gold;">les nouveaux arrivés </h1>
            </div>
        </section>

        <!-- fin de la barre ecrit Animaux du mois -->
        <section class="section_main " style="height: 550px;">
            <?php
            $i = 0;
            foreach ($requete as $row) {
                if ($i < 4) {
                    $i++;

            ?>

                    <!--debut des cards 1-->

                    <div class="card m-3 border border-light border-5 mt-5  " id="card_card" style="width: 35rem; height: 450px;">
                        <img src="<?php echo $row['images_animal']  ?>" id="img_modal" class="card-img-top " alt="...">
                        <div class="card-body " id="card_body" style="border: 2px solid rgb(134, 241, 157);  ">
                            <h4 class="card-title">
                                <b class="text-success">
                                    <?php
                                    echo $row['nom_animal'];
                                    ?>
                                </b>
                            </h4>

                        </div>
                        <ul class="list-group list-group-flush" id="list_modal">
                            <li class="list-group-item" id="list_modal">
                                <b>Moyenne d'Age :</b>
                                <?php echo $row['moyenne_age']; ?>
                                <br><b>Poids Moyen:</b>
                                <?php echo $row['poids_moyen']; ?>
                            </li>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_animal_<?php echo $row['id_animal']; ?>">
                                Galleries video
                            </button>

                            <!-- Modal -->

                            <!--  debut Modal 1 -->
                            <div class="modal fade" id="modal_animal_<?php echo $row['id_animal']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content " style="min-width: 600px" ;>
                                        <div class="modal-header ">
                                            <h1 class="modal-title fs-5" id="modal_animal_
                                    <?php
                                    echo $row['id_animal'];
                                    ?>
                                    "><b class="text-success">
                                                    <?php
                                                    echo $row['nom_animal'];
                                                    ?>
                                                </b></h1>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="m-auto" style="margin:auto">
                                            <div class="m-auto">
                                        <iframe 
                                            title="YouTube video player"
                                            width="560" height="315" 
                                            src="<?php echo $row['video_galleries']; ?>"
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                            referrerpolicy="strict-origin-when-cross-origin" 
                                            allowfullscreen>
                                        </iframe>
                                        </div>
                                        <div class="modal-body ">
                                            <!--   <iframe width="560" class="w-100" height="315"
                                        src="   <?php
                                                echo $row['video_galleries'];
                                                ?>"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="button" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="card-link">En savoir plus...</a>

                        </ul>

                    </div>
            <?php
                }
            }
            ?>
        </section>

        <div class="row bg-secondary  p-4 m-4 mb-0" id="barre_horizontale2" style="display: flex; ">
            <div class="  bg-secondary" style="display: flex;flex-direction: row;">
                <h1 style="font-family:cursive;color: aquamarine;"><b>Soins de nos Animaux</b></h1>
            </div>

            <div class="  bg-success" style="display: flex; flex-direction: row-reverse;">
                <h1 class="fw-bold text-light" style="font-family:cursive; color: rgb(39, 16, 243);justify-content: center;">Animations</h1>
            </div>

        </div>


        <!--SECTION SPECTACLE ET VETERINAIRE-->

        <div class=" " id="section_spectacle_soins mt-0 " style="display: flex;flex-direction: row;justify-content: space-between;
        height: 1000px; background-color: #e8f5c4; width: 100%;">

            <!--Card soins animaux-->
            <div class="  card text-light " id="card_Spectacle" style="width: 400px;height: 900px;display: flex;justify-self:flex-end; font-family: cursive; margin-left: 5px;">
                <img src="./assets/IMAGES/images_habitats/veterinaire/seal-6868637_640.jpg" class="card-img-top  mt-2 m-auto" alt="..." style="height: 500px;width: 370px;">
                <h2 class="mt-5  " style="background-color: #e8f5c4; color: darkgreen;">Les Maîtres des Airs, un ballet
                    unique au monde !

                    Emporté par une musique orchestrale magistrale, assistez à une chorégraphie époustouflante ! Le
                    sifflement des ailes sur l’air,
                    la grâce du vol des oiseaux ....</h2><br><br><br>
                <div class="card-body ">
                    <h4 class="card-title text-info">Nos animaux sont entre de bonnes mains</h4>

                    <a href="./PAGES/veterinaire.html" class="btn btn-primary">En savoir plus...</a>
                </div>
            </div>
            <!-- fin Card soins animaux-->

            <video class=" mx-3" id="background-video " autoplay loop muted style="height: 500px; margin-top: 100px;width: 500px; ">

                <source src="./assets/IMAGES/video/103362-662525713_tiny.mp4" type="video/mp4" style="height: 400px;">

            </video>

            <!--Card spectacle-->
            <div class=" card text-light  " id="card_Spectacle" style="width:400px;height: 900px;display: flex;justify-self:flex-end; font-family: cursive; margin-right: 5px;">
                <h2 class="mb-5  text-primary " style="background-color: #e8f5c4; color: darkgreen;">Les Maîtres des
                    Airs, un ballet unique au monde !


                    Emporté par une musique orchestrale magistrale, assistez à une chorégraphie époustouflante ! Le
                    sifflement des ailes sur l’air,
                    la grâce du vol des oiseaux ....</h2><br>
                <img src="./assets/IMAGES/Spectacles/images spectacles/https___s3.eu-west-3.amazonaws.com_images.zoobeauval.com_2020_05_01-maitresdesairs-header-5ed0d74c93d85.webp" class="card-img-top  mt-2 m-auto " alt="..." style="height: 300px;width: 370px;">
                <div class="card-body">
                    <h4 class="card-title text-success">des spectacles unique !</h4>

                    <a href="/ZOOARCARDIA/spectacle?id=1" class="btn btn-primary">En savoir plus...</a>
                </div>
            </div>
            <!-- fin Card spectacle-->

            <!--FIN SECTION SPECTACLE ET VETERINAIRE-->



            <!--    <img  src="./assets/IMAGES/images habitats/veterinaire/giraffe.webp" alt="" class="w-100 mx-0"> -->

            <!--DEBUT DU FOOTER-->


        </div>
        <div class="container-fluid " style="background-color: rgb(238, 236, 234); "><img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="font-size: 25px; "></div>

        <?php
        include('templates/footer.php');
        include('templates/scripts.php');
        ?>
</body>

</html>