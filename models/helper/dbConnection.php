<?php
require_once BASE_PATH . "/config/db.php";
function conn(){
    try {
        $conenction = "mysql:host=" . HOST . ";"
        . "dbname=" . DB . ";"
        . "charset=" . CHARSET . ";";

        $options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => FALSE,];
 

$pdo = new PDO($conenction, USER, PASSWORD, $options);
return $pdo;
}
catch(PDOException $e){
require_once VIEWS . "main/main.php";
}
}
