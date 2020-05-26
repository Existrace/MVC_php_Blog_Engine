<?php

namespace ProjetBlog;

use ProjetBlog\core\Config;
use ProjetBlog\core\Router\Router;
use ProjetBlog\Services as S;

// Genère une constante contenant le chemin vers la racine du projet
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// Appelle le coeur de l'application
try{
    require_once(ROOT . 'core/Model.php');
    require_once(ROOT . 'core/Controller.php');
    require_once(ROOT . 'core/Manager.php');
    require_once(ROOT . 'core/Router.php');
    require_once(ROOT . 'core/Loader.php');
    require_once(ROOT . 'core/Config.php');
}catch(\Exception $e) {
    echo $e->getMessage();
}


try
{
    // Lancement autoloader
    $loader = S\Loader::getInstance();
    $loader->init();
}
catch (\Exception $oE)
{
    echo $oE->getMessage();
}

// Démarre la session pour la connexion admin
session_start();

// Séparation des paramètres pour les mettre dans le tableau $params
$param = explode('/', $_GET['p']);

// DEFINITION DE LA PAGE PAR DEFAUT
$location = Config::MAIN_PAGE;

// Démarre le routeur en définissant une page par défaut
$router = new Router($location);
$router->run($param);



