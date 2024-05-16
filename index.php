<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
   <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">
  
   <?php

//CONNExION
try{
$bdd = new PDO('mysql:host=localhost;dbname=Zoo_arcadia;charset=utf8','root','');}
catch(Exception $e){die('Erreur : '.$e->getmessage());}

$requete =$bdd->query('SELECT * FROM animaux_card');
?>

</head>

<body>

    <header class="text-center mx-0">
        <img src="./assets/IMAGES/images animaux/suspension-bridge-959853_1280 (1).jpg" class="img_head"
            style="width: 100%;height: 100px; " alt="logo" />
        <!--ceci est ma navbar-->
        <nav class="navbar navbar-expand-lg navbar-light  couleur_nav ">
            <div class="container-fluid">

                <a class="navbar-brand bg-light" href="">
                    <p class="text-success mt-3 " style="font-family: 'Times New Roman', Times, serif;"> <img
                            src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt=""
                            style="height: 50px ; width: 120px;font-size:smaller;">
                </a><br>ZOO ARCADIA</p>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse link_navbar " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                        <li style="margin-left: 90px;">
                            <a href="" class=" nav-link text-info mx-5 " >Accueil</a>
                        </li>
                        <li class="nav-item dropdown  mx-4">
                            <a class="nav-link dropdown-toggle btn btn-outline-success border border-1 border-success"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-warning" href="./PAGES/spectacle.html"> Les Spectacles & Activitées</a></li>
                                
                                <li><a class="dropdown-item text-primary " href="#">Tous nos Animau</a></li>


                        </li>

                    </ul>
                    </li>
                   
                    <li>
                        <a href="" class="text-primary nav-link mx-4 ">Contactez-nous</a>
                    </li>
                   
                    <li class="nav-item dropdown mx-3  ">
                        <a class=" nav-link dropdown-toggle btn btn-outline-warning border border-1 border-warning"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nos animaux
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-warning" href="./PAGES/savane1.html">Animaux de Savane</a></li>
                            <li><a class="dropdown-item text-success" href="./PAGES/jungle.html">Animaux de la Jungle</a></li>
                            <li><a class="dropdown-item text-secondary" href="./PAGES/marais.html">Animaux des marais</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item " href="#">Tous les animaux</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown  " style="margin-left: 110px;">
                        <a class="nav-link dropdown-toggle btn btn-outline-success border border-1 border-success"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Access membres
                        </a>
                        <ul class="dropdown-menu  " >
                            <form style="width: 280px;height: 400px; " class="" >
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4 m-4">
                                    <input type="text" id="form2Example1" class="form-control" />
                                    <label class="form-label" for="form2Example1">Username</label>
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4 m-4">
                                    <input type="password" id="form2Example2" class="form-control" />
                                    <label class="form-label" for="form2Example2">Password</label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox" value=""
                                                id="form2Example31" checked />
                                            <label class="form-check-label " for="form2Example31"> Remember me </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <!-- Simple link -->
                                        <a href="#!" class="">Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-block mb-4 m-4">Sign in</button>

                                <!-- Register buttons -->
                                <div class="text-center ">
                                    <p>Not a member? <a href="#!">Register</a></p>
                                    <p>or sign up with:</p>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
                        </ul>
                    </li>
                    <!--   <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> -->
                    </ul>
                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->

                </div>

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
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselVideoExample"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselVideoExample"
                data-mdb-slide="next">
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
                <h1 class="m-0" style="font-family:cursive; color: gold;">les nouveaux arrivés </h1>
            </div>
        </section>

<!-- fin de la barre ecrit Animaux du mois -->
        <section class="section_main row" style="width: 35rem; min-height: 70%;" >
