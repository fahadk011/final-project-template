<?php

namespace app\controllers;

use app\models\User;

class UserController extends Controller {
    public function getUsers() {
        $userModel = new User();
        $users = $userModel->getAllUsers();
        $this->returnJSON($users);
    }
}
