<?php

/* PAS ENCORE UTILE */
namespace ProjetBlog\Services;

/**
 * Permet de sécuriser les saisies utilisateurs
 * Class Input
 * @package ProjetBlog\Services
 */
class Input
{
    /**
     * @param $input
     * @return string
     */
    public static function clean($input){
        $input = htmlspecialchars($input);
        return htmlentities($input, ENT_QUOTES, "UTF-8");
    }


    /**
     * @param $input
     * @return string
     */
    public static function get($input) {

        if(isset($_POST[$input])) {

            return self::clean($_POST[$input]);

        }elseif (isset($_GET[$input])) {

            return self::clean($_GET[$input]);

        }
    }
}