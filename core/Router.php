<?php

namespace ProjetBlog\core\Router;

use Post;

/**
 * Class Router
 */
class Router
{

    private string $location;

    public function __construct()
    {
        // Permet les constructeurs multiples
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    /**
     * Permet de définir une location par défaut à la construction de l'objet
     * @param $location
     */
    public function __constructWithLocation($location) {
        $this->setDefaultLocation($location);
    }

    /**
     * @param array $param
     */
    public function run(array $param) {

        // Si au moins un paramètre existe
        if ($param[0] != "") {
            // Sauvegarde le premier paramètre dans controller
            // ucfirst met la première lettre en majuscule
            $controller = ucfirst($param[0]);

            // Sauvegarde le deuxième paramètre dans $action
            //S'il existe, sinon index
            $action = isset($param[1]) ? $param[1] : 'index';


            try{
                if(!file_exists(ROOT . 'app/controllers/' . $controller . '.php')) {
                    throw new \Exception();
                }else{

                    // Appelle le contrôleur en ayant vérifié s'il existait
                    require_once(ROOT . 'app/controllers/' . $controller . '.php');

                    // Instanciation du contrôleur
                    $controller = new $controller();

                    // Vérifie si la méthode existe dans le contrôleur concerné
                    if (method_exists($controller, $action)) {
                        unset($param[0]);
                        unset($param[1]);

                        // On appelle la méthode
                        call_user_func_array([$controller, $action], $param);
                        //$controller->$action();

                    } else {
                        // On envoie le code réponse 404
                        http_response_code(404);
                        require_once("app/views/404page.php");
                    }
                }
            }catch(\Exception $e) {
                // On envoie le code réponse 404
                http_response_code(404);
                require_once("app/views/404page.php");
            }

        } else {
           // Si aucun paramètre n'est défini
            // Alloue une page par défaut à l'accueil du site
            header("LOCATION:". $this->location);

        }
    }

    /**
     * Permet de définir le paramètre de la première page par défaut
     * @param $location
     */
    public function setDefaultLocation($location) {
        // Permet de définir la première page qui sera appelé par défaut
        $this->location = $location;
    }

}