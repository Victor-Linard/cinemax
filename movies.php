<?php
include("./PHPScripts/functions.inc.php");
require "./PHPScripts/config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/favicon/favicon.ico" type="image/x-icon"/>

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css"/>

    <!-- Libs CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css"/>

    <!-- Title -->
    <title>Cinemax</title>
</head>
<body class="bg-light">

<!-- MODALS -->
<!-- Signup: Horizontal  -->
<div class="modal fade" id="modalSignupHorizontal" tabindex="-1" role="dialog"
     aria-labelledby="modalSignupHorizontalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card card-row">
                <div class="row gx-0">
                    <div class="col-12 col-md-6 bg-cover card-img-start"
                         style="background-image: url(./assets/img/photos/photo-8.jpg);">

                        <!-- Image (placeholder) -->
                        <img src="./assets/img/photos/photo-8.jpg" alt="..." class="img-fluid d-md-none invisible">

                        <!-- Shape -->
                        <div class="shape shape-end shape-fluid-y text-white d-none d-md-block">
                            <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M116 0H51v172C76 384 0 517 0 517v173h116V0z" fill="currentColor"/>
                            </svg>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body">

                            <!-- Close -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            <!-- Heading -->
                            <h2 class="mb-0 fw-bold text-center" id="modalSignupHorizontalTitle">
                                Sign Up
                            </h2>

                            <!-- Text -->
                            <p class="mb-6 text-center text-muted">
                                Simplify your workflow in minutes.
                            </p>

                            <!-- Form -->
                            <form class="mb-6">

                                <!-- Email -->
                                <div class="form-group">
                                    <label class="visually-hidden" for="modalSignupHorizontalEmail">
                                        Your email
                                    </label>
                                    <input type="email" class="form-control" id="modalSignupHorizontalEmail"
                                           placeholder="Your email">
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-5">
                                    <label class="visually-hidden" for="modalSignupHorizontalPassword">
                                        Create a password
                                    </label>
                                    <input type="password" class="form-control" id="modalSignupHorizontalPassword"
                                           placeholder="Create a password">
                                </div>

                                <!-- Submit -->
                                <button class="btn w-100 btn-primary" type="submit">
                                    Sign up
                                </button>

                            </form>

                            <!-- Text -->
                            <p class="mb-0 fs-sm text-center text-muted">
                                Already have an account? <a href="./signin-illustration.html">Log in</a>.
                            </p>

                        </div>
                    </div>

                </div> <!-- / .row -->
            </div>
        </div>
    </div>
</div>


