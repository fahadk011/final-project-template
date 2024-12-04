<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\UserController;

class Router {
    public $urlArray;

    function __construct() {
        $this->urlArray = $this->routeSplit();
        $this->handleRoutes();
    }

    private function routeSplit() {
        $url = strtok($_SERVER['REQUEST_URI'], '?');
        return explode("/", $url);
    }

    private function handleRoutes() {
        if ($this->urlArray[1] === '' || $this->urlArray[1] === 'home') {
            $controller = new MainController();
            $controller->homepage();
        } elseif ($this->urlArray[1] === 'contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new MainController();
            $controller->saveContact();
        } elseif ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'users') {
            $controller = new UserController();
            $controller->getUsers();
        } else {
            http_response_code(404);
            echo "Route not found.";
        }
    }
}
