<?php

require 'core/bootstrap.php';


// This works, cleaning it up according to laracasts instructions.
//$router = new router();
//require 'routes.php';

//$uri = trim($_SERVER['REQUEST_URI'], '/');

//require $router->direct($uri);


require Router::load('routes.php')
	->direct(request::uri());



