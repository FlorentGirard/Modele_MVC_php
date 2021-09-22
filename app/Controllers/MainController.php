<?php

// On indique le namespace dans lequel est contenue la classe MainController
namespace App\Controllers;

// On importe le model dont on a besoin
use App\Models\Product;

class MainController extends CoreController
{
    /**
     * Route : "home"
     * URL : "/"
     *
     * @param [] $params
     * @return void
     */
    public function home()
    {
        $this->show('main/home');
    }
}