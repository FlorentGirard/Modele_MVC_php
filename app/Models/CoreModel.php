<?php

// On indique le namespace dans lequel est contenue la classe CoreModel
namespace App\Models;

/**
* Tous les models de notre projet récupèreront les propriétés et les méthodes de cette classe via l'héritage => extends
*/
class CoreModel
{
    
    /**
    * Model id
    */
    protected $id;

    /**
     * Get model id
     */ 
    public function getId()
    {
        return $this->id;
    }
}