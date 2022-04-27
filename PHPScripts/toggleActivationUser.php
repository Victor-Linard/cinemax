<?php
require_once 'config.php';
require_once 'functions.inc.php';
$config_db = $CONFIG['database'];
session_start();

if (isset($_POST['action']) && isset($_SESSION['id']) && isStaff($config_db, $_SESSION['id'])) {
    $db_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host=' . $config_db['db_address'] . ';dbname=' . $config_db['db_name'], $config_db['db_user'], $config_db['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $userToToggle = intval($_POST['userToToggle']);
    if (($_POST['table'] != "customer" && $_POST['table'] != "staff") || !is_int($userToToggle)) {
        header("Location: logout.php");
        exit(0);
    }

    $state = $_POST['action'] == "activateUser" ? 1 : 0;
    $tableId = $_POST['table'] == "staff" ? 'staff_id' : 'customer_id';

    $sql = 'UPDATE '.$_POST['table'].' SET active='.$state.' WHERE '.$tableId.'=?;';
    echo $sql;
    $req = $DB->prepare($sql);
    $req->bindParam(1, $_POST['userToToggle']);
    $req->execute();
    if ($req->rowCount() == 1)
        echo 'success';
    else
        echo 'error';
}
exit();