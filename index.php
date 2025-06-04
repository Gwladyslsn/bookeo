<?php 

define('_ROOTPATH_', __DIR__); // Pour se baser sur le chemin racine 

spl_autoload_register(); // comme ça pas besoin de faire nos require

use App\Controller\Controller;

$controller = new Controller();
$controller->route();


