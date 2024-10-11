<?php
$habitat_color = 'gray';




if (empty($_GET['id'])) {
    $animaux = $bdd->query('SELECT * FROM `tous_les_animaux` as anim inner JOIN zoohabitats as zoo on zoo.id_habitat = anim.id_habitat');
} else {
    $id_habitat = intval($_GET["id"]);

    $animaux = $bdd->prepare('SELECT * FROM `tous_les_animaux` as anim inner JOIN zoohabitats as zoo on zoo.id_habitat = anim.id_habitat WHERE zoo.id_habitat = :id_habitat');
    $animaux->bindParam(':id_habitat', $id_habitat, PDO::PARAM_INT);

    $image_habitat = $animaux[0]['images_habitat'];
    $habitat_color = $animaux[0]['color'];
}



// form update nourriture_animal && quantité_nourriture
if (
    isset($_POST['vet_nourriture_quantite']) && isset($_POST['id_animal'])
    && isset($_POST['etat_animal']) && isset($_POST['vet_habitatAnimaux']) )
 {
    $idanimal = $_POST['id_animal'];
    $vet_nourriture_quantite = $_POST['vet_nourriture_quantite'];
    $etat_animal = $_POST['etat_animal'];
    $vet_habitatAnimaux = $_POST['vet_habitatAnimaux'];
  

    $req = $bdd->prepare("UPDATE tous_les_animaux SET  	vet_nourriture_quantite = ? ,
     etat_animal =?, vet_habitatAnimaux = ?  WHERE id_animal= ?") or  die(print_r($bdd->errorInfo()));
    $req->execute(array(
        $vet_nourriture_quantite,
        $etat_animal,
        $vet_habitatAnimaux,
     
        $idanimal
    ));
}

if (
    isset($_POST['vet_gestionHabitat']) && isset($_POST['id_animall'])
    
) {
    $idanimall = $_POST['id_animall']; 
    $vet_gestionHabitat = $_POST['vet_gestionHabitat'];


    $req = $bdd->prepare("UPDATE tous_les_animaux SET  
  vet_gestionHabitat = ?  WHERE id_animal= ?") or  die(print_r($bdd->errorInfo()));
    $req->execute(array(  
        $vet_gestionHabitat,
        $idanimall
    ));
}

?>








<div class="section_mainAnimaux text-center mx-0" id="afficheVetAnimaux" style="display:none; height:358px;">

    <form class=" mt-3  text-center" role="search">
        <input
            class="form-control me-2 "
            id="search-input"
            type="search"
            placeholder="Search..."
            aria-label="Search"
            onkeyup="search(this, '.cardanimal')">

    </form>

    <?php

    $animaux->execute();
    foreach ($animaux as $emplAnimaux) {
    ?>
        <div
            class="cardanimal m-auto border border-light border-5 mt-3 mb-5 mx-5 "
            style=" width:400px; ;height:400px;box-shadow:5px 5px 15px 15px  <?php echo $habitat_color ?>;"
            search_name="<?php echo $emplAnimaux['nom_animal'].$emplAnimaux['race_animal']; ?>">

            <img style="width:388px; max-height:13rem;margin:auto;" src="<?php echo $emplAnimaux['images_animal']  ?>" id="img_modal" class="card-img-top " alt="...">

            <div class="card-bodynomAnimaux bg-success">
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
                <div class="modal fade" style=" font-family: cursive;height:770px; " id="modal_animaux_<?php echo $emplAnimaux['id_animal']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="xxx" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header bg-info text-center">
                                <h1 class="modal-title fs-5" id="modal_animaux_
                                    <?php
                                    echo $emplAnimaux['id_animal'];
                                    ?>
                                    "><b class="text-dark">
                                        <?php
                                        echo $emplAnimaux['nom_animal'];
                                        ?>
                                    </b>
                                </h1>
                                <button type="button" class="btn-close border bg-danger  text-light" 
                                data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="text-center mb-2  " style=" font-family: cursive;">
                                <h4 class="text-success fw-bold ">Report de l'émployé</h4><br>
                                <h5 style=" margin-bottom: 3px; "><b class="text-success">Date : </b> <b class=""><?php echo $emplAnimaux['date']; ?></b></h5>

                                <h5 style=" margin-bottom: 3px;margin-top:3px "><b class="text-success">nourriture : </b> <b class=""><?php echo $emplAnimaux['nourriture_animal']; ?></b></h5>
                                <h5 style=" margin-bottom: 3px;  "><b class="text-primary"> Quantité nourriture : </b> <b class=""><?php echo $emplAnimaux['quantité_nourriture']; ?></b> </h5>

                            </div>
                            <div class="text-center fw-bold border border-2 info-warning">
                                <h4 class="text-danger mt-2 fw-boldfw-bold"> Veterinaire</h4><br>
                                <h5 style=" margin-bottom: 3px; "><b class="text-success">Date : </b> <b class=""><?php echo $emplAnimaux['date']; ?></b></h5>
                                <h5 style=" margin-bottom: 3px;margin-top:3px "><b class="text-success"> Soins santé : </b> <b class=""><?php echo $emplAnimaux['etat_animal']; ?></b></h5>
                                <h5 style=" margin-bottom: 3px;  "><b class="text-primary">Soins habitats : </b> <b class=""><?php echo $emplAnimaux['vet_habitatAnimaux']; ?></b> </h5>
                                <h5 style=" margin-bottom: 3px;margin-top:3px "><b class="text-success">nourriture : </b> <b class=""><?php echo $emplAnimaux['vet_nourriture_quantite']; ?></b></h5>


                            </div>
                            <!--         <p> <button type="button" class="btn-close border bg-danger  text-light" data-bs-dismiss="modal" aria-label="Close"></button></p>
                            <?php /* echo $row['video_galleries']; */ ?>

 -->
                            <!--   <div class="modal-body text-light bg-info" style=" font-family: cursive;"> -->




                            <form class="text-center bg-info" method="POST" action="indexstaff.php">
                                <input type="hidden" name="id_animal" value="<?php echo $emplAnimaux['id_animal'] ?>">
                                <table>
                                    <tr>
                                        <td class=" ">Soin et Santé animaux</td><br>
                                        <td><input class="mx-2 mb-2" type="text" name="etat_animal" placeholder="" required></td>
                                    </tr><br>
                                    <tr>
                                        <td class=" "> habitat animal</td><br>
                                        <td><input class="mx-2 mb-2" type="text" name="vet_habitatAnimaux" placeholder="" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nourriture et quantité proposés </td><br>
                                        <td><input class="mx-2" type="text" name="vet_nourriture_quantite" placeholder="" required></td>
                                    </tr>


                                </table><br><br>

                                <button type='submit' class="text-center border border-3 border-dark btn btn-oultine-success text-light w-50">Inscription</button>


                                <div class="modal-footer bg-info">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                                </div>

                            </form><br><br>



                        </div>
                        <!--  </div> -->
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
                                

                            </div>
                            <div class="modal-body text-light bg-info" style=" font-family: cursive;">

                           
                                <form action="indexstaff.php" method="POST">
                                    <input type="hidden" name="id_animall" value="<?php echo $emplAnimaux['id_animal'] ?>">

                                    <h3>Entretien de son habitat</h3>

                                    <table>

                                        <tr>
                                            <textarea name="vet_gestionHabitat" rows="5" cols="35" id=""></textarea>
                                        </tr>

                                    </table>

                                    <button type="submit" class="btn btn-outline-success">Sauvegarder</button>
                                </form>
                                <?php

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
                <form action="touslesanimaux.php" method="POST">

                    <br>
                    <button type="button" class="btn btn-primary w-50 mb-2 borber borber-2 border-warning " data-bs-toggle="modal" data-bs-target="#modal_commentaires_<?php echo $emplAnimaux['id_animal']; ?>">
                        Gestion de l'habitat
                    </button><br>

                    <button type="button" class="btn btn-outline-success borber borber-2  border-success w-50 mb-2 " data-bs-toggle="modal" data-bs-target="#modal_animaux_<?php echo $emplAnimaux['id_animal']; ?>">
                        Santé et habitats
                    </button>
                    <ul class="list-group list-group-flush " id="list_modal">





                        <!-- Modal -->




                    </ul>
                </form>
            </div><br><br>
            <!--   fin de la partie report -->
        </div>
    <?php
    }
    ?>
    <br>
    <br>
</div>