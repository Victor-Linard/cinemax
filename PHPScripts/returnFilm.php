<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
require_once 'functions.inc.php';
$config_db = $CONFIG['database'];
session_start();

if (isset($_SESSION['id']) && isset($_GET['inventoryId'])) {
    $customerId = getCustomerIdFromEmail($config_db, $_SESSION['id']);
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config_db['db_address'] .';dbname='.$config_db['db_name'], $config_db['db_user'], $config_db['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT rental_id FROM rental WHERE inventory_id = ? AND customer_id = ? AND return_date IS NULL INTO @rentID;";
    $req = $DB->prepare($sql);
    $req->bindParam(1, $_GET['inventoryId']);
    $req->bindParam(2, $customerId);
    if ($req->execute()) {
        $sql = "SELECT @rentID;";
        $req = $DB->prepare($sql);
        $req->execute();
        if ($rentId = $req->fetch(PDO::FETCH_ASSOC)) {
            $sql = 'UPDATE rental SET return_date = NOW() WHERE rental_id = @rentID;';
            $req = $DB->prepare($sql);
            $req->execute();
            header('Location: ../profile.php?current_rentals&returnFilmSuccess');

            //header('Location : ../profile.php?current_rent&returnFilmError');

            exit();
        }
    }
}
