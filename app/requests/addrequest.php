<?php 

declare(strict_types = 1);

require dirname(__DIR__).'/../vendor/autoload.php';

use App\Controllers\AddController;

$obj = new AddController();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        // var_dump($data);
       $obj->operations($_POST); // used the method
        
        echo $obj->answer();

        header("location: http://localhost/OOP/Public/index.php");

        // echo CalculatorController::query(500);
    } catch (TypeError $e) {
        echo $obj::getErrorResponse() . " " . $e->getMessage();
    }


}
