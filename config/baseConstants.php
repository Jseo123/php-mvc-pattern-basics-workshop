<?php
$documentRoot = getcwd();
//Base path
DEFINE("BASE_PATH", $documentRoot);
//base URL
$uri = $_SERVER["REQUEST_URI"];
if (isset($uri) && $uri !== null){
$uri = substr($uri, 1);
$uri = explode("/", $uri);
$uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
} else {
    $uri = null;
}

define("BASE_URL", $uri);