<?php

namespace ProjetBlog\core;

/**
 * Configuration des constantes du Website
 * à renseigner pour le fonctionnement
 * OBLIGATOIRE POUR LE FONCTIONNEMENT GLOBAL
 * Class Config
 * @package ProjetBlog\core
 */
final class Config
{
    /*
    Informations configurations
    de la base de données
    */
    const
    BDD_HOST = "localhost",
    BDD_NAME = "blog_jean",
    BDD_USER = "root",
    BDD_PASSWORD = "",

    /*
     * Première page d'accueil du site
     */
    MAIN_PAGE = "\"/post/index\"";
}