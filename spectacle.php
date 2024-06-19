<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spectacle_zoo</title>
    <!--  <link rel="stylesheet" href="/CSS/style.css"> -->
    <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">

    <?php
    $bdd = include('config/db_connection.php');
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
       <?php
            include('templates/footer.php');
            include('templates/scripts.php');
        ?>
</body>

</html>