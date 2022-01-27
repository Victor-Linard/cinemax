<?php
    require_once 'PHPScripts/config.php';
    require_once 'PHPScripts/navBar.php';
    $config_db = $CONFIG['database'];
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/favicon/favicon.ico" type="image/x-icon" />

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="JSScripts/launchSwal.js"></script>

    <!-- Title -->
    <title>Cinemax</title>
</head>
<body>
    <?php echo getNavBar($config_db, "navbar-light bg-light border-bottom"); ?>
    <!-- BREADCRUMB -->
    <nav class="bg-dark d-md-none">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Breadcrumb -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                <span class="text-white">
                  Account
                </span>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                <span class="text-white">
                  General
                </span>
                        </li>
                    </ol>

                </div>
                <div class="col-auto">

                    <!-- Toggler -->
                    <div class="navbar-dark">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidenavCollapse" aria-controls="sidenavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </nav>

    <!-- HEADER -->
    <header class="bg-dark pt-9 pb-11 d-none d-md-block">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Heading -->
                    <h1 class="fw-bold text-white mb-2">
                        Account Settings
                    </h1>

                    <!-- Text -->
                    <p class="fs-lg text-white-75 mb-0">
                        Settings for <a class="text-reset"><?php echo $_SESSION['id']; ?></a>
                    </p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </header>

    <!-- MAIN -->
    <main class="pb-8 pb-md-11 mt-md-n6">
        <div class="container-md">
            <div class="row">
                <div class="col-12 col-md-3">
                    <!-- Card -->
                    <div class="card card-bleed border-bottom border-bottom-md-0 shadow-light-lg">
                        <!-- Collapse -->
                        <div class="collapse d-md-block" id="sidenavCollapse">
                            <div class="card-body">
                                <!-- Heading -->
                                <h6 class="fw-bold text-uppercase mb-3">
                                    Profile
                                </h6>
                                <!-- List -->
                                <ul class="card-list list text-gray-700 mb-6">
                                    <li class="list-item active">
                                        <a class="list-link text-reset" href="#general">
                                            General
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <a class="list-link text-reset" href="#security">
                                            Security
                                        </a>
                                    </li>
                                </ul>

                                <!-- Heading -->
                                <h6 class="fw-bold text-uppercase mb-3">
                                    Billing
                                </h6>

                                <!-- List -->
                                <ul class="card-list list text-gray-700 mb-0">
                                    <li class="list-item">
                                        <a class="list-link text-reset" href="billing-plans-and-payment.html">
                                            Plans & Payment
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <a class="list-link text-reset" href="billing-users.html">
                                            Users
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-12 col-md-9">

                    <!-- Card -->
                    <div class="card card-bleed shadow-light-lg mb-6" id="general">
                        <div class="card-header">

                            <!-- Heading -->
                            <h4 class="mb-0">
                                Basic Information
                            </h4>

                        </div>
                        <div class="card-body">

                            <!-- Form -->
                            <form>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label class="form-label" for="first_name">First name</label>
                                            <input class="form-control" id="first_name" type="text" placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label class="form-label" for="last_name">Last name</label>
                                            <input class="form-control" id="last_name" type="text" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email</label>
                                            <input class="form-control" id="email" type="email" placeholder="name@address.com">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        <!-- Button -->
                                        <button class="btn w-100 btn-primary" type="submit">
                                            Save changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card card-bleed shadow-light-lg mb-6" id="security">
                        <div class="card-header">
                            <!-- Heading -->
                            <h4 class="mb-0">
                                Security Information
                            </h4>
                        </div>
                        <div class="card-body">
                            <!-- Current password -->
                            <div class="form-group">
                                <label class="form-label" for="currentPassword">Current Password</label>
                                <input class="form-control" id="currentPassword" type="password">
                            </div>
                            <!-- New password -->
                            <div class="form-group">
                                <label class="form-label" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" type="password">
                            </div>
                            <!-- Confirm password -->
                            <div class="form-group">
                                <label class="form-label" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" type="password">
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-auto">
                                    <!-- Button -->
                                    <button class="btn w-100 btn-primary" type="submit">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text -->
                    <p class="text-center mb-0">
                        <small class="text-muted">If you no longer want to use Cinemax, you can <a style="cursor: pointer;" class="text-danger" onclick="confirmDeleteAccount(<?php echo '\''.$_SESSION['id'].'\''; ?>);">delete your account</a>.</small>
                    </p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </main>
    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>
</html>