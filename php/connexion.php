<form
  action="./php/includes/connexion-inc.php"
  class="p-3 m-5 d-flex flex-column justify-content-center align-items-center"
  method="post"
  >
  <h2 class="mb-5">Se connecter</h2>
  <div class="form-group mb-3">
    <input
      type="text"
      name="username"
      class="form-control"
      placeholder="Nom d'utilisateur/Email"
    />
  </div>
  <div class="form-group mb-5">
    <input
      type="password"
      name="password"
      class="form-control"
      placeholder="Mot de passe"
    />
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
</form>
<div class="text-center w-25 mx-auto">
<?php
    if(isset($_GET["error"])){
  if($_GET["error"] == "emptyinput"){
    echo "<div class=\"alert alert-danger\" role=\"alert\">
    Remplissez tous les champs !
    </div>";
  }
  if($_GET["error"] == "wrongLogin"){
    echo "<div class=\"alert alert-danger\" role=\"alert\">
    Nom d'utilisateur ou mot de passe incorrect !
    </div>";
  }
}
?>
</div>