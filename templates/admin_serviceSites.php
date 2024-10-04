<!-- 
<main class="section_mainAnimaux text-center mx-0 border border-3 border-dark " id="afficheAdminServices" style="display: none;">
  <h1>Admin service</h1>
</main> -->
<?php
if (
    isset($_POST['nom_service']) && isset($_POST['description_service']) &&
    isset($_POST['images_services']) &&  isset($_POST['id_services'])
) {
    $nom_service = $_POST['nom_service'];
    $description_service = $_POST['description_service'];
    $images_services = $_POST['images_services'];
    $id_services = $_POST['id_services'];

    $req = $bdd->prepare("UPDATE service_zoo SET nom_service = ?,description_service=?,images_services=?
     WHERE id_service =? ")or die(print_r($bdd->errorInfo()));
    $req->execute(array($nom_service, $description_service, $images_services, $id_services));
}

$services = $bdd->query('SELECT * FROM service_zoo');
?>

<main class="section_mainAnimaux text-center mx-0 border border-3 border-danger " id="afficheAdminServices" style="display:none ;">
    <form class=" mt-3  text-center" role="search">
        <input
            class="form-control me-2 "
            id="search-input"
            type="search"
            placeholder="Search..."
            aria-label="Search"
            onkeyup="search(this, '.cardservice')">
    </form>
    <?php

    foreach ($services as $service) {
    ?>
        <div
            class="cardservice m-auto mt-3 mb-5 mx-5"
            style="background-color: white;padding:15px;"
            search_name="<?php echo $service['nom_service']; ?>">
            <form action="" method="POST">
                <input type="hidden" name="id_services" value="<?php echo $service['id_service'] ?>">
                <label>Nom</label>
                <input name="nom_service" value="<?php echo $service['nom_service'];   ?>" />
                <br />
                <label>Description</label>
                <textarea  rows="3" cols="40" class="mt-5 nb-5" name="description_service"><?php echo $service['description_service'];   ?></textarea>
                <br />
                <img class="w-50 h-50" src="<?php echo $service['images_services'] ?>" alt="">
                <label>Image</label>
                <input name="images_services" value="<?php echo $service['images_services'];   ?>" />
                <div>
                    <button type=" submit" class="btn btn-secondary" data-bs-dismiss="modal">modifier</button>

                </div>
            </form>
        </div>

    <?php
    }
    ?>
    <br>
    <br>
</main>