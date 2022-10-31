<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="../bootstrap.min.css" />
</head>
<body>
     <!-- HEADER -->
     <?php include_once './header.php'?>
      <!-- MAIN -->
    <main>
      <!-- SIGN UP FORM -->
      <form
        action="includes/inscription-inc.php"
        class="p-3 m-5 d-flex flex-column justify-content-center align-items-center"
        method="post"
      >
        <h2 class="mb-5">S'inscrire</h2>
        <div class="form-group mb-3">
          <input
            type="text"
            class="form-control"
            name="username"
            placeholder="Nom d'utilisateur"
           
          />
        </div>
        <div class="form-group mb-3">
          <input
            type="email"
            class="form-control"
            name="email"
            placeholder="Email"
        
          />
        </div>
        <div class="form-group mb-3">
          <input
            type="password"
            class="form-control"
            name="password"
            placeholder="Mot de passe"
           
          />
        </div>
        <div class="form-group">
        <label for="passwordRepeat" class="mb-1" >Confirmez le mot de passe</label>
          <input
            type="password"
            class="form-control"
            name="passwordRepeat"
            placeholder="Mot de passe"
          
          />
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-5">S'inscrire</button>
      </form>
      <div class="text-center w-25 mx-auto">
      <?php 
      // ERROR ALERTS
      if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
          echo "<div class=\"alert alert-danger\" role=\"alert\">
          Remplissez tous les champs !
        </div>";
        }
        if($_GET["error"] == "invalidusername"){
          echo "<div class=\"alert alert-danger\" role=\"alert\">
          Entrez un nom d'utilisateur valide !
        </div>";
        }
        if($_GET["error"] == "invalidEmail"){
          echo "<div class=\"alert alert-danger\" role=\"alert\">
          Entrez une adresse e-mail valide !
        </div>";
        }
        if($_GET["error"] == "passworddontmatch"){
          echo "<div class=\"alert alert-danger\" role=\"alert\">
          Les mots de passe doivent être identiques !
        </div>";
        }
        if($_GET["error"] == "stmtfailed"){
          echo "<div class=\"alert alert-danger\" role=\"alert\">
          Une erreur est survenue, veuillez réessayer !
        </div>";
        }
        if($_GET["error"] == "usernametaken"){
          echo "<div class=\"alert alert-danger\" role=\"alert\">
          Nom d'utilisateur déjà utilisé !
        </div>";
        }
        if($_GET["error"] == "none"){
          echo "<p><div class=\"alert alert-success\" role=\"alert\">
          Vous êtes inscrit !</div></p>";
        }
    }
    ?>
    </div>
    </main>
      <!-- FOOTER -->
    <?php include_once './footer.php' ?>
</body>
</html>