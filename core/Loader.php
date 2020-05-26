<?php

namespace ProjetBlog\Services;

/**
 * Class Loader
 * Classe Singleton qui permet d'autocharger les classes
 * @package ProjetBlog\Services
 */
class Loader
{
    protected static Loader $instance;

    protected function __construct() {}
    protected function __clone() {}

    /**
     * Instancie la classe en elle-même (singleton)
     * @return Loader
     */
    public static function getInstance() {
        // Si la classe n'a pas encore été instanciée
        if(!isset(self::$instance)) {
            // La classe s'instancie elle-même
            return self::$instance = new self();
        }
    }

    public function init()
    {
        // Register the loader method
        spl_autoload_register(array(__CLASS__, '_loadClasses'));
    }

    private function _loadClasses($class)
    {
        /* Pas meilleure solution pour l'instant */
        $paths = array(
            'app/models/Manager',
            'app/models/Entity',
            'Services/'
        );
        foreach($paths as $path) {
            $file = $path . '/' . $class . '.php';
            if (is_file($file))
                require_once $file;
        }

    }

}