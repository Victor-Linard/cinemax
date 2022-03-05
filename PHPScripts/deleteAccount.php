<?php
require_once 'config.php';
require_once 'functions.inc.php';
$config_db = $CONFIG['database'];
session_start();

if (isset($_SESSION['id'])) {
    $db_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host=' . $config_db['db_address'] . ';dbname=' . $config_db['db_name'], $config_db['db_user'], $config_db['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE customer SET active=0 WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $_SESSION['id']);
    $req->execute();
    if ($req->rowCount() == 1)
        header('Location: ./logout.php?redirect=accountDeleteSuccess');
    else
        header('Location: ./logout.php?redirect=accountDeleteError');
}
exit();