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
        print_r($UserArray);
$passCheck = password_verify($pass, $UserArray[0]["pass"]);
    } else {
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