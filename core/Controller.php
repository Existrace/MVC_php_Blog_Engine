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

        // Le fichier à inclure peut être soit un .php, soit un .html
        if(file_exists(ROOT.'app/views/'.strtolower(get_class($this)).'/'.$view.'.php')) {
            require_once(ROOT.'app/views/'.strtolower(get_class($this)).'/'.$view.'.php');
        }elseif(file_exists(ROOT.'app/views/'.strtolower(get_class($this)).'/'.$view.'.html')) {
            require_once(ROOT.'app/views/'.strtolower(get_class($this)).'/'.$view.'.html');
        }


        /** @var string $content */
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT.'/app/views/layout/default.html');

    }
}