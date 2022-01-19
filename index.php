<?php


include_once "config/constants.php";

// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.

if (isset($_GET["controller"])) {
    $controller = getControllerPath($_GET["controller"]);
    $fileExists = file_exists($controller);
    if ($fileExists) {
        require_once $controller;
    } else {
        require_once VIEWS . "main/main.php";
    }
} else {
    require_once VIEWS . "main/main.php";
}

function getControllerPath($controller): string
{
    return CONTROLLERS . $controller . "Controller.php";
}
