<?php

// le présent controller sera rangé dans ce namespace :
namespace App\Controllers;

// ne pas oublier ↓↓↓
// on charge le Model approprié

class SecurityController extends CoreController
{

  /**
   * Méthode qui affiche le formulaire de connexion
   *
   * @return void
   */
    public function login()
    {
        $this->show('security/login');
    }
}