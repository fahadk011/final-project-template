<?php

require '../app/core/Router.php';
require '../app/controllers/Controller.php';
require '../app/controllers/MainController.php';
require '../app/controllers/UserController.php';
require '../app/models/Model.php';
require '../app/models/User.php';

$env = parse_ini_file('../.env');
define('DBHOST', $env['DBHOST']);
define('DBNAME', $env['DBNAME']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
