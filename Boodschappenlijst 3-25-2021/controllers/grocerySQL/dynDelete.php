<?php 

$connection2 = connection::make($config['database']);
$query2 = new makeQuery($connection);

//Saves the referer to dynamically return the user back to the last page
$ref = $_SERVER['HTTP_REFERER'];
$lastPage = parse_url($ref, PHP_URL_PATH);

//deletes the selected name from the database table
$query2->dynamicDelete($_REQUEST["table"], "name", ucfirst(strtolower($_REQUEST['deleteName'])));

//Returns user to last page
header("Location: {$lastPage}");