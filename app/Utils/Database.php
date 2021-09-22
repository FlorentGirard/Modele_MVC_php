<?php

// On indique le namespace dans lequel est contenue la classe Database
namespace App\Utils;

// On a besoin de PDO pour se connecter à la BDD, donc on l'importe grâce à use
use \PDO;

class Database {
    /** @var PDO */
    private $dbh;
    private static $_instance;
    
    private function __construct() {
        // Récupération des données du fichier de config (config.ini ici)
        $configData = parse_ini_file(__DIR__ . '/../config.ini');
            // La fonction parse_ini_file() analyse le fichier et retourne un array associatif
            // dump($configData);
            // On obtient :
            /*
                $configData = [
                    'DB_HOST' => 'la donnée associée dans config.ini',
                    'DB_USERNAME' => 'la donnée associée dans config.ini',
                    'DB_PASSWORD' => 'la donnée associée dans config.ini',
                    'DB_NAME' => 'la donnée associée dans config.ini',
                ];
            */
        
        // On essaie d'établir la connexion à la BDD avec les données du fichier config.ini
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                // On indique qu'on souhaite afficher les erreurs SQL à l'écran :
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) 
            );
        }
        // Si la connexion à la BDD est impossible
        // On lève une exception (exception = manière de traiter les erreurs en POO)
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }
    
    // La seule méthode dont on a besoin
    // Pour l'utiliser dans les models, on va avoir besoin de retenir la syntaxe : Database::getPDO()
    public static function getPDO() {
        // Si pas d'instance, on en crée une
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        // on retourne la propriété $dbh de la classe PDO contenant la connexion à la BDD
        return self::$_instance->dbh;
    }
}