<?php

// On indique le namespace dans lequel est contenue la classe CoreController
namespace App\Controllers;

class CoreController {

    /**
     * Méthode permettant d'afficher les views
     * Le paramètre $viewName attendu est le nom de la view
     * Le paramètre $viewData attendu est un tableau de données. 
     * Par défaut, on envoie un tableau vide
     */
    protected function show($viewName, $viewData = [])
    {             
        // On donne la possibilité à la méthode show() d'accéder à $router qui est définie dans le contexte global grâce au mot-clé global
        global $router;

        // On récupère le nom de la page
        $viewData['pageName'] = $viewName;

        // BONUS
        // Juste avant l'inclusion des views, on demande à PHP de générer une variable pour chaque élément dans $viewData  
        extract($viewData);

        require_once __DIR__ . '/../Views/layout/header.tpl.php';
        require_once __DIR__ . '/../Views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../Views/layout/footer.tpl.php';    
    }
}