<?php 
namespace Config;

use PDO;
use PDOException;

class Database {
    
    private array $credentials = [

        'host'      => 'localhost',
        'username'  => 'root',
        'password'  => '', 
        'dbname'    => 'objectdb'
    ];

    public function connect() {  
        $con = 'mysql:host='.$this->credentials['host'].';dbanme='.$this->credentials['dbname'];
        try {
            $pdo = new PDO (
                $con,
                $this->credentials['username'],
                $this->credentials['password']
            );  
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}