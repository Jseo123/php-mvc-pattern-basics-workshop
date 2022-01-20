<?php
require_once "models/helper/dbConnection.php";
function logRedirect(){
    require_once VIEWS . "admin/admin.php";
}

function logIn(){
    $user = $_POST["login-name"];
    $pass = $_POST["login-pass"];
    $UserArray = getUserArray($user);
    if($UserArray !== []){
$passCheck = password_verify($pass, $UserArray[0]["pass"]);
if ($passCheck === true){
    session_start();
    $_SESSION["admin"] = $UserArray[0]["id"];
    require_once VIEWS . "admin/adminDashboard.php";
} else {
    $faliedLog = true;
    require_once VIEWS . "admin/admin.php";
}
    } else {
        $failedLog = true;
        require_once VIEWS . "admin/admin.php";
    }
}

function getUserArray($userName){
    $query = conn()->prepare("SELECT * FROM adminusers WHERE  user='$userName' OR email='$userName'");
try {
    $query->execute();
    $UserArray = $query->fetchAll();
    return $UserArray;
}
catch (PDOException $e){
    return [];
}

}

function failedLog(){
    echo "<p class='alert alert-danger'>Either username or password incorrect. Please try again.</p>";
}

function sessionCheck(){
    if (!isset($_SESSION["admin"])){
  $accessDenied = true;
  require_once VIEWS . "admin/admin.php";
    }
}

function accessDenied(){
    echo "<p class='alert alert-danger'>.Acess denied. Please log in.</p>";
}

function logOut(){

        session_start();
    
        $_SESSION = array();
    
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    
        session_destroy();
        require_once VIEWS . "admin/admin.php";
}