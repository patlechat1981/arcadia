<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia</title>
    <link rel="stylesheet" href="./assets/CSS/style.css">
    <link rel="stylesheet" href="./assets/CSS/bootstrap.min.css">
    <?php

    $bdd = include('config/db_connection.php');
    
    ?>

</head>

<body>

    <div class="menu">
        <?php
         if(useradmin -> role == 'veterinaire') {
            ?>
                <form>
                    <input type='hidden' name='page' value='anim'>
                    <button type='submit'>animali</button>
                </form>
                
                <form>
                    <input type='hidden' name='page' value='habitat'>
                    <button type='submit'>habitat</button>
                </form>
            <?php
         }  else if  (useradmin-> role == 'employe'){
            ?>
               <form>
                    <input type='hidden' name='page' value='animali'>
                    <button type='submit'>animali</button>
                </form>
                
                <form>
                    <input type='hidden' name='page' value='servizi'>
                    <button type='submit'>servizi</button>
                </form>
            <?php
         }
         else (useradmin-> ruolo == 'administrateur') {
            ?>
               <form>
                    <input type='hidden' name='page' value='utenti'>
                    <button type='submit'>utenti</button>
                </form>
                
                <form>
                    <input type='hidden' name='page' value='info'>
                    <button type='submit'>modifica testi sito</button>
                </form>
            <?php
         }
        ?>
    </div>

    <div class="main">
        <?php if(page == 'animali') {
            include('admin_animali.php');
        }
        ?>

        <?php if(page == 'habitat') {
            include('templates/admin/admin_habitat.php');
        }
        ?>

        <?php if(page == 'servizi') {
            include('templates/admin/admin_servizi.php');
        }
        ?>

        <?php if(page == 'utenti') {
            include('templates/admin/admin_utenti.php');
        }
        ?>

        <?php if(page == 'info') {
            include('templates/admin/admin_info.php');
        }
        ?>

    </div>
   
</body>

</html>