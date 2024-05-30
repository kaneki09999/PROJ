<?php
namespace App\Controllers;

use App\Models\UserModel as Insert;

class deleteController extends Insert {
    use extracontroller;



    public function operations($id) {
        return $this->remove($id);
    }

    public static function getErrorResponse(){
        return "Invalid Operations";
    }
}
