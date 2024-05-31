<?php

declare(strict_types = 1);

require dirname(__DIR__).'../../vendor/autoload.php';

use App\Controllers\updateController;

$obj = new updateController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    try {
        $param = [
            'first_name'    => $_POST['first_name'],
            'middle_name'   => $_POST['middle_name'],
            'last_name'     => $_POST['last_name'],
            'age'           => $_POST['age'], 
            'email'         => $_POST['email'], 
            'address'       => $_POST['address'],    
            'contact'       => $_POST['contact'],    
        ];

       $obj->operations($param, $id); 
        
        header("location: http://localhost/PROJ/public/index.php");

    } catch (TypeError $e) {
        echo $obj::getErrorResponse() . " " . $e->getMessage();
    }
}


