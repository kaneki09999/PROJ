<?php 

declare(strict_types = 1);

require dirname(__DIR__).'../../vendor/autoload.php';

use App\Controllers\AddController;

$obj = new AddController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
       $obj->operations($_POST); 
        header("location: http://localhost/PROJ/public/index.php");

    } catch (TypeError $e) {
        echo $obj::getErrorResponse() . " " . $e->getMessage();
    }

}


