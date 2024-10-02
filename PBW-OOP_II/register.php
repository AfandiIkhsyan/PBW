<?php
session_start();
require_once 'config/database.php';
require_once 'controllers/AuthController.php';

$database = new Database();
$db = $database->getConnection();
$authController = new AuthController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController->register($_POST['username'], $_POST['password'], $_POST['role']);
}

include 'views/register.php';
?>
