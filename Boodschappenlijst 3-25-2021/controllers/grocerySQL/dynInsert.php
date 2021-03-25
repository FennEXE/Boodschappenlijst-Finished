<?php 

$connection2 = connection::make($config['database']);
$query2 = new makeQuery($connection);

//Saves the referer to dynamically return the user back to the last page
$ref = $_SERVER['HTTP_REFERER'];
$lastPage = parse_url($ref, PHP_URL_PATH);

//inserts a new item in the database table.
$query2->dynamicInsert($_REQUEST["table"], ["name" => ucfirst(strtolower($_REQUEST['insertName'])), "number" => "0", "price" => $_REQUEST['insertPrice']]);

//Returns user to last page
header("Location: {$lastPage}");

