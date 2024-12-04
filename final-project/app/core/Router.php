<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\AdminController;
use app\controllers\ContactController;
use app\controllers\LoginController;

class Router {

    public $urlArray;

    public function __construct()
    {
        $this->urlArray = $this->routeSplit();
    }

    public function handleRoutes() {
        $urlArray = $this->urlArray;
        $size = count($urlArray);
        $first_path = $urlArray[0];
        $path_fragment = array_slice($urlArray, 1);
        switch ($first_path) {
            case "admin": {
                $this->handleAdminRoutes($path_fragment);
            }
            break;
            case "contact": {
                $this->handleContactRoutes($path_fragment);
            }
            break;
            case "login": {
                $this->handleLoginRoutes($path_fragment);
            }
            break;
            default: {
                $this->handleMainRoutes($path_fragment);
            }
        }
    }

    private function routeSplit() {
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        $pathpos = strpos($url, BASE_URL_PATH);
        $tail = substr($url, $pathpos + strlen(BASE_URL_PATH) );
        return explode("/", $tail);
    }

    protected function handleMainRoutes($path_fragment) {
        $conotroller = new MainController();
        $conotroller->handle($path_fragment);
    }

    protected function handleAdminRoutes($path_fragment) {
        $controller = new AdminController($path_fragment);
        $controller->handle($path_fragment);
    }

    protected function handleContactRoutes($path_fragment) {
        $controller = new ContactController();
        $controller->handle($path_fragment);
    }

    protected function handleLoginRoutes($path_fragment) {
        $controller = new LoginController();
        $controller->handle($path_fragment);
    }
}