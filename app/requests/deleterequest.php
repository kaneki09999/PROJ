<?php 

declare(strict_types = 1);

require dirname(__DIR__).'../../vendor/autoload.php';

use App\Controllers\deleteController;

$obj = new deleteController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id = $_POST['id'];
       $obj->operations($id); 
        header("location: http://localhost/PROJ/public/index.php");
    } catch (TypeError $e) {
        echo $obj::getErrorResponse() . " " . $e->getMessage();
    }
}


