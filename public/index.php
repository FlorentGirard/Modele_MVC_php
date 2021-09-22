<?php

// POINT D'ENTRÉE UNIQUE : 
// FrontController

/* ------------
---- DEBUG ----
-------------*/

// affiche toutes les erreurs
// 💀 environnement DEV uniquement
// 💀 à ne pas utiliser en PROD
@ini_set('display_errors', 1); // affiche les erreurs à l'écran
@ini_set('display_startup_errors', 1); // affiche les erreurs de démarrage PHP
@error_reporting(E_ALL); // affiche tous les types d'erreurs

// inclusion des dépendances via Composer
// autoload.php permet de charger d'un coup toutes les dépendances installées avec composer
// mais aussi d'activer le chargement automatique des classes (convention PSR-4)
require_once '../vendor/autoload.php';

/* ------------
--- SESSION ---
-------------*/

// on créé une session (ou restaure celle trouvée sur le serveur), grâce à la méthode session_start()
// on pourra ainsi se servir de la variable $_SESSION dans tous les controllers
session_start();

/* ------------
--- ROUTAGE ---
-------------*/


// création de l'objet router
// Cet objet va gérer les routes pour nous, et surtout il va 
$router = new AltoRouter();

// le répertoire (après le nom de domaine) dans lequel on travaille est celui-ci
// Mais on pourrait travailler sans sous-répertoire
// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
}
// sinon
else {
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
}

// -----------------------------------------------
// CONNEXION
// -----------------------------------------------

$router->map(
    'GET',
    '/login',
    [
        'method' => 'login',
        'controller' => '\App\Controllers\SecurityController'
    ],
    'security-login'
);

$router->map(
    'POST',
    '/login',
    [
        'method' => 'loginPost',
        'controller' => '\App\Controllers\SecurityController'
    ],
    'security-login-post'
);

$router->map(
    'GET',
    '/logout',
    [
        'method' => 'logout',
        'controller' => '\App\Controllers\SecurityController'
    ],
    'security-logout'
);

// -----------------------------------------------
// HOMEPAGE
// -----------------------------------------------

$router->map(
    'GET', 
    '/',   
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController' 
    ],
    'main-home' 
);

// -----------------------------------------------
// UTILISATEURS
// -----------------------------------------------

// ******
// [C]RUD
// ******

$router->map(
    'GET',
    '/users/create',
    [
        'method' => 'create',
        'controller' => '\App\Controllers\AppUserController'
    ],
    'app-user-create'
);

$router->map(
    'POST',
    '/users/create',
    [
        'method' => 'createPost',
        'controller' => '\App\Controllers\AppUserController'
    ],
    'app-user-create-post'
);


/* -------------
--- DISPATCH ---
--------------*/


$match = $router->match(); 
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
$dispatcher->dispatch();