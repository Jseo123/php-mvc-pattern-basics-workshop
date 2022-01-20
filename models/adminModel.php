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