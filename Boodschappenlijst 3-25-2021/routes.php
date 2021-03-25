<?php

$router->get('', 'controllers/index.php');
$router->get('index', 'controllers/index.php');
$router->get('test', 'controllers/test.php');
$router->get('groceries', 'controllers/groceries.php');
$router->post('dynDelete', 'controllers/grocerySQL/dynDelete.php');
$router->post('dynUpdate', 'controllers/grocerySQL/dynUpdate.php');
$router->post('dynInsert', 'controllers/grocerySQL/dynInsert.php');

//var_dump($router->routes);