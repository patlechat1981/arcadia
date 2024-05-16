<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia</title>
   <!--  <link rel="stylesheet" href="./assets/CSS/style.css"> -->
   <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">
  
   <?php

//CONNExION
try{
$bdd = new PDO('mysql:host=localhost;dbname=Zoo_arcadia;charset=utf8','root','');}
catch(Exception $e){die('Erreur : '.$e->getmessage());}

$requete =$bdd->query('SELECT * FROM tous_les_animaux');
?>

</head>

<body>

    <header class="text-center mx-0 postion:fixed" style="background-image: url(https://wallpapers-hub.art/wallpaper-images/334019.jpg) ; "  >
        <img src="./assets/IMAGES/images animaux/suspension-bridge-959853_1280 (1).jpg" class="img_head "
            style="width: 100%;height: 100px; " alt="logo" />
        <!--ceci est ma navbar-->
        <nav class="navbar navbar-expand-lg navbar-light  couleur_nav m-0  " style = "background-color: rgba(252, 252, 243, 0.911);">
            <div class="container-fluid ">

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
                                
                                <li><a class="dropdown-item text-primary " href="#">Tous nos Animaux</a></li>


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
                    
                                
                       
                     

                </div>

            </div>
        </nav>
      





        


<!-- fin de la barre ecrit Animaux du mois -->
        <section class="section_main "style="  font-family: cursive; ">
<?php
foreach ($requete as $row) {

  
?>

            <!--debut des cards 1-->

            <div class="card m-auto border border-light border-5 mt-5 " id="card_card" style="width: 35rem; height: 600px; ">
                <img src="<?php echo $row['images_animal']  ?>" id="img_modal" class="card-img-top "
                    alt="...">
                <div class="card-body " id="card_body" style="border: 2px solid rgb(134, 241, 157); background: -webkit-linear-gradient(to right, lightcyan, #aff803);
  background: linear-gradient(to right, lightcyan, #04f18f);  ">
                <h4 class="card-title"  >
                    <b class="text-light fs-1">
                        <?php
                            echo $row['nom_animal'];
                        ?>
                    </b>
                </h4>
               
                </div>
                <ul class="list-group list-group-flush " id="list_modal">
                    
                     
                      

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal_animaux_<?php echo $row['id_animal'];?>">
                       En Savoir plus....
                    </button>

                    <!-- Modal -->

                    <!--  debut Modal 1 -->
                    <div class="modal fade" id="modal_animaux_<?php echo $row['id_animal'];?>" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-light fs-4 bg-info" style=" font-family: cursive;">
                                 
                                        <?php
                                        echo $row['description_animal'];
                                    ?>"
                                       
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  

                </ul>


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