<?php
require_once 'config.php';
require_once 'functions.inc.php';
$config_db = $CONFIG['database'];
session_start();

if (isset($_SESSION['id']) && isset($_POST['filmid']) &&  isset($_POST['storeid'])) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config_db['db_address'] .';dbname='.$config_db['db_name'], $config_db['db_user'], $config_db['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $inventoryId = getInventoryId($config_db, $_POST['filmid'], $_POST['storeid']);
    $staffId = getStoreManager($config_db, $_POST['storeid']);
    $customerId = getCustomerIdFromEmail($config_db, $_SESSION['id']);

    $sql = 'INSERT INTO rental(rental_date, inventory_id, customer_id, staff_id) VALUES(NOW(), ?, ?, ?);';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $inventoryId);
    $req->bindParam(2, $customerId);
    $req->bindParam(3, $staffId);
    $req->execute();

    $sql = 'INSERT INTO payment (customer_id, staff_id, rental_id, amount,  payment_date) VALUES(?, ?, LAST_INSERT_ID(), get_customer_balance(?, NOW()), NOW());';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $customerId);
    $req->bindParam(2, $staffId);
    $req->bindParam(3, $customerId);
    $req->execute();
}
exit();