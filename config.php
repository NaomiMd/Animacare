<?php
define("_ROOT_", __DIR__);
define("BASE_URL", "http://localhost/Animacare/");

function generateLink($path)
{
    return BASE_URL . $path;
}


?>