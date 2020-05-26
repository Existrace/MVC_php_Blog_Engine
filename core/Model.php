<?php

/*
    Cette classe sert à créer une instance de PDO
    Pour être appellée dans les contrôleurs
    pour avoir accès à la base de données
*/

use ProjetBlog\core\Config;

class Model
{
    public static PDO $myBd;
    /* Attributs propres à la connexion de la base de données
    Utilisation des constantes de config
    */
    private static string $_host = Config::BDD_HOST;
    private static string $_bdd = Config::BDD_NAME;
    private static string $_user = Config::BDD_USER;
    private static string $_password = Config::BDD_PASSWORD;

    /**
    Cette méthode a besoin d'être appllée (sans instantiation de la classe)
    pour avoir accès à la base de données
     * @return PDO
     */
    static function getPdo()
    {
        try {
            self::$myBd = new PDO("mysql:host=" . self::$_host . ";dbname=" .
                self::$_bdd, self::$_user, self::$_password);
            self::$myBd->query("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            die("Erreur Bdd : " . $e->getMessage());
        }

        return self::$myBd;
    }


}