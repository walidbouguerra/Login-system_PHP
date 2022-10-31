<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Se connecter</title>
    <link rel="stylesheet" href="./bootstrap.min.css" />
  </head>
  <body>
    <!-- HEADER -->
    <?php include_once './php/header.php'?>
    <!-- MAIN -->
    <main>
      <?php
        //PRINT USERNAME
        if(isset($_SESSION['username'])){
          echo "<h3 class=\"text-center my-5\"> Bonjour ".$_SESSION['username']."</h3>";
        } else {
          //LOGIN FORM
          include_once './php/connexion.php';
        }
      ?>
    </main>
    <!-- FOOTER -->
    <?php include_once './php/footer.php' ?>
  </body>
</html>
