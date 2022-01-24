<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
require_once 'functions.inc.php';
$config_db = $CONFIG['database'];

if (isset($_POST['submitSignUp'])) {
    $email = strtolower($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $db_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host=' . $config_db['db_address'] . ';dbname=' . $config_db['db_name'], $config_db['db_user'], $config_db['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT email FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    if ($req->fetch(PDO::FETCH_ASSOC)) {
        header('Location: ../index.php?mailAlreadyExist');
        exit;
    }

    $sql = 'INSERT INTO customer (first_name, last_name, email, password, create_date) VALUES (?,?,?,?, NOW());';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $_POST['firstName']);
    $req->bindParam(2, $_POST['lastName']);
    $req->bindParam(3, $email);
    $req->bindParam(4, $password);
    if ($req->execute())
        header('Location: ../index.php?accountCreationSuccess');
    else
        header('Location: ../index.php?accountCreationError');

    exit;
}
header('Location : index.php');
exit();