<?php

$userStatement = $mysqlClient->prepare('SELECT * FROM users');
$userStatement->execute();
$users = $userStatement->fetchAll();

$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE is_enabled IS TRUE');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

//  pagination
if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
  $limit = (int) $_GET['limit'];
} else {
  $limit = 100;
}


if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
  $loggedUser = [
    'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    
  ];
}

$RootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] .'/cuisine/';

