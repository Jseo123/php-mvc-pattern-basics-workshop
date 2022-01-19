<?php


include_once "config/constants.php";

// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.

if(isset($_GET["logInAdmin"])){

        require_once(VIEWS . '/admin/admin.php');
    }

 else {
    require_once VIEWS . "main/main.php";
}