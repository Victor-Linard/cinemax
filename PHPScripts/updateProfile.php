<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
require_once 'functions.inc.php';
$config_db = $CONFIG['database'];
session_start();

$db_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$DB = new PDO('mysql:host=' . $config_db['db_address'] . ';dbname=' . $config_db['db_name'], $config_db['db_user'], $config_db['db_password'], $db_options);
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['generale']) && isset($_SESSION['id']) && isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
    $fn = ucfirst(strtolower(htmlspecialchars($_POST['first_name'])));
    $ln = ucfirst(strtolower(htmlspecialchars($_POST['last_name'])));
    $email = htmlspecialchars(strtolower($_POST['email']));

    if ($fn == getFirstNameFromEmail($config_db, $_SESSION['id']) && $ln == getLastNameFromEmail($config_db, $_SESSION['id']) && $email == $_SESSION['id']) {
        header('Location: ../profile.php?noInformationChange');
        exit;
    }

    if ($email != $_SESSION['id'] && emailAlreadyExist($config_db, $email)) {
        header('Location: ../profile.php?mailAlreadyExist');
        exit;
    }

    $sql = 'UPDATE customer SET first_name = ?, last_name = ?, email = ? WHERE email = ?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $fn);
    $req->bindParam(2, $ln);
    $req->bindParam(3, $email);
    $req->bindParam(4, $_SESSION['id']);
    if ($req->execute())
        header('Location: ../profile.php?accountModificationSuccess');
    else
        header('Location: ../profile.php?accountModificationError');

    exit;
}
elseif (isset($_GET['security']) && isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    if ($_POST['newPassword'] != $_POST['confirmPassword']) {
        header('Location: ../profile.php?confirmPasswordIncorrect');
        exit;
    }

    $sql = 'SELECT password FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $_SESSION['id']);
    $req->execute();
    if ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        if (!password_verify($_POST['currentPassword'], $data['password'])) {
            header('Location: ../profile.php?currentPasswordIncorrect');
            exit;
        }
    }

    $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

    $sql = 'UPDATE customer SET password=? WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $password);
    $req->bindParam(2, $_SESSION['id']);
    if ($req->execute())
        header('Location: ../profile.php?changePasswordSuccess');
    else
        header('Location: ../profile.php?changePasswordError');

    exit;
}
header('Location : ../profile.php');
exit();
