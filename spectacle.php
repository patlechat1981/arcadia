<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spectacle_zoo</title>
    <!--  <link rel="stylesheet" href="/CSS/style.css"> -->
    <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">

    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=Zoo_arcadia;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getmessage());
    }
    // leggo dalla url il parametro ?id=1
    $id_service = intval($_GET["id"]);

    $requete = $bdd->prepare('SELECT * FROM service_zoo WHERE id_service = :id_service');
    $requete->bindParam(':id_service', $id_service, PDO::PARAM_INT);
    $requete->execute();
    ?>

</head>
<header class="text-center mx-0 postion:fixed" style="background-image: url(https://cdn.pixabay.com/photo/2019/09/17/20/47/prague-4484517_1280.jpg) ; ">

    <nav class="navbar navbar-expand-lg navbar-light  couleur_nav m-0  " style=" background: -webkit-linear-gradient(to right, lightcyan, #aee6f0);
  background: linear-gradient(to right, lightcyan, #53a4e7);;font-family: cursive;">
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
                        <a href="http://localhost/ZOOARCARDIA/" class=" nav-link text-info mx-5 fw-bold btn-outline-light btn ">Accueil</a>
                    </li>
                    <li class="nav-item dropdown  mx-4">
                        <a class=" fw-bold nav-link dropdown-toggle btn btn-outline-success border border-1 border-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item text-warning" href="http://localhost/ZOOARCARDIA/spectacle.php?id=1"> Maitres des Airs</a></li>
                            <li><a class="dropdown-item text-warning" href="http://localhost/ZOOARCARDIA/spectacle.php?id=3"> Activités Ludiques pour enfants</a></li>
                    </li>

                </ul>
                </li>

                <li>
                    <a href="http://localhost/ZOOARCARDIA/PAGES/contact" class="text-primary nav-link mx-4 fw-bold ">Contactez-nous</a>
                </li>

            </div>

        </div>
    </nav>

</header>

<body style="background: #124119;
  background: -webkit-linear-gradient(to right, #6da594, #b6c90c);
  background: linear-gradient(to right, #8d8a7b, #b0d314);
  height: 100%;
  min-width: 500px;">



    <!-- debut session -->


    <section class="section_main " style="  font-family: cursive;display:block;flex-direction: row;overflow-x: scroll; ">
        <?php
        foreach ($requete as $row) {


        ?>



            <div id="carousel_<?php echo $row['id_service']; ?>" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel_<?php echo $row['id_service']; ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carousel_<?php echo $row['id_service']; ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carousel_<?php echo $row['id_service']; ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active ">
                        <img src="<?php echo $row['images_services']; ?>" class="d-block w-100 " alt="..." style="height:650px;">
                        <div class="carousel-caption d-none d-md-block ">
                            <h1 class="text-success display-1  mb-5"><?php echo $row['nom_service']; ?></h1>
                            <p class="fs-2 text-light fw-bold" style="overflow-y:scroll ;height:200px;width:100%"><?php echo $row['description_service']; ?></p>
                        </div>

                    </div>
                    <!-- <div class="carousel-item  " >
      <img src="https://cdn-images.zoobeauval.com/e09t5n00gf8c25SMJh61DJeW_IY=/800x600/https%3A%2F%2Fs3.eu-west-3.amazonaws.com%2Fimages.zoobeauval.com%2F2024%2F03%2Factivites-maison-bn-02-65faa81fcee9c.jpg" class="d-block w-100 " alt="..." style="height:650px;" >
      <div class="carousel-caption d-none d-md-block ">
        <h1 class="text-light display-1  mb-5">Les Activités ludiques pour enfants</h1>
        <p class="fs-2 text-light fw-bold" style=" height:200px;width:100%"></p>        
      </div> -->

                </div>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel_<?php echo $row['id_service']; ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel_<?php echo $row['id_service']; ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>



        <?php
        }
        ?><br>
        <div style="display: block;">
            <p class="fs-3 text-primary fw-bold m-auto text-center"><?php echo $row['horaires_services']; ?></p>
        </div>

        <!--DEBUT DU FOOTER-->


        </div>
        <div class="container-fluid " style="background-color: rgb(238, 236, 234); "><img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="font-size: 25px; "></div>
        <!-- Remove the container if you want to extend the Footer to full width. -->
        <div class="container-fluid   " style="background-color:#21D192 ; ">
            <!-- Footer -->
            <footer class="text-center text-lg-start text-dark  " style="background-color: #ECEFF1; margin: 0;">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-between  p-4 text-white" style="background-color: #21D192 ;max-width: 100%;">





                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold text-success">ZOO ARCADIA</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #5bbe85; height: 4px" />
                                <p>
                                    Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960. Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs santés.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Découvrir</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 90px; background-color: #327dc4; height: 4px" />
                                <p>
                                    <a href="http://localhost/ZOOARCARDIA/touslesanimaux?id=1" class="text-warning text-decoration-none">Animaux de la savane</a>
                                </p>
                                <p>
                                    <a href="http://localhost/ZOOARCARDIA/touslesanimaux?id=2" class="text-success text-decoration-none">Animaux de la jungle</a>
                                </p>
                                <p>
                                    <a href="http://localhost/ZOOARCARDIA/touslesanimaux?id=3" class="text-secondary text-decoration-none">Animaux de marais</a>
                                </p>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Lien</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 40px; background-color: #d442a4; height: 4px" />

                                <p>
                                    <a href="#!" class="text-success text-decoration-none">• Visite •</a>
                                </p>
                                <p>
                                    <a href="http://localhost/ZOOARCARDIA/spectacle.php?id=1" class="text-success text-decoration-none">• Les maitres des Airs •</a>
                                </p>
                                <p>
                                    <a href="http://localhost/ZOOARCARDIA/spectacle.php?id=3" class="text-success text-decoration-none">• Activités Ludiques •</a>
                                </p>
                                <p>
                                    <a href="./PAGES/veterinaire.html" class="text-success text-decoration-none">• Veterinaire •</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Contact</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 70px; background-color: #7c4dff; height: 4px" />
                                <p><i class="fas fa-home mr-3"></i> bretagne, alpes 06251, fr</p>
                                <p><i class="fas fa-envelope mr-3"></i> info@zooarccardia.com</p>
                                <p><i class="fas fa-phone mr-3"></i> + 06 234 567 88</p>
                                <p><i class="fas fa-print mr-3"></i> + 06 254 982 24</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                    © 2024 Copyright:
                    <a class="text-success fw-bold text-decoration-none" href="https://mdbootstrap.com/">Zoo Arcadia</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- FIN DU FOOTER-->
        </div>
        <!-- End of .container -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>