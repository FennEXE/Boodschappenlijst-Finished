<?php

/* Obsolete, moved to vendor/autoload.php
//router
require 'core/router.php';
require 'database/request.php';

//Partials
//require 'views/partials/nav.php';


//Required for connection
require 'core/database/connection.php';

//Required for making queries to database
require 'core/database/querybuilder.php';
require 'core/items.php';
*/

$config = require 'config.php';
//app::bind('config', require 'config.php');

//Connects to SQL database, located in database/connection.php
$connection = Connection::make($config['database']);
//$connection = Connection::make(app::get('config'['database']));

$query = new MakeQuery($connection);
$Items = $query->selectAll('items', 'Groceries');
$secondItems = $query->selectAll('names', 'Groceries');

// throw exceptions, when SQL error is caused
$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// prevent emulation of prepared statements
$connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

