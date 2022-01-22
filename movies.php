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
        <a class="navbar-brand" href="./index.html">
            <img src="./assets/img/brand.svg" class="navbar-brand-img" alt="...">
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
                <h2>
                    Cherchons le film qui <span class="text-primary">vous </span> correspond.
                </h2>

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
                                <label class="form-label" for="applyRoles">Roles</label>

                                <!-- Select -->
                                <select class="form-select" id="applyRoles">
                                    <option selected>All roles</option>
                                    <option>Design</option>
                                    <option>Engineering</option>
                                    <option>Product</option>
                                    <option>Testing</option>
                                    <option>Support</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-12 col-md-4">

                            <div class="form-group mb-5 mb-md-0">

                                <!-- Label -->
                                <label class="form-label" for="applyTeam">Team</label>

                                <!-- Select -->
                                <select class="form-select" id="applyTeam">
                                    <option selected>All teams</option>
                                    <option>Consumer</option>
                                    <option>Consulting</option>
                                    <option>Internal tools</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-12 col-md-4">

                            <div class="form-group mb-0">

                                <!-- Label -->
                                <label class="form-label" for="applyLocation">Location</label>

                                <!-- Select -->
                                <select class="form-select" id="applyLocation">
                                    <option selected>All locations</option>
                                    <option>London</option>
                                    <option>Los Angeles</option>
                                    <option>Paris</option>
                                    <option>San Francisco</option>
                                </select>
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
                Don’t see the job you want? <a href="#!">Let us know</a>.
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

                            <!-- Text -->
                            <p class="fs-lg text-gray-700 mb-5 mb-md-0" id="modal-filmRating">
                                rating
                            </p>
                        </div>
                        <div class="col-auto">

                            <!-- Buttons -->
                            <a href="#!" class="btn btn-primary-soft me-1">
                                Refer a friend
                            </a>
                            <a href="#!" class="btn btn-primary">
                                Apply
                            </a>

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
                            <h3>
                                Who we are
                            </h3>

                            <!-- Text -->
                            <p class="text-gray-800 mb-6 mb-md-8">
                                We believe lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus feugiat elit vitae enim lacinia semper. Cras nulla lectus, porttitor vitae urna iaculis, malesuada tincidunt lectus. Proin nec tellus sit amet massa auctor imperdiet id vitae diam. Aenean gravida est nec diam suscipit iaculis. Praesent urna velit, auctor nec turpis et, vehicula lobortis sem. Vivamus convallis mi sagittis eleifend laoreet. Praesent vitae venenatis enim. Nulla tincidunt felis et lectus rhoncus laoreet.
                            </p>

                            <!-- Heading -->
                            <h3>
                                What we’re looking for
                            </h3>

                            <!-- Text -->
                            <p class="text-gray-800 mb-5">
                                Aenean gravida est nec diam suscipit iaculis. Praesent urna velit, auctor nec turpis et, vehicula lobortis sem. Vivamus convallis mi sagittis eleifend laoreet. Praesent vitae venenatis enim. Nulla tincidunt felis et lectus rhoncus laoreet.
                            </p>

                            <!-- List -->
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p class="text-gray-800">
                                    Work through complex design problems to create beautiful and thoughtful interactions for our marketing web platform
                                </p>

                            </div>
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p class="text-gray-800">
                                    Demonstrate an expertise in typography, composition, layout, design thinking, and content strategy in the design solutions you create
                                </p>

                            </div>
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p class="text-gray-800">
                                    Consider UX from a user journey level across several brand touchpoints, as well as within specific interactions
                                </p>

                            </div>
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p class="text-gray-800">
                                    Design at a systems level, where components can be re-used and built to scale, optimized across different screen sizes and devices
                                </p>

                            </div>
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p class="text-gray-800 mb-6 mb-md-8">
                                    Iterate quickly and communicate ideas across various levels of fidelity, with the ability to receive feedback constructively as well as provide feedback to other’s work
                                </p>

                            </div>

                            <!-- Heading -->
                            <h3 class="mb-5">
                                Applicant requirements
                            </h3>

                            <!-- List -->
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p class="text-gray-800">
                                    Work through complex design problems to create beautiful and thoughtful interactions for our marketing web platform
                                </p>

                            </div>
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p class="text-gray-800 mb-6 mb-md-0">
                                    Demonstrate an expertise in typography, composition, layout, design thinking, and content strategy in the design solutions you create
                                </p>

                            </div>

                        </div>
                        <div class="col-12 col-md-4">

                            <!-- Card -->
                            <div class="card shadow-light-lg mb-5">
                                <div class="card-body">

                                    <!-- Heading -->
                                    <h4>
                                        Need help?
                                    </h4>

                                    <!-- Text -->
                                    <p class="fs-sm text-gray-800 mb-5">
                                        Not sure exactly what we’re looking for or just want clarification? We’d be happy to chat with you and clear things up for you. Anytime!
                                    </p>

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-gray-700 mb-2">
                                        Call anytime
                                    </h6>

                                    <!-- Text -->
                                    <p class="fs-sm mb-5">
                                        <a href="tel:555-123-4567" class="text-reset">(555) 123-4567</a>
                                    </p>

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-gray-700 mb-2">
                                        Email us
                                    </h6>

                                    <!-- Text -->
                                    <p class="fs-sm mb-0">
                                        <a href="mailto:support@goodthemes.co" class="text-reset">support@goodthemes.co</a>
                                    </p>

                                </div>
                            </div>

                            <!-- Card -->
                            <div class="card shadow-light-lg">
                                <div class="card-body">

                                    <!-- Heading -->
                                    <h4>
                                        Don't see a job for you?
                                    </h4>

                                    <!-- Text -->
                                    <p class="fs-sm text-gray-800">
                                        Do you feel like you belong working with Good Themes, but we just don’t have your dream job posted? No problem, just reach out.
                                    </p>

                                    <!-- Heading -->
                                    <a href="#!" class="fw-bold fs-sm text-decoration-none">
                                        Let us know <i class="fe fe-arrow-right ms-3"></i>
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
            <section class="pt-8 pt-md-11 pb-8 pb-md-14">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!-- Card -->
                            <div class="card card-border border-primary shadow-light-lg">
                                <div class="card-body">

                                    <!-- Form -->
                                    <form>
                                        <div class="row">
                                            <div class="col-12 col-md-6">

                                                <div class="form-group mb-5">
                                                    <label class="form-label" for="applyName">Full name</label>
                                                    <input class="form-control" id="applyName" type="text" placeholder="Full name">
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-6">

                                                <div class="form-group mb-5">
                                                    <label class="form-label" for="applyEmail">Email</label>
                                                    <input class="form-control" id="applyEmail" type="text" placeholder="hello@domain.com">
                                                </div>

                                            </div>
                                        </div> <!-- / .row -->
                                        <div class="row">
                                            <div class="col-12 col-md-6">

                                                <div class="form-group mb-5">
                                                    <label class="form-label">Cover letter</label>
                                                    <input class="form-control" id="applyCover" type="file">
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-6">

                                                <div class="form-group mb-5">
                                                    <div class="form-group mb-5">
                                                        <label class="form-label">Resume</label>
                                                        <input class="form-control" id="applyResume" type="file">
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- / .row -->
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="form-group mb-5">
                                                    <label class="form-label" for="applyMessage">Why is Landkit important to you?</label>
                                                    <textarea class="form-control" id="applyMessage" rows="5" placeholder="Let us know!"></textarea>
                                                </div>

                                            </div>
                                        </div> <!-- / .row -->
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md">

                                                <!-- Submit -->
                                                <button class="btn btn-primary mb-6 mb-md-0 lift">
                                                    Apply now <i class="fe fe-arrow-right ms-3"></i>
                                                </button>

                                            </div>
                                            <div class="col-12 col-md-auto">

                                                <p class="fs-sm text-muted mb-0">
                                                    Application will be send securely and remain private
                                                </p>

                                            </div>
                                        </div> <!-- / .row -->
                                    </form>

                                </div>
                            </div>

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
