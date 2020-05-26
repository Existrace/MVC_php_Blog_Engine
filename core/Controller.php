<?php

/*
 * Contrôleur de base
*/
abstract class Controller {

    /*
     * Fonction permettant la rendu des vues
     */
    public function render($view, $data = []) {
        extract($data);

        // Démarre le buffer de sortie pour le chargement des vues
        ob_start();

        require_once(ROOT.'app/views/'.strtolower(get_class($this)).'/'.$view.'.php');

        /** @var string $content */
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT.'/app/views/layout/default.php');

    }
}