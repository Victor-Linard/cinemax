<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'PHPScripts/config.php';
require_once 'PHPScripts/functions.inc.php';
require_once 'PHPScripts/adminFunctions.inc.php';
require_once 'PHPScripts/adminContentStore.php';
$config_db = $CONFIG['database'];
if (!isset($_SESSION['id'])) {
    header('Location: ./index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets_dashkit/favicon/favicon.ico" type="image/x-icon"/>

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="./assets_dashkit/css/libs.bundle.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets_dashkit/css/theme.bundle.css" />
    <!-- Vendor JS -->
    <script src="./assets_dashkit/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets_dashkit/js/theme.bundle.js"></script>
    <!-- Title -->
    <title>Cinemax</title>
</head>
<body>
    <!-- NAVIGATION -->
    <nav class="navbar navbar-vertical fixed-start navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="./admin.php?allStore">
                <h2>Cinemax</h2>
            </a>

            <!-- User (xs) -->
            <div class="navbar-user d-md-none">

                <!-- Dropdown -->
                <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm">
                            <i class="fs-2 fe fe-user lar"></i>
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarIcon">
                        <a href="./index.php" class="dropdown-item">Cinemax</a>
                        <a href="./PHPScripts/logout.php" class="dropdown-item">Déconnexion</a>
                    </div>

                </div>

            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">

                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge input-group-reverse">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </form>

                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarDashboards">
                            <i class="fe fe-layout"></i> Dashboards
                        </a>
                        <div class="collapse show" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="./admin.php?allStore" class="nav-link">
                                        Tous les magasins
                                    </a>
                                </li>
                                <?php echo listAllStore($config_db); ?>
                            </ul>
                        </div>
                    </li>
                </ul>

                <!-- Push content down -->
                <div class="mt-auto"></div>

                <!-- User (md) -->
                <div class="navbar-user d-none d-md-flex" id="sidebarUser">
                    <!-- Dropup -->
                    <div class="dropup">
                        <!-- Toggle -->
                        <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fs-2 fe fe-user lar"></i>
                        </a>

                        <!-- Menu -->
                        <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                            <a href="./index.php" class="dropdown-item">Cinemax</a>
                            <a href="./PHPScripts/logout.php" class="dropdown-item">Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div> <!-- / .navbar-collapse -->

        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="main-content">
    <?php
    if (isset($_GET['allStore']))
        echo constructStoreDashBoard($config_db);
    foreach (getStoreList($config_db) as $store)
        if (isset($_GET['store_'.$store]))
            echo constructStoreDashBoard($config_db, $store);
    ?>
    </div><!-- / .main-content -->

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>


</body>
</html>