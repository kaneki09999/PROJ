<?php 
namespace Config;

use PDO;
use PDOException;

class Database {
    
    private array $credentials = [
        'host'      => 'localhost',
        'username'  => 'root',
        'password'  => '', 
        'database'    => 'objectdb'
    ];
    public function connect(){  
        $con = 'mysql:host='.$this->credentials['host'].';dbname='.$this->credentials['database'];
        try {
            $pdo = new PDO (
                $con,
                $this->credentials['username'],
                $this->credentials['password']
            );  
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo; 

        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

}

?>