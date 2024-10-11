<?php



$bdd = include('config/db_connection.php');
$config = include('config/config.php');

$users = $bdd->query('SELECT * FROM `useradmin`');

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

        <img src="./assets/IMAGES/images animaux/suspension-bridge-959853_1280 (1).jpg" class="img_head"
            style="width: 100%;height: 100px; " alt="logo" />
        <!--ceci est ma navbar-->
        <nav class="navbar navbar-expand-lg navbar-light  couleur_nav ">
            <div class="container-fluid">

                <a class="navbar-brand bg-light" href="">
                    <p class="text-success mt-3 " style="font-family: 'Times New Roman', Times, serif;">
                        <img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt=""
                            style="height: 50px ; width: 120px;font-size:smaller;">
                </a><br>ZOO ARCADIA</p>

                <a class=" btn  btn-outline-success border border-1 border-success" href="index.php" role="button">
                    Page d'accueil
                </a>

            </div>
            <!-- ******************************************************************************************************************************************************************** -->



        </nav>
        <!-- Inner -->


    </header>

    <div id="info" class=" main carousel-inner" style="background-image: url(https://www.glmv.com/wp-content/uploads/2022/06/Living-Desert-Rhinos-Savanna-scaled.jpg); height:750px;text-align:center;display:flex;flex-direction:row-reverse; ">


        <!-- debut Card -->

        <main id="afficheAdminMembers" style=" font-family:cursive; " class="mt-5 ">
            <h3 class="p-3 bg-success">Listes des operateurs du Zoo</h3>
            <div style="display:flex;flex-wrap:wrap ">
                <?php
                foreach ($users as $user) {
                ?>
                    <div style=" border: 3px solid white; margin-bottom: 10px; width:350px;height:350px;" class=" bg-success mx-2">

                        <form method="POST" action="indexstaff.php">

                            <img style="width:300px;height:200px; " class="mt-3" src="<?php echo $user['images_operateur']; ?>" alt="">

                            <p class="mb-2 mt-3 text-warning"> <span class="fw-bold text-light">Pseudo :</span><?php echo ' ' . $user['pseudo']; ?></p>
                            <p class="mb-2 text-warning"> <span class="fw-bold text-light">Role :</span><?php echo ' ' . $user['role']; ?></p>
                            <p class="mb-2 text-warning"><span class="fw-bold text-light">Email :</span><?php echo ' ' . $user['email']; ?></p>

                        </form>

                        <!-- debut listes operateurs -->

                    </div>
                <?php
                }
                ?>
            </div>
        </main>

    </div>


    <!-- ************************************************************************************************************************************************* -->

    <br>

    <!--DEBUT DU FOOTER-->

    <div class="container-fluid " style="background-color: rgb(238, 236, 234); "><img src="./assets/IMAGES/logo_nav/istockphoto-1017250670-612x612.jpg" alt="" style="font-size: 25px; "></div>

    <?php
    include('templates/footer.php');
    include('templates/scripts.php');
    ?>


</body>

</html>