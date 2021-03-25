<?php 

$connection2 = connection::make($config['database']);
$query2 = new makeQuery($connection);

//Saves the referer to dynamically return the user back to the last page
$ref = $_SERVER['HTTP_REFERER'];
$lastPage = parse_url($ref, PHP_URL_PATH);

//Updates the selected name in the database table to a new price.
$query2->dynamicUpdate($_REQUEST["table"], "price", $_REQUEST['updatePrice'], "name", ucfirst(strtolower($_REQUEST['updateName'])));

//Returns user to last page
header("Location: {$lastPage}");



