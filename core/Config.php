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
    (laisser champs vides si aucune base de données n'est utilisée)
    */
    const
    BDD_HOST = "",
    BDD_NAME = "",
    BDD_USER = "",
    BDD_PASSWORD = "",

    /*
     * Titre du site
     */
    SITE_TITLE = "Hello World",

    /*
     * Première page d'accueil du site
     */
    /*MAIN_PAGE = "/test/index/";*/
    MAIN_PAGE = "/test/index";
}