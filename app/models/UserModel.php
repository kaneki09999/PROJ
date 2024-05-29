<?php 
namespace App\Models;

class UserModel extends BaseModel {
    private string $table = "users";
    
    public function search() {

    }

    public function addUser(array $data) {
        return parent::insert($data, $this->table);

    }

    public function patch() {

    }

    public function remove() { 

    }

    public function post() {
        
    }

}