<main class="mt-5 bg-success section_mainAnimaux text-center mx-0 border border-2 border-primary h-50  " id="afficheVetHabitats" style="display: none;font-family:cursive; ">


    <?php

    $habitats = $bdd->query('SELECT * FROM zoohabitats');

    if (
        isset($_POST['id_habitat'])
    ) {
        $id_habitat = $_POST['id_habitat'];
        $race_animal = $_POST['race_animal'];
        $nom_animal = $_POST['nom_animal'];
        $images_animal = $_POST['images_animal'];
        $video_galleries = $_POST['video_galleries'];
        $description_animal = $_POST['description_animal'];
        $moyenne_age = $_POST['moyenne_age'];
        $poids_moyen = $_POST['poids_moyen'];

        $requete = $bdd->prepare('INSERT INTO tous_les_animaux( 
               id_habitat,
               race_animal,
               nom_animal,
               images_animal,
               video_galleries,
               description_animal,
               moyenne_age,
               poids_moyen)
           VALUES(?,?,?,?,?,?,?,?) ')
            or die(print_r($bdd->errorInfo()));

        $requete->execute(array(
            $id_habitat,$race_animal,
            $nom_animal, $images_animal,
            $video_galleries, $description_animal,
            $moyenne_age,
            $poids_moyen
        ));
    }
   /*  echo '<span class="text-light display-5">card animaux ajouté avec success !!</span>'; */

    ?>

    <h3 class="mt-5  fw-bold text-light">Enregistrer un nouvel animal</h3>

    <form class="form-group  border mt-5 text-center bg-info " action="indexstaff.php" method="POST">

        <fieldset class="mb-3 mt-2">
            <label>Race</label>
            <input name="race_animal"required>
        </fieldset class="mb-3">
        <fieldset class="mb-3">
            <label>Nom de l'animal</label>
            <input name="nom_animal"required>
        </fieldset>
        <fieldset class="mb-3">
            <label>Photo de l'animal</label>
            <input name="images_animal"required>
        </fieldset>

        <fieldset class="mb-3">
            <label> Son Habitat</label>
            <select name="id_habitat">
                <?php

                foreach ($habitats as $habitat) {
                ?>
                    <option value="<?php echo $habitat['id_habitat'] ?>"><?php echo $habitat['nom_habitat'] ?></option>
                <?php } ?>
            </select>
        </fieldset>
        <fieldset class="mb-3">
            <label>Une video de l'animal</label>
            <input name="video_galleries"required>
        </fieldset>
        <fieldset class="mb-3">
            <label>Une description de l'animal</label>
            <input name="description_animal"required>
        </fieldset>
        <fieldset class="mb-3">
            <label>Sa moyenne d'age</label>
            <input name="moyenne_age"required>
        </fieldset>
        <fieldset class="mb-3">
            <label>Son poids moyen</label>
            <input name="poids_moyen"required>
        </fieldset>

        <button class="btn btn-outline-primary border-2 border-success bg-light text-dark mt-5 mb-4" type="submit"> Enregistrer</button>
    </form>
</main>