<!-- Signin: Horizontal  -->
<div class="modal fade" id="modalSigninHorizontal" tabindex="-1" role="dialog"
     aria-labelledby="modalSigninHorizontalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card card-row">
                <div class="row gx-0">
                    <div class="col-12 col-md-6 bg-cover card-img-start"
                         style="background-image: url(./assets/img/photos/photo-1.jpg);">

                        <!-- Image (placeholder) -->
                        <img src="./assets/img/photos/photo-1.jpg" alt="..." class="img-fluid d-md-none invisible">

                        <!-- Shape -->
                        <div class="shape shape-end shape-fluid-y text-white d-none d-md-block">
                            <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M116 0H51v172C76 384 0 517 0 517v173h116V0z" fill="currentColor"/>
                            </svg>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body">

                            <!-- Close -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            <!-- Heading -->
                            <h2 class="mb-0 fw-bold text-center" id="modalSigninHorizontalTitle">
                                Sign In
                            </h2>

                            <!-- Text -->
                            <p class="mb-6 text-center text-muted">
                                Simplify your workflow in minutes.
                            </p>

                            <!-- Form -->
                            <form class="mb-6">

                                <!-- Email -->
                                <div class="form-group">
                                    <label class="visually-hidden" for="modalSigninHorizontalEmail">
                                        Your email
                                    </label>
                                    <input type="email" class="form-control" id="modalSigninHorizontalEmail"
                                           placeholder="Your email">
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-5">
                                    <label class="visually-hidden" for="modalSigninHorizontalPassword">
                                        Enter your password
                                    </label>
                                    <input type="password" class="form-control" id="modalSigninHorizontalPassword"
                                           placeholder="Enter your password">
                                </div>

                                <!-- Submit -->
                                <button class="btn w-100 btn-primary" type="submit">
                                    Sign in
                                </button>

                            </form>

                            <!-- Text -->
                            <p class="mb-0 fs-sm text-center text-muted">
                                Don't have an account yet? <a href="./signin-illustration.html">Sign up</a>.
                            </p>

                        </div>
                    </div>

                </div> <!-- / .row -->
            </div>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand" href="./index.php">
            <h3>Cinemax</h3>
            <!-- <img src="./assets/img/brand.svg" class="navbar-brand-img" alt="...">-->
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-x"></i>
            </button>

            <!-- Navigation -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarAccount" data-bs-toggle="dropdown" href="#"
                       aria-haspopup="true" aria-expanded="false">
                        Mon compte
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarAccount">
                        <li class="dropdown-item dropend">
                            <a class="dropdown-item" href="./account-general.html">
                                Général
                            </a>
                            <a class="dropdown-item" href="./admin.php">
                                Administration
                            </a>
                        </li>
                        <li class="dropdown-item dropend">
                            <a class="dropdown-item" data-bs-toggle="modal" href="#modalSigninHorizontal">
                                Sign in
                            </a>
                        </li>
                        <li class="dropdown-item dropend">
                            <a class="dropdown-item" data-bs-toggle="modal" href="#modalSignupHorizontal">
                                Sign up
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- APPLYING -->
<section class="pt-6 pt-md-8">
    <div class="container pb-8 pb-md-11 border-bottom border-gray-300">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <!-- Heading -->
                <h2>Cherchons le film qui <span class="text-primary">vous </span> correspond.</h2>
            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12">
                <!-- Form -->
                <form class="mb-7 mb-md-9">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group mb-5 mb-md-0">
                                <!-- Label -->
                                <label class="form-label" for="filmCategory">Catégorie</label>
                                <!-- Select -->
                                <select class="form-select form-select-sm" data-choices='{"removeItemButton": true}' multiple id="filmCategory">
                                    <?php echo getAllCategory($CONFIG['database']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group mb-5 mb-md-0">
                                <!-- Label -->
                                <label class="form-label" for="filmDisponibility">Disponibilité</label>
                                <!-- Select -->
                                <select class="form-select form-select-sm" data-choices id="filmDisponibility">
                                    <option selected>Peu importe</option>
                                    <option >En stock</option>
                                    <option>Indiponible</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group mb-0">
                                <!-- Label -->
                                <label class="form-label" for="filmTitle">Titre</label>
                                <!-- Select -->
                                <input class="form-control form-control-sm" id="filmTitle" type="text" placeholder="Entrez du texte">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                        <div class="col-12 col-md-2">
                            <div class="form-group mb-0">
                                <!-- Label -->
                                <label class="form-label" for="filmMinPrice">De</label>
                                <!-- Select -->
                                <input class="form-control form-control-sm" id="filmMinPrice" type="text" placeholder="€">
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="form-group mb-0">
                                <!-- Label -->
                                <label class="form-label" for="filmMaxPrice">À</label>
                                <!-- Select -->
                                <input class="form-control form-control-sm" id="filmMaxPrice" type="text" placeholder="€">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group mb-0">
                                <!-- Label -->
                                <label class="form-label" for="filmStore">Magasin</label>
                                <!-- Select -->
                                <select class="form-select form-select-sm" data-choices='{"removeItemButton": true}' multiple id="filmStore">
                                    <?php echo getAllStore($CONFIG['database']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group mb-0">
                                <!-- Label -->
                                <label class="form-label" for="filmFilterSend">Encore un clique.</label>
                                <button type="button" class="w-100 btn btn-primary-soft btn-sm mb-1 lift" id="filmFilterSend">
                                    Filtrer
                                </button>
                            </div>
                        </div>
                    </div> <!-- / .row -->
                </form>
            </div>
        </div> <!-- / .row -->
        <div class="row align-items-center mb-5">
            <?php echo getMovies($CONFIG['database']); ?>
            <!-- Text -->
            <p class="fs-sm text-center text-muted mb-0">
                Vous ne trouvez ce que vous cherchez ? <a href="mailto:contact@cinemax.com">Demandez nous</a>.
            </p>
        </div> <!-- / .container -->
</section>

<div class="modal fade" id="filmDetailsModal" tabindex="-1" aria-labelledby="filmDetailsModal" aria-hidden="true">
    <div class="modal-xl modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <section class="pt-8 pt-md-11">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md">
                            <!-- Heading -->
                            <h1 class="display-4 mb-2" id="modal-filmTitle">
                                title
                            </h1>
                            <p class="fs-lg text-gray-700 mb-5 mb-md-0" id="modal-filmCategory">
                                category
                            </p>
                        </div>
                        <div class="col-auto">
                            <!-- Badges -->
                            <span class="badge badge-lg bg-primary-soft" id="modal-filmPrice">price</span>
                        </div>
                    </div> <!-- / .row -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Divider -->
                            <hr class="my-6 my-md-8 border-gray-300">
                        </div>
                    </div> <!-- / .row -->
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <!-- Heading -->
                            <h3>Synopsis</h3>
                            <!-- Text -->
                            <p class="text-gray-800 mb-6 mb-md-8" id="modal-filmDescription">description</p>

                            <!-- Heading -->
                            <h3>Description</h3>
                            <!-- List -->
                            <div class="d-flex">
                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-secondary-soft mt-1 me-4">
                                    <span class="fe fe-clock"></span>
                                </div>
                                <!-- Text -->
                                <p class="text-gray-800" id="modal-filmLength">length</p>
                            </div>
                            <div class="d-flex">
                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-secondary-soft mt-1 me-4">
                                    <span class="fe fe-users"></span>
                                </div>
                                <!-- Text -->
                                <p class="text-gray-800" id="modal-filmActors">acteurs</p>
                            </div>
                            <div class="d-flex">
                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-secondary-soft mt-1 me-4">
                                    <span class="fe fe-globe"></span>
                                </div>
                                <!-- Text -->
                                <p class="text-gray-800" id="modal-filmLanguage">language</p>
                            </div>
                            <div class="d-flex">
                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-secondary-soft mt-1 me-4">
                                    <span class="fe fe-film"></span>
                                </div>
                                <!-- Text -->
                                <p class="text-gray-800" id="modal-filmBonus">bonus</p>
                            </div>
                            <div class="d-flex">
                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-secondary-soft mt-1 me-4" id="modal-filmRatingIcon">
                                    <span class="fe fe-disc"></span>
                                </div>
                                <!-- Text -->
                                <p class="text-gray-800" id="modal-filmRatingMeaning">meaning</p>
                            </div>
                            <div class="d-flex">
                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-secondary-soft mt-1 me-4">
                                    <span class="fe fe-calendar"></span>
                                </div>
                                <!-- Text -->
                                <p class="text-gray-800" id="modal-filmRentalDuration">rental duration</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <h4>
                                Disponibilités
                            </h4>
                            <div id="modal-filmDisponibility"></div>
                        </div>
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<!-- Map JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

<!-- Vendor JS -->
<script src="./assets/js/vendor.bundle.js"></script>

<!-- Theme JS -->
<script src="./assets/js/theme.bundle.js"></script>

<!-- Manage Film Modal -->
<script src="./JSScripts/displayModalFilm.js"></script>
</body>
</html>
