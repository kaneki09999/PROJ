<?php 
namespace App\Models;

use Config\Database;

class BaseModel extends Database {
    private $request;

    

    public function jsonResponse($params){
        header('Content-Type: application/json');             
        $response = json_encode($params, JSON_PRETTY_PRINT);   
        
        return $response; 
    }

    protected function insert(array $data, $table = null){
        $this->connect()->beginTransaction();

        $columns = implode(', ', array_keys($data));

        $placeholders = ':' . implode(', :', array_keys($data)); 
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})"; 
       
        $stmt = $this->connect()->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindParam(':'.$key, $data[$key]);     
        }
        $stmt->execute();
      
        $lastInsertedId = $this->connect()->lastInsertId();

        $response = [
            'status' => 'ok',
            'lastInsertedId' => $lastInsertedId,
        ];

        return $this->jsonResponse($response);
    }

    public function parseRequest(){
        $data = file_get_contents('php://input');
        $this->request = json_decode($data, true);

        return $this->request;
    }

}