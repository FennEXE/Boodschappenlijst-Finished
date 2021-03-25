<?php

require 'core/bootstrap.php';


$router = new router();
require 'routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

require Router::load('routes.php')

        ->direct($uri);

