<?php
//CHECK IF FORM INFORMATIONS ARE CORRECT
function emptyInput($username, $email, $password, $passwordRepeat) {
    $result;
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $passwordRepeat) {
    $result;
    if($password !== $passwordRepeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//CHECK IF USERNAME EXISTS
function usernameExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../inscription.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else{
        	$result = false;
            return $result;
    }

    mysqli_stmt_close($stmt);

    
}

//CREATE USER FUNCTION
function createUser($conn, $username, $email, $password) {
    $sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../inscription.php?error=stmtfailed');
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../inscription.php?error=none');
    exit();

}


// LOGIN FUNCTIONS
function emptyInputLogin($username,  $password) {
    $result;
    if (empty($username) ||  empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
    $usernameExists = usernameExists($conn, $username, $username);

    if ($usernameExists === false) {
        header('location: ../../index.php?error=wrongLogin');
        exit();
    }
    
    $pwdHashed = $usernameExists['pwd'];
    $checkPwd = password_verify($password, $pwdHashed);
    if ($checkPwd === false) {
        header('location: ../../index.php?error=wrongLogin');
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["username"] = $usernameExists['username'];
        header('location: ../../index.php');
        exit();
    }
}