<?php 
namespace  App\Controllers;

use App\Controllers\BaseController as Controller;
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
  

        return $this->post($data);
    }

    public function answer(){
        $type = 'POST';

        $response = array(
            'status'    => self::SUCCESS,
            // 'method'    => parent::METHOD[$type],
            'firstname'  => $this->firstname,
            'lastname'  => $this->lastname,
            'age'  => $this->age,
            'email'  => $this->email,
            'contact'  => $this->contact,
            'address'  => $this->address,

  
        );
    
    }
}