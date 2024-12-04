<?php

namespace app\controllers;

class MainController extends Controller {
    public function homepage() {
        $this->returnView('./public/homepage.html');
    }

    public function saveContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            $db = new \PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
            $stmt = $db->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);

            $this->returnJSON(['status' => 'success', 'message' => 'Contact saved successfully']);
        } else {
            $this->returnJSON(['status' => 'error', 'message' => 'Invalid request']);
        }
    }
}