<?php
foreach ($requete as $row) {
$row>4
  
?>

            <!--debut des cards 1-->

            <div class="card m-3 border border-light border-5 col col-4  " id="card_card" style="width: 35rem; height: 500px;">
                <img src="<?php echo $row['images_animaux']  ?>" id="img_modal" class="card-img-top "
                    alt="...">
                <div class="card-body " id="card_body" style="border: 2px solid rgb(134, 241, 157);  ">
                <h4 class="card-title">
                    <b class="text-success">
                        <?php
                            echo $row['nom_animaux'];
                        ?>
                    </b>
                </h4>
               
                </div>
                <ul class="list-group list-group-flush" id="list_modal">
                    <li class="list-group-item" id="list_modal"><b>Moyenne d'Age :</b> <?php echo $row['moyenne_age'];
                     
                        ?> <br><b>Poids Moyen
                            :</b> <?php
                            echo $row['poids_moyen'];
                        ?> </li>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_animaux_<?php echo $row['id_animaux'];?>">
                        Galleries video
                    </button>

                    <!-- Modal -->

                    <!--  debut Modal 1 -->
                    <div class="modal fade" id="modal_animaux_<?php echo $row['id_animaux'];?>" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modal_animaux_
                                    <?php
                                        echo $row['id_animaux'];
                                    ?>
                                    "><b class="text-success">
                                     <?php
                                        echo $row['nom_animaux'];
                                    ?>
                                    </b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                  <!--   <iframe width="560" class="w-100" height="315"
                                        src="   <?php
                                        echo $row['video_animaux'];
                                    ?>"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
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
            <div class="  card text-light " id="card_Spectacle"
                style="width: 400px;height: 900px;display: flex;justify-self:flex-end; font-family: cursive; margin-left: 5px;">
                <img src="./assets/IMAGES/images_habitats/veterinaire/seal-6868637_640.jpg" class="card-img-top  mt-2 m-auto"
                    alt="..." style="height: 500px;width: 370px;">
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

            <video class=" mx-3" id="background-video " autoplay loop muted
                style="height: 500px; margin-top: 100px;width: 500px; ">

                <source src="./assets/IMAGES/video/103362-662525713_tiny.mp4" type="video/mp4" style="height: 400px;">

            </video>
            
            <!--Card spectacle-->
            <div class=" card text-light  " id="card_Spectacle"
                style="width:400px;height: 900px;display: flex;justify-self:flex-end; font-family: cursive; margin-right: 5px;">
                <h2 class="mb-5  text-primary " style="background-color: #e8f5c4; color: darkgreen;">Les Maîtres des
                    Airs, un ballet unique au monde !

                  
                    Emporté par une musique orchestrale magistrale, assistez à une chorégraphie époustouflante ! Le
                    sifflement des ailes sur l’air,
                    la grâce du vol des oiseaux ....</h2><br>
                <img src="./assets/IMAGES/Spectacles/images spectacles/https___s3.eu-west-3.amazonaws.com_images.zoobeauval.com_2020_05_01-maitresdesairs-header-5ed0d74c93d85.webp" class="card-img-top  mt-2 m-auto " alt="..." style="height: 300px;width: 370px;">
                <div class="card-body">
                    <h4 class="card-title text-success">des spectacles unique !</h4>

                        <a href="./PAGES/veterinaire.html" class="btn btn-primary">En savoir plus...</a>
                </div>
            </div>
            <!-- fin Card spectacle-->

            <!--FIN SECTION SPECTACLE ET VETERINAIRE-->



            <!--    <img  src="./assets/IMAGES/images habitats/veterinaire/giraffe.webp" alt="" class="w-100 mx-0"> -->

            <!--DEBUT DU FOOTER-->
        </div>
        <div class="container-fluid " style="background-color: rgb(238, 236, 234); "><img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="font-size: 25px; "></div>
        <!-- Remove the container if you want to extend the Footer to full width. -->
        <div class="container-fluid   " style="background-color:#21D192 ; ">
            <!-- Footer -->
            <footer class="text-center text-lg-start text-dark  " style="background-color: #ECEFF1; margin: 0;">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-between  p-4 text-white"
                    style="background-color: #21D192 ;max-width: 100%;">
                 
                
                  

                    <!-- Right -->
                    <div>
                        <a href="" class="text-primary me-4">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="text-succee me-4">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="text-white me-4">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="text-white me-4">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="text-white me-4">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="text-white me-4">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                    <!-- Right -->
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
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #5bbe85; height: 4px" />
                                <p>
                                    Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960. Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs santés.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Découvrir</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 90px; background-color: #327dc4; height: 4px" />
                                <p>
                                    <a href="./PAGES/savane1.html" class="text-warning text-decoration-none">Animaux de la savane</a>
                                </p>
                                <p>
                                    <a href="./PAGES/jungle.html" class="text-success text-decoration-none">Animaux de la jungle</a>
                                </p>
                                <p>
                                    <a href="./PAGES/marais.html" class="text-secondary text-decoration-none">Animaux de marais</a>
                                </p>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Lien</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 40px; background-color: #d442a4; height: 4px" />
                                
                                <p>
                                    <a href="#!" class="text-success text-decoration-none">• Visite •</a>
                                </p>
                                <p>
                                    <a href="./PAGES/spectacle.html" class="text-success text-decoration-none">• Spectacle •</a>
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
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 70px; background-color: #7c4dff; height: 4px" />
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

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
</body>

</html>