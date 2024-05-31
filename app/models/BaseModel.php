<?php 
namespace App\Models;

use Config\Database;
use PDO;
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
            'status'            => 'ok',
            'lastInsertedId'    => $lastInsertedId,
        ];
        return $this->jsonResponse($response);
    }

    public function parseRequest(){
        $data = file_get_contents('php://input');
        $this->request = json_decode($data, true);
        return $this->request;
    }

    protected function update(array $data, $search_id, $table = null){
        $setClause = '';
        $placeholders = [];
        foreach ($data as $column => $value) {
            $setClause .= "{$column} = :{$column}, ";
            $placeholders[":{$column}"] = $value;
        }
        $setClause = rtrim($setClause, ', ');  
        $sql = "UPDATE {$table} SET {$setClause} WHERE id = :id";
        $placeholders[':id'] = $search_id;
    
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute($placeholders);
        return $result;
    }

    public function delete($id, $table){
        $conn = $this->connect();
        $sql = "DELETE FROM {$table} WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function find($search, $table) {
        $conn = $this->connect();

        $sql = "SELECT * FROM {$table} WHERE first_name LIKE :search
        OR last_name LIKE :search OR age LIKE :search OR middle_name LIKE :search";
        $sth = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $sth->bindParam(':search', $searchTerm, PDO::PARAM_STR);

        $sth->execute();
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}