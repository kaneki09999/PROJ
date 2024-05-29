<?php 
namespace  App\Controllers;

use App\Models\UserModel as Insert;

class AddController extends Insert {

    use extracontroller;

    public  string $firstname;
    public string $middlename;
    public  string $lastname;
    public int $age;
    public string $email;
    public string $contact;
    public string $address;
    public $request;
    public $result;
    

    private array  $data;


    const SUCCESS = 'success';

    public function operations(array $data){
        
        $this->firstname    = $data['first_name'];
        $this->middlename    = $data['middle_name'];
        $this->lastname    = $data['last_name'];
        $this->age          = $data['age'];
        $this->email        = $data['email'];
        $this->contact        = $data['contact'];
        $this->address        = $data['address'];
  

        return $this->addUser($data);
    }

    public static function getErrorResponse(){
        return "Invalid Operations";
    }

}