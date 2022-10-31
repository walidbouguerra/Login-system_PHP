<?php 
// GET SIGN UP FORM INFORMATIONS
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    require_once 'database-inc.php';
    require_once 'functions-inc.php';

    //ERROR HANDLERS
    if (emptyInput($username, $email, $password, $passwordRepeat) !== false) {
        header('location: ../inscription.php?error=emptyinput');
        exit();
    }

    if (invalidUsername($username) !== false) {
        header('location: ../inscription.php?error=invalidusername');
        exit();
    }

    if (invalidEmail($email) !== false) {
        header('location: ../inscription.php?error=invalidemail');
        exit();
    }
    if (passwordMatch($password, $passwordRepeat) !== false) {
        header('location: ../inscription.php?error=passworddontmatch');
        exit();
    }
    if (usernameExists($conn, $username, $email) !== false) {
        header('location: ../inscription.php?error=usernametaken');
        exit();
    }

    createUser($conn, $username, $email, $password);

} else {
    header('location: ../inscription.php');
    exit();
}
