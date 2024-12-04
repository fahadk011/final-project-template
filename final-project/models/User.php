<?php

namespace app\models;

class User extends Model {
    public function getAllUsers() {
        return $this->query("SELECT * FROM users");
    }
}
