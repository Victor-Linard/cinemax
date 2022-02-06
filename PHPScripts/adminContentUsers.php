<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once './PHPScripts/config.php';
require_once './PHPScripts/functions.inc.php';
require_once './PHPScripts/adminFunctions.inc.php';
$config_db = $CONFIG['database'];
if (!isset($_SESSION['id']) || !isStaff($config_db, $_SESSION['id'])) {
    header('Location: ./index.php');
    exit;
}
$customer = '<div class="header">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-end">
                            <div class="col">
                                <h6 class="header-pretitle">
                                    Utilisateurs
                                </h6>
                                <h1 class="header-title">
                                    Clients
                                </h1>
                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .header-body -->
                </div>
            </div> <!-- / .header -->
            <div class="container-fluid">             
            </div>';