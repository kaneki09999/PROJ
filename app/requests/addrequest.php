<?php 

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Controllers\AddController;

// Call the Class
$obj = new AddController();

// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    try {
        // var_dump($data);
       $obj->operations($_POST); // used the method
        

        header("location: http://localhost/OOP/Public/index.php");

        // echo CalculatorController::query(500);
    } catch (TypeError $e) {
        echo $obj::getErrorResponse() . " " . $e->getMessage();
    }

    
}


