<?php

/*
 * Cette classe est la base de tous les managers,
 * où toutes les méthodes propres à tous se trouvent ici
 */
abstract class Manager
{
    /* Attribut */
    protected PDO $bdd;

    /* Constructeur */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Setter permettant de récupérer l'objet PDO préalablement instancié
     * appellé lors du constructeur
     * Permet de ne pas définir à chaque fois cette méthode dans tous les managers
     * @param PDO $db
     */
    protected function setDb(PDO $db)
    {
        $this->bdd = $db;
    }
}