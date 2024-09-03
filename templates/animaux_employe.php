<?php

$avis = $bdd->query('SELECT * FROM avis');

if (
    isset($_POST['id_avis']) && isset($_POST['etat'])
) {

    $id_avis = $_POST['id_avis'];
    $etat = $_POST['etat'];

    $avis_insert = $bdd->prepare('UPDATE avis set etat = ? where id_avis = ?') or die(print_r($bdd->errorInfo()));
    $avis_insert->execute(array($etat, $id_avis));

}  ?>


<div class="section_mainAnimaux text-center mx-0  " id="afficheEmpAnimaux" style="display: none;height:358px;">

    <form class="d-flex mt-3  text-center" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>


    <?php
    
    $animaux->execute();
    foreach ($animaux as $emplAnimaux) {
    ?>
        <!-- 
        <button class="btn btn-outline-success border-3 mt-3 " style="width: 190px;">Animaux</button>
        <button class="btn btn-outline-warning border-3 mt-3 " style="width: 190px;">Habitat</button> -->
        <div class="cardemploye m-auto border border-light border-5 mt-3 mb-5 mx-5 " id="cardTouslesAnimaux" style=" width:400px; ;height:424px;box-shadow:5px 5px 15px 15px  <?php echo $habitat_color ?>;">

            <img style="width:388px; max-height:13rem;margin:auto;" src="<?php echo $emplAnimaux['images_animal']  ?>" id="img_modal" class="card-img-top " alt="...">

            <div class="card-bodynomAnimaux">
                <h4 class="card-title">
                    <b class="text-light fs-5">
                        <?php
                        echo $emplAnimaux['nom_animal'];
                        ?>
                    </b>
                </h4>

            </div>
            <ul class="list-group list-group-flush " id="list_modal">

                <!-------------- Modal sante et repas animal-------------------------------------------------->

                <!--  debut Modal 1 -->
                <div class="modal fade" id="modal_animaux_<?php echo $emplAnimaux['id_animal']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modal_animaux_
                                    <?php
                                    echo $emplAnimaux['id_animal'];
                                    ?>
                                    "><b class="text-dark">
                                        <?php
                                        echo $emplAnimaux['nom_animal'];
                                        ?>

                                    </b></h1><br><br>
                                <hr>

                                <div class="text-center">
                                    <h5 style=" margin-bottom: 8px;margin-top:8px "><b class="text-success">Etat animal : </b> <b class=""><?php echo $emplAnimaux['etat_animal']; ?></b></h5>


                                    <h5 style=" margin-bottom: 8px;  "><b class="text-primary"> Quantité nourriture : </b> <b class=""><?php echo $emplAnimaux['quantité_nourriture']; ?></b> </h5>


                                </div>
                                <p> <button type="button" class="btn-close border bg-danger  text-light" data-bs-dismiss="modal" aria-label="Close"></button></p>
                                <?php /* echo $row['video_galleries']; */ ?>

                            </div>
                            <div class="modal-body text-light bg-info" style=" font-family: cursive;">

                                <?php
                                /* echo $row['description_animal']; */
                                ?>
                                <form action="" method="post">



                                    <div>
                                        etat de l'animal
                                        <input type="text">
                                    </div><br>
                                    <div>
                                        quantité nourriture :
                                        <input type="text">
                                    </div><br>
                                    <button class="btn  border border-2 btn-outline-primary" type="submit">Sauvegarder</button>



                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                            </div>
                        </div>
                    </div>
                </div>


            </ul>

            <!-----------------------------   fin modal sante et repas animaux-------------------------------------------------------->

            <!-----------------------------  debut modal gestion commentaires------------------------------------------------------>

            <ul class="list-group list-group-flush " id="list_modal">




                <div class="modal fade" id="modal_commentaires_<?php echo $emplAnimaux['id_animal']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modal_commentaires_
                    <?php
                    echo $emplAnimaux['id_animal'];
                    ?>
                    "><b class="text-dark">
                                        <?php
                                        echo $emplAnimaux['nom_animal'];
                                        ?>

                                    </b></h1><br><br>
                                <hr>

                                <div class="text-center">

                                    <h2 style=" margin-bottom: 8px;margin-top:8px "><b class="text-success">Gestions commentaires </b> <b class=""></b></h2>



                                </div>
                                <p> <button type="button" class="btn-close border bg-danger  text-light" data-bs-dismiss="modal" aria-label="Close"></button></p>
                                <?php /* echo $row['video_galleries']; */ ?>

                            </div>
                            <div class="modal-body text-light bg-info" style=" font-family: cursive;">

                                <?php
                                $avis->execute();
                                foreach($avis as $row) {
                                        if($row['id_animal'] == $emplAnimaux['id_animal'] && $row['etat'] == 'pending') {
                                ?>
                                <form action="indexstaff.php<?php echo $queryString ?>" method="POST">
                                    <input type="hidden" name="id_avis" value="<?php echo $row['id_avis'] ?>">
                                    <p>
                                        Nickname: <?php echo $row['visiteur_nickname'] ?>
                                    </p>
                                    <p>
                                        Commentaire: <?php echo $row['avis_commentaire'] ?>
                                    </p>
                                    <select name="etat" value="<?php echo $row['etat'] ?>">
                                        <option <?php 
                                            if($row['etat'] == 'pending') {
                                                echo 'selected';
                                            }
                                        ?>
                                        >pending</option>
                                        <option <?php 
                                            if($row['etat'] == 'approved') {
                                                echo 'selected';
                                            }
                                        ?>>approved</option>
                                        <option <?php 
                                            if($row['etat'] == 'rejected') {
                                                echo 'selected';
                                            }
                                        ?>>rejected</option>
                                    </select>
                                    <button type="submit" class="btn btn-outline-success">Sauvegarder</button>
                                </form>
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

            <!------------------------- fin lodal gestions commentaires ------------------------------------------------------>






            <div class="mx-0" style="background: -webkit-linear-gradient(to right, lightcyan, #ddf3a9);
  background: linear-gradient(to right, lightcyan, #6be795);
"><br>

                <br>
                <form action="touslesanimaux.php<?php echo $queryString ?>" method="POST">

                    <br>
                    <button type="button" class="btn btn-primary w-50 mb-2 borber borber-2 border-warning " data-bs-toggle="modal" data-bs-target="#modal_commentaires_<?php echo $emplAnimaux['id_animal']; ?>">
                        Gestion des commentaires
                    </button><br>

                    <button type="button" class="btn btn-outline-success borber borber-2  border-success w-50 mb-2 " data-bs-toggle="modal" data-bs-target="#modal_animaux_<?php echo $emplAnimaux['id_animal']; ?>">
                        Ajouter l'etat santé
                    </button>
                    <ul class="list-group list-group-flush " id="list_modal">





                        <!-- Modal -->




                    </ul>
                    <!--  <button type="submit" class="btn btn-outline-warning w-50 mb-1 borber border-2 border-danger " > Ajouter l'etat santé</button><br> -->

                </form>

                <!-- 
                <h3 class=" mt-3 fs-5 text-1 " style="margin-right: 250px; margin-bottom: 20px;  "><b class="text-primary"> Nombre de visite :</b> </h3><br><br> -->
            </div><br><br>

            <!--   fin de la partie report -->
        </div>
    <?php
    }
    ?>
    <br>
    <br>
</div>
<script src="./templates/administration.js"></script>