


<main class="section_mainAnimaux text-center mx-0 " id="employe_card">
    <?php
    foreach ($animaux as $row) {
    ?>

        <div class="cardemploye m-auto border border-light border-5 mt-5 mb-5 mx-5 " id="cardTouslesAnimaux" style=" width:400px; ;height:603px;box-shadow:5px 5px 15px 15px  <?php echo $habitat_color ?>;">
            <img style="width:388px; max-height:13rem;margin:auto;" src="<?php echo $row['images_animal']  ?>" id="img_modal" class="card-img-top " alt="...">

            <div class="card-bodynomAnimaux">
                <h4 class="card-title">
                    <b class="text-light fs-5">
                        <?php
                        echo $row['nom_animal'];
                        ?>
                    </b>
                </h4>

            </div>
            <ul class="list-group list-group-flush " id="list_modal"  >




                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal_animaux_<?php echo $row['id_animal']; ?>">
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

            <!--   fin modal -->
            <!--  debut partie description animaux -->




            <div class="mx-0" style="background: -webkit-linear-gradient(to right, lightcyan, #ddf3a9);
  background: linear-gradient(to right, lightcyan, #6be795);
"><br>
                <h5 style=" margin-bottom: 8px;margin-top:8px "><b class="text-success">Etat animal : </b> <b class=""><?php echo $row['etat_animal']; ?></b></h5>              
                <h5 style=" margin-bottom: 8px;  "><b class="text-primary"> Habitat : </b> <b class=""><?php echo $row['nom_habitat']; ?></b> </h5>
                <h5 style=" margin-bottom:8px;  "><b class="text-warning">Nourriture : </b><b class=""><?php echo $row['nourriture_animal']; ?></b></h5>
                <h5 style=" margin-bottom: 8px;  "><b class="text-primary"> Quantité nourriture : </b> <b class=""><?php echo $row['quantité_nourriture']; ?></b> </h5>
                <!--  <p class="text-danger">Laisser un commentaire!</p> -->
                  <br>
                <form action="touslesanimaux.php<?php echo $queryString ?>" method="POST">                
                    
                    <button type="submit" class="btn btn-outline-success w-50 mb-2"> Ajouter l'etat santé</button><br>
                    <button type="button" class="btn btn-primary w-50 mb-2" data-bs-toggle="modal" data-bs-target="#modal_commentaires_<?php echo $row['id_animal']; ?>">
                        repas animal
                    </button><br>
                    <button type="submit" class="btn btn-outline-success w-50 " > Ajouter l'etat santé</button>

                </form><br><br>

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
</main>