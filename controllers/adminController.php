<?php

require_once MODELS . "adminModel.php";
$action = "";
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
} else {
    require_once VIEWS . "main/main.php";
}

if (function_exists($action)){
call_user_func($action);
} else {
    require_once VIEWS . "main/main.php";
}



//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */


/**
 * This function calls the corresponding model function and includes the corresponding view
 */


/**
 * This function includes the error view with a message
 */
function error()
{
    require_once VIEWS . "/main/main.php";
}
