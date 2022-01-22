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
    
    <!-- Title -->
    <title>Cinemax</title>
  </head>
  <body>

    <!-- MODALS -->
    <!-- Example -->
    <div class="modal fade" id="modalExample" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
    
            <!-- Close -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
            <!-- Image -->
            <div class="text-center">
              <img src="./assets/img/illustrations/illustration-1.png" alt="..." class="img-fluid mb-3" style="width: 200px;">
            </div>
    
            <!-- Heading -->
            <h2 class="fw-bold text-center mb-1" id="modalExampleTitle">
              Schedule a demo with us
            </h2>
    
            <!-- Text -->
            <p class="fs-lg text-center text-muted mb-6 mb-md-8">
              We can help you solve company communication.
            </p>
    
            <!-- Form -->
            <form>
              <div class="row">
                <div class="col-12 col-md-6">
    
                  <!-- First name -->
                  <div class="form-floating">
                    <input type="text" class="form-control form-control-flush" id="registrationFirstNameModal" placeholder="First name">
                    <label for="registrationFirstNameModal">First name</label>
                  </div>
    
                </div>
                <div class="col-12 col-md-6">
    
                  <!-- Last name -->
                  <div class="form-floating">
                    <input type="text" class="form-control form-control-flush" id="registrationLastNameModal" placeholder="Last name">
                    <label for="registrationLastNameModal">Last name</label>
                  </div>
    
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-6">
    
                  <!-- Email -->
                  <div class="form-floating">
                    <input type="email" class="form-control form-control-flush" id="registrationEmailModal" placeholder="Email">
                    <label for="registrationEmailModal">Email</label>
                  </div>
    
                </div>
                <div class="col-12 col-md-6">
    
                  <!-- Password -->
                  <div class="form-floating">
                    <input type="password" class="form-control form-control-flush" id="registrationPasswordModal" placeholder="Password">
                    <label for="registrationPasswordModal">Password</label>
                  </div>
    
                </div>
              </div>
              <div class="row">
                <div class="col-12">
    
                  <!-- Submit -->
                  <button class="btn w-100 btn-primary mt-3 lift">
                    Request a demo
                  </button>
    
                </div>
              </div>
            </form>
    
          </div>
        </div>
      </div>
    </div>
    
    <!-- Signup: Horizontal  -->
    <div class="modal fade" id="modalSignupHorizontal" tabindex="-1" role="dialog" aria-labelledby="modalSignupHorizontalTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="card card-row">
            <div class="row gx-0">
              <div class="col-12 col-md-6 bg-cover card-img-start" style="background-image: url(./assets/img/photos/photo-8.jpg);">
    
                <!-- Image (placeholder) -->
                <img src="./assets/img/photos/photo-8.jpg" alt="..." class="img-fluid d-md-none invisible">
    
                <!-- Shape -->
                <div class="shape shape-end shape-fluid-y text-white d-none d-md-block">
                  <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M116 0H51v172C76 384 0 517 0 517v173h116V0z" fill="currentColor"/></svg>            </div>
    
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
                      <input type="email" class="form-control" id="modalSignupHorizontalEmail" placeholder="Your email">
                    </div>
    
                    <!-- Password -->
                    <div class="form-group mb-5">
                      <label class="visually-hidden" for="modalSignupHorizontalPassword">
                        Create a password
                      </label>
                      <input type="password" class="form-control" id="modalSignupHorizontalPassword" placeholder="Create a password">
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
    
    <!-- Signup: Vertical  -->
    <div class="modal fade" id="modalSignupVertical" tabindex="-1" role="dialog" aria-labelledby="modalSignupVerticalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="card">
    
            <!-- Close -->
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
    
            <!-- Image -->
            <img src="./assets/img/photos/photo-7.jpg" alt="..." class="card-img-top">
    
            <!-- Shape -->
            <div class="position-relative">
              <div class="shape shape-bottom shape-fluid-x text-white">
                <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z" fill="currentColor"/></svg>          </div>
            </div>
    
            <!-- Body -->
            <div class="card-body">
    
              <!-- Heading -->
              <h2 class="mb-0 fw-bold text-center" id="modalSignupVerticalTitle">
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
                  <label class="visually-hidden" for="modalSignupVerticalEmail">
                    Your email
                  </label>
                  <input type="email" class="form-control" id="modalSignupVerticalEmail" placeholder="Your email">
                </div>
    
                <!-- Password -->
                <div class="form-group mb-5">
                  <label class="visually-hidden" for="modalSignupVerticalPassword">
                    Create a password
                  </label>
                  <input type="password" class="form-control" id="modalSignupVerticalPassword" placeholder="Create a password">
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
        </div>
      </div>
    </div>
    
    <!-- Signin: Horizontal  -->
    <div class="modal fade" id="modalSigninHorizontal" tabindex="-1" role="dialog" aria-labelledby="modalSigninHorizontalTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="card card-row">
            <div class="row gx-0">
              <div class="col-12 col-md-6 bg-cover card-img-start" style="background-image: url(./assets/img/photos/photo-1.jpg);">
    
                <!-- Image (placeholder) -->
                <img src="./assets/img/photos/photo-1.jpg" alt="..." class="img-fluid d-md-none invisible">
    
                <!-- Shape -->
                <div class="shape shape-end shape-fluid-y text-white d-none d-md-block">
                  <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M116 0H51v172C76 384 0 517 0 517v173h116V0z" fill="currentColor"/></svg>            </div>
    
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
                      <input type="email" class="form-control" id="modalSigninHorizontalEmail" placeholder="Your email">
                    </div>
    
                    <!-- Password -->
                    <div class="form-group mb-5">
                      <label class="visually-hidden" for="modalSigninHorizontalPassword">
                        Enter your password
                      </label>
                      <input type="password" class="form-control" id="modalSigninHorizontalPassword" placeholder="Enter your password">
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
    
    <!-- Signin: Vertical  -->
    <div class="modal fade" id="modalSigninVertical" tabindex="-1" role="dialog" aria-labelledby="modalSigninVerticalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="card">
    
            <!-- Close -->
            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
    
            <!-- Image -->
            <img src="./assets/img/photos/photo-21.jpg" alt="..." class="card-img-top">
    
            <!-- Shape -->
            <div class="position-relative">
              <div class="shape shape-bottom shape-fluid-x text-white">
                <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z" fill="currentColor"/></svg>          </div>
            </div>
    
            <!-- Body -->
            <div class="card-body">
    
              <!-- Heading -->
              <h2 class="mb-0 fw-bold text-center" id="modalSigninVerticalTitle">
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
                  <label class="visually-hidden" for="modalSigninVerticalEmail">
                    Your email
                  </label>
                  <input type="email" class="form-control" id="modalSigninVerticalEmail" placeholder="Your email">
                </div>
    
                <!-- Password -->
                <div class="form-group mb-5">
                  <label class="visually-hidden" for="modalSigninVerticalPassword">
                    Enter your password
                  </label>
                  <input type="password" class="form-control" id="modalSigninVerticalPassword" placeholder="Enter your password">
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
        </div>
      </div>
    </div>
    
    <!-- Payment -->
    <div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="modalPaymentTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
    
            <!-- Close -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
            <!-- Heading -->
            <h2 class="fw-bold text-center mb-1" id="modalPaymentTitle">
              Add Payment
            </h2>
    
            <!-- Text -->
            <p class="fs-lg text-center text-muted mb-6 mb-md-8">
              Simplify your workflow in minutes.
            </p>
    
            <!-- Form -->
            <form>
    
              <!-- Name -->
              <div class="form-group">
                <label class="form-label" for="modalPaymentName">Name on card</label>
                <input class="form-control" id="modalPaymentName" type="text" placeholder="First Last">
              </div>
    
              <!-- Name -->
              <div class="form-group">
                <label class="form-label" for="modalPaymentNumbber">Card number</label>
                <input class="form-control" id="modalPaymentNumbber" type="number" placeholder="4242 4242 4242 4242">
              </div>
    
              <!-- Name -->
              <div class="form-group">
                <label class="form-label" for="modalPaymentDate">Exp. Date</label>
                <input class="form-control" id="modalPaymentDate" type="text" placeholder="03/2023">
              </div>
    
              <!-- Submit -->
              <button class="btn w-100 btn-primary mt-3 lift">
                Add Payment Method
              </button>
    
            </form>
    
          </div>
        </div>
      </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-togglable fixed-top">
      <div class="container">
    
        <!-- Brand -->
        <a class="navbar-brand" href="./index.html">
          <img src="./assets/img/brand.svg" class="navbar-brand-img" alt="...">
        </a>
    
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
    
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fe fe-x"></i>
          </button>
    
          <!-- Navigation -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarLandings" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                Landings
              </a>
              <div class="dropdown-menu dropdown-menu-xl p-0" aria-labelledby="navbarLandings">
                <div class="row gx-0">
                  <div class="col-12 col-lg-6">
                    <div class="dropdown-img-start" style="background-image: url(./assets/img/photos/photo-3.jpg);">
    
                      <!-- Heading -->
                      <h4 class="fw-bold text-white mb-0">
                        Want to see an overview?
                      </h4>
    
                      <!-- Text -->
                      <p class="fs-sm text-white">
                        See all the pages at once.
                      </p>
    
                      <!-- Button -->
                      <a href="./overview.html" class="btn btn-sm btn-white shadow-dark fonFt-size-sm">
                        View all pages
                      </a>
    
                    </div>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="dropdown-body">
                      <div class="row gx-0">
                        <div class="col-6">
    
                          <!-- Heading -->
                          <h6 class="dropdown-header">
                            Services
                          </h6>
    
                          <!-- List -->
                          <a class="dropdown-item" href="./coworking.html">
                            Coworking
                          </a>
                          <a class="dropdown-item" href="./rental.html">
                            Rental
                          </a>
                          <a class="dropdown-item mb-5" href="./job.html">
                            Job Listing
                          </a>
    
                          <!-- Heading -->
                          <h6 class="dropdown-header">
                            Apps
                          </h6>
    
                          <!-- List -->
                          <a class="dropdown-item" href="./desktop-app.html">
                            Desktop
                          </a>
                          <a class="dropdown-item" href="./mobile-app.html">
                            Mobile
                          </a>
    
                        </div>
                        <div class="col-6">
    
                          <!-- Heading -->
                          <h6 class="dropdown-header">
                            Web
                          </h6>
    
                          <!-- List -->
                          <a class="dropdown-item" href="./index.html">
                            Basic
                          </a>
                          <a class="dropdown-item" href="./startup.html">
                            Startup
                          </a>
                          <a class="dropdown-item" href="./enterprise.html">
                            Enterprise
                          </a>
                          <a class="dropdown-item" href="./service.html">
                            Service
                          </a>
                          <a class="dropdown-item" href="./cloud.html">
                            Cloud Hosting
                          </a>
                          <a class="dropdown-item" href="./agency.html">
                            Agency
                          </a>
                          <a class="dropdown-item" href="./framework.html">
                            Framework <span class="h6 text-uppercase text-primary">(new)</span>
                          </a>
    
                        </div>
                      </div> <!-- / .row -->
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarPages" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu dropdown-menu-lg" aria-labelledby="navbarPages">
                <div class="row gx-0">
                  <div class="col-6">
                    <div class="row gx-0">
                      <div class="col-12 col-lg-6">
    
                        <!-- Heading -->
                        <h6 class="dropdown-header">
                          Career
                        </h6>
    
                        <!-- List -->
                        <a class="dropdown-item" href="./careers.html">
                          Listing
                        </a>
                        <a class="dropdown-item mb-5" href="./career-single.html">
                          Opening
                        </a>
    
                        <!-- Heading -->
                        <h6 class="dropdown-header">
                          Company
                        </h6>
    
                        <!-- List -->
                        <a class="dropdown-item" href="./about.html">
                          About
                        </a>
                        <a class="dropdown-item" href="./pricing.html">
                          Pricing
                        </a>
                        <a class="dropdown-item mb-5 mb-lg-0" href="./terms-of-service.html">
                          Terms
                        </a>
    
                      </div>
                      <div class="col-12 col-lg-6">
    
                        <!-- Heading -->
                        <h6 class="dropdown-header">
                          Help center
                        </h6>
    
                        <!-- List -->
                        <a class="dropdown-item" href="./help-center.html">
                          Overview
                        </a>
                        <a class="dropdown-item mb-5" href="./help-center-article.html">
                          Article
                        </a>
    
                        <!-- Heading -->
                        <h6 class="dropdown-header">
                          Contact
                        </h6>
    
                        <!-- List -->
                        <a class="dropdown-item" href="./contact.html">
                          Basic
                        </a>
                        <a class="dropdown-item" href="./contact-alt.html">
                          Cover
                        </a>
    
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row gx-0">
                      <div class="col-12 col-lg-6">
    
                        <!-- Heading -->
                        <h6 class="dropdown-header">
                          Blog
                        </h6>
    
                        <!-- List -->
                        <a class="dropdown-item" href="./blog.html">
                          Rich View
                        </a>
                        <a class="dropdown-item" href="./blog-post.html">
                          Article
                        </a>
                        <a class="dropdown-item" href="./blog-showcase.html">
                          Showcase
                        </a>
                        <a class="dropdown-item mb-5 mb-lg-0" href="./blog-search.html">
                          Search
                        </a>
    
                      </div>
                      <div class="col-12 col-lg-6">
    
                        <!-- Heading -->
                        <h6 class="dropdown-header">
                          Portfolio
                        </h6>
    
                        <!-- List -->
                        <a class="dropdown-item" href="./portfolio-masonry.html">
                          Masonry
                        </a>
                        <a class="dropdown-item" href="./portfolio-grid-rows.html">
                          Grid Rows
                        </a>
                        <a class="dropdown-item" href="./portfolio-parallax.html">
                          Parallax
                        </a>
                        <a class="dropdown-item" href="./portfolio-case-study.html">
                          Case Study
                        </a>
                        <a class="dropdown-item" href="./portfolio-sidebar.html">
                          Sidebar
                        </a>
                        <a class="dropdown-item" href="./portfolio-sidebar-fluid.html">
                          Sidebar: Fluid
                        </a>
                        <a class="dropdown-item" href="./portfolio-grid.html">
                          Basic Grid
                        </a>
    
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- / .row -->
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarAccount" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarAccount">
                <li class="dropdown-item dropend">
                  <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                    Settings
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="./account-general.html">
                      General
                    </a>
                    <a class="dropdown-item" href="./account-security.html">
                      Security
                    </a>
                    <a class="dropdown-item" href="./account-notifications.html">
                      Notifications
                    </a>
                    <a class="dropdown-item" href="./billing-plans-and-payment.html">
                      Plans & Payment
                    </a>
                    <a class="dropdown-item" href="./billing-users.html">
                      Users
                    </a>
                  </div>
                </li>
                <li class="dropdown-item dropend">
                  <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                    Sign In
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="./signin-cover.html">
                      Side Cover
                    </a>
                    <a class="dropdown-item" href="./signin-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="./signin.html">
                      Basic
                    </a>
                    <a class="dropdown-item" data-bs-toggle="modal" href="#modalSigninHorizontal">
                      Modal Horizontal
                    </a>
                    <a class="dropdown-item" data-bs-toggle="modal" href="#modalSigninVertical">
                      Modal Vertical
                    </a>
                  </div>
                </li>
                <li class="dropdown-item dropend">
                  <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                    Sign Up
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="./signup-cover.html">
                      Side Cover
                    </a>
                    <a class="dropdown-item" href="./signup-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="./signup.html">
                      Basic
                    </a>
                    <a class="dropdown-item" data-bs-toggle="modal" href="#modalSignupHorizontal">
                      Modal Horizontal
                    </a>
                    <a class="dropdown-item" data-bs-toggle="modal" href="#modalSignupVertical">
                      Modal Vertical
                    </a>
                  </div>
                </li>
                <li class="dropdown-item dropend">
                  <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                    Password Reset
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="./password-reset-cover.html">
                      Side Cover
                    </a>
                    <a class="dropdown-item" href="./password-reset-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="./password-reset.html">
                      Basic
                    </a>
                  </div>
                </li>
                <li class="dropdown-item dropend">
                  <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                    Error
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="./error-cover.html">
                      Side Cover
                    </a>
                    <a class="dropdown-item" href="./error-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="./error.html">
                      Basic
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                Documentation
              </a>
              <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
                <div class="list-group list-group-flush">
                  <a class="list-group-item" href="./docs/index.html">
    
                    <!-- Icon -->
                    <div class="icon icon-sm text-primary">
                      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M8 3v.5A1.5 1.5 0 009.5 5h5A1.5 1.5 0 0016 3.5V3h2a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2h2z" fill="#335EEA" opacity=".3"/><path d="M11 2a1 1 0 012 0h1.5a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-5a.5.5 0 01-.5-.5v-1a.5.5 0 01.5-.5H11z" fill="#335EEA"/><rect fill="#335EEA" opacity=".3" x="7" y="10" width="5" height="2" rx="1"/><rect fill="#335EEA" opacity=".3" x="7" y="14" width="9" height="2" rx="1"/></g></svg>                </div>
    
                    <!-- Content -->
                    <div class="ms-4">
    
                      <!-- Heading -->
                      <h6 class="fw-bold text-uppercase text-primary mb-0">
                        Documentation
                      </h6>
    
                      <!-- Text -->
                      <p class="fs-sm text-gray-700 mb-0">
                        Customizing and building
                      </p>
    
                    </div>
    
                  </a>
                  <a class="list-group-item" href="./docs/alerts.html">
    
                    <!-- Icon -->
                    <div class="icon icon-sm text-primary">
                      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><rect fill="#335EEA" x="4" y="4" width="7" height="7" rx="1.5"/><path d="M5.5 13h4a1.5 1.5 0 011.5 1.5v4A1.5 1.5 0 019.5 20h-4A1.5 1.5 0 014 18.5v-4A1.5 1.5 0 015.5 13zm9-9h4A1.5 1.5 0 0120 5.5v4a1.5 1.5 0 01-1.5 1.5h-4A1.5 1.5 0 0113 9.5v-4A1.5 1.5 0 0114.5 4zm0 9h4a1.5 1.5 0 011.5 1.5v4a1.5 1.5 0 01-1.5 1.5h-4a1.5 1.5 0 01-1.5-1.5v-4a1.5 1.5 0 011.5-1.5z" fill="#335EEA" opacity=".3"/></g></svg>                </div>
    
                    <!-- Content -->
                    <div class="ms-4">
    
                      <!-- Heading -->
                      <h6 class="fw-bold text-uppercase text-primary mb-0">
                        Components
                      </h6>
    
                      <!-- Text -->
                      <p class="fs-sm text-gray-700 mb-0">
                        Full list of components
                      </p>
    
                    </div>
    
                  </a>
                  <a class="list-group-item" href="./docs/changelog.html">
    
                    <!-- Icon -->
                    <div class="icon icon-sm text-primary">
                      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M5.857 2h7.88a1.5 1.5 0 01.968.355l4.764 4.029A1.5 1.5 0 0120 7.529v12.554c0 1.79-.02 1.917-1.857 1.917H5.857C4.02 22 4 21.874 4 20.083V3.917C4 2.127 4.02 2 5.857 2z" fill="#335EEA" opacity=".3"/><rect fill="#335EEA" x="6" y="11" width="9" height="2" rx="1"/><rect fill="#335EEA" x="6" y="15" width="5" height="2" rx="1"/></g></svg>                </div>
    
                    <!-- Content -->
                    <div class="ms-4">
    
                      <!-- Heading -->
                      <h6 class="fw-bold text-uppercase text-primary mb-0">
                        Changelog
                      </h6>
    
                      <!-- Text -->
                      <p class="fs-sm text-gray-700 mb-0">
                        Keep track of changes
                      </p>
    
                    </div>
    
                    <!-- Badge -->
                    <span class="badge rounded-pill bg-primary-soft ms-auto">
                      2.1.0
                    </span>
    
                  </a>
                </div>
              </div>
            </li>
          </ul>
    
          <!-- Button -->
          <a class="navbar-btn btn btn-sm btn-primary lift ms-auto" href="https://themes.getbootstrap.com/product/landkit/" target="_blank">
            Buy now
          </a>
    
        </div>
    
      </div>
    </nav>

    <!-- WELCOME -->
    <section data-jarallax data-speed=".8" class="pt-12 pb-10 pt-md-15 pb-md-14" style="background-image: url(Images/rows-red-seats-theater.jpg)">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-8 col-lg-6">

            <!-- Heading -->
            <h1 class="display-3 fw-bold text-white" id="welcomeHeadingSource">
              Nos nouveautés <br />
              <span class="text-warning" data-typed='{"strings": ["ACADEMY DINOSAUR", "ACE GOLDFINGER", "ADAPTATION HOLES", "AFFAIR PREJUDICE"]}'></span>
            </h1>


            <!-- Text -->
            <p class="fs-lg text-white-80 mb-6">
              Avec Cinemax, amenez le cinéma jusque dans votre salon
            </p>

            <!-- Form -->
            <form>
              <div class="input-group">
                <span class="input-group-text pe-0 border-end-0">
                  <i class="fe fe-search" id="searchAddon"></i>
                </span>
                <input class="form-control ps-2 border-start-0" type="search" placeholder="Chercher un film" aria-label="Search for a job" aria-describedby="searchAddon">
              </div>
            </form>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>


    <!-- PROCESS -->
    <section class="pt-8 pt-md-11">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-12 col-md-6">

            <!-- Preheading -->
            <h6 class="text-uppercase text-primary fw-bold">
              Process
            </h6>

            <!-- Heading -->
            <h2>
              Our process to find you a new job is fast and you can do it from home.
            </h2>

            <!-- Text -->
            <p class="lead text-muted mb-6 mb-md-0">
              We keep everything as simple as possible by standardizing the application process for all jobs.
            </p>

          </div>
          <div class="col-12 col-md-6 col-xl-5">

            <div class="row gx-0">
              <div class="col-4">

                <!-- Image -->
                <div class="w-150 mt-9 p-1 bg-white shadow-lg" data-aos="fade-up" data-aos-delay="100">
                  <img src="assets/img/photos/photo-13.jpg" class="img-fluid" alt="...">
                </div>

              </div>
              <div class="col-4">

                <!-- Image -->
                <div class="w-150 p-1 bg-white shadow-lg" data-aos="fade-up">
                  <img src="assets/img/photos/photo-14.jpg" class="img-fluid" alt="...">
                </div>

              </div>
              <div class="col-4 position-relative">

                <!-- Image -->
                <div class="w-150 mt-11 float-end p-1 bg-white shadow-lg" data-aos="fade-up" data-aos-delay="150">
                  <img src="assets/img/photos/photo-15.jpg" class="img-fluid" alt="...">
                </div>

              </div>
            </div> <!-- / .row -->

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- STEPS -->
    <section class="pt-8 pb-9 pt-md-11 pb-md-13">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-4">
            <div class="row">
              <div class="col-auto col-md-12">

                <!-- Step -->
                <div class="row gx-0 align-items-center mb-md-5">
                  <div class="col-auto">

                    <a href="#!" class="btn btn-sm btn-rounded-circle btn-gray-400 disabled opacity-1">
                      <span>1</span>
                    </a>

                  </div>
                  <div class="col">

                    <hr class="d-none d-md-block me-n7">

                  </div>
                </div> <!-- / .row -->

              </div>
              <div class="col col-md-12 ms-n5 ms-md-0">

                <!-- Heading -->
                <h3>
                  Complete your application.
                </h3>

                <!-- Text -->
                <p class="text-muted mb-6 mb-md-0">
                  Fill out our standardized application on our platform. Most applicants finish in under an hour.
                </p>

              </div>
            </div> <!-- / .row -->
          </div>
          <div class="col-12 col-md-4">
            <div class="row">
              <div class="col-auto col-md-12">

                <!-- Step -->
                <div class="row gx-0 align-items-center mb-md-5">
                  <div class="col-auto">

                    <a href="#!" class="btn btn-sm btn-rounded-circle btn-gray-400 disabled opacity-1">
                      <span>2</span>
                    </a>

                  </div>
                  <div class="col">

                    <hr class="d-none d-md-block me-n7">

                  </div>
                </div> <!-- / .row -->

              </div>
              <div class="col col-md-12 ms-n5 ms-md-0">

                <!-- Heading -->
                <h3>
                  Select companies.
                </h3>

                <!-- Text -->
                <p class="text-muted mb-6 mb-md-0">
                  We'll immediately match you with any relevant openings and you get to pick which ones you're interested in.
                </p>

              </div>
            </div> <!-- / .row -->
          </div>
          <div class="col-12 col-md-4">
            <div class="row">
              <div class="col-auto col-md-12">

                <!-- Step -->
                <div class="row gx-0 align-items-center mb-md-5">
                  <div class="col-auto">

                    <a href="#!" class="btn btn-sm btn-rounded-circle btn-gray-400 disabled opacity-1">
                      <span>3</span>
                    </a>

                  </div>
                </div> <!-- / .row -->

              </div>
              <div class="col col-md-12 ms-n5 ms-md-0">

                <!-- Heading -->
                <h3>
                  Choose your offer.
                </h3>

                <!-- Text -->
                <p class="text-muted mb-0">
                  After 3 days all of your offers will arrive and you will have another 7 days to select your new company.
                </p>

              </div>
            </div> <!-- / .row -->
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- SHAPE -->
    <div class="position-relative">
      <div class="shape shape-bottom shape-fluid-x text-light">
        <svg viewBox="0 0 2880 56" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M720 28H0v28h2880V28h-720S1874 0 1440 0 720 28 720 28z" fill="currentColor"/></svg>      </div>
    </div>

    <!-- LATEST POSTS -->
    <section class="py-8 py-md-11 bg-gradient-light-white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6">

            <!-- Preheading -->
            <h6 class="text-uppercase text-primary fw-bold">
              Latest posts
            </h6>

            <!-- Heading -->
            <h2>
              Check out some recent postings.
            </h2>

            <!-- Text -->
            <p class="text-muted mb-6 mb-md-8">
              We get thousands of job postings weekly, but only accept the openings at the top companies.
            </p>

          </div>
          <div class="col-12 col-md-6">

            <!-- Image -->
            <img src="assets/img/illustrations/illustration-3.png" class="img-fluid" alt="...">

          </div>
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-12 col-md-6">

            <!-- Card -->
            <div class="card card-border border-primary shadow-light-lg mb-6 mb-md-8" data-aos="fade-up">
              <div class="card-body">

                <!-- Heading -->
                <h6 class="text-uppercase text-primary d-inline-block mb-5 me-1">
                  Design
                </h6>

                <!-- Badge -->
                <span class="badge badge-rounded-circle bg-primary-soft">
                  <span>3</span>
                </span>

                <!-- List group -->
                <div>
                  <div class="list-group list-group-flush">
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Senior Visual Designer
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        5+ years experience · San Francisco
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Motion Graphics Designer
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        2+ years experience · Paris
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Product Designer
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        4+ years experience · Los Angeles
                      </p>

                    </a>
                  </div>
                </div>

              </div>
            </div>

            <!-- Card -->
            <div class="card card-border border-danger shadow-light-lg mb-6 mb-md-8" data-aos="fade-up">
              <div class="card-body">

                <!-- Heading -->
                <h6 class="text-uppercase text-danger d-inline-block mb-5 me-1">
                  Engineering
                </h6>

                <!-- Badge -->
                <span class="badge badge-rounded-circle bg-danger-soft">
                  <span>3</span>
                </span>

                <!-- List group -->
                <div>
                  <div class="list-group list-group-flush">
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Ruby Engineer
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        4+ years experience · New York
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Senior Reliability Developer
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        8+ years experience · Pasadena
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        QA Engineer
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        2+ years experience · Oakland
                      </p>

                    </a>
                  </div>
                </div>

              </div>
            </div>

          </div>
          <div class="col-12 col-md-6">

            <!-- Card -->
            <div class="card card-border border-success shadow-light-lg mb-6 mb-md-8" data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">

                <!-- Heading -->
                <h6 class="text-uppercase text-success d-inline-block mb-5 me-1">
                  Product
                </h6>

                <!-- Badge -->
                <span class="badge badge-rounded-circle bg-success-soft">
                  <span>5</span>
                </span>

                <!-- List group -->
                <div>
                  <div class="list-group list-group-flush">
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Project Manager
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        3+ years experience · London
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Head of Product
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        10+ years experience · San Francisco
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Senior Product Manager
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        5+ years experience · Los Angeles
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Junior Project Manager
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        No experience required · Paris
                      </p>

                    </a>
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Application Coordinator
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        6+ years experience · Seattle
                      </p>

                    </a>
                  </div>
                </div>

              </div>
            </div>

            <!-- Card -->
            <div class="card card-border border-gray-800 shadow-light-lg mb-6 mb-md-8" data-aos="fade-up">
              <div class="card-body">

                <!-- Heading -->
                <h6 class="text-uppercase text-gray-500 d-inline-block mb-5 me-1">
                  Support
                </h6>

                <!-- Badge -->
                <span class="badge badge-rounded-circle bg-dark-soft">
                  <span>1</span>
                </span>

                <!-- List group -->
                <div>
                  <div class="list-group list-group-flush">
                    <a class="list-group-item text-reset text-decoration-none" href="#!">

                      <p class="fw-bold mb-1">
                        Customer Support Specialist
                      </p>
                      <p class="fs-sm text-muted mb-0">
                        4+ years experience · Anywhere
                      </p>

                    </a>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div> <!-- / .row -->
        <div class="row justify-content-center">
          <div class="col-12 col-md-6" data-aos="fade-up">

            <!-- Button -->
            <a href="#!" class="btn w-100 btn-primary d-flex align-items-center lift">
              View over 10,000 other postings <i class="fe fe-arrow-right ms-auto"></i>
            </a>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- PLACEMENT RATES -->
    <section>
      <div class="container py-8 pt-md-11 pb-md-9 border-top">
        <div class="row">
          <div class="col-12 col-md-10 col-lg-8">

            <!-- Preheading -->
            <h6 class="text-uppercase text-primary">
              Placement rates
            </h6>

            <!-- Heading -->
            <h2 class="mb-6 mb-md-8">
              Landkit is the leading job placement site with the highest rate of success of any tech job board.
            </h2>

            <!-- Stats -->
            <div class="d-flex">
              <div class="pe-5">
                <h3 class="mb-0">
                  <span data-countup='{"startVal": 0}' data-to="74" data-aos data-aos-id="countup:in">0</span>k
                </h3>
                <p class="text-gray-700 mb-0">
                  Placements
                </p>
              </div>
              <div class="px-5">
                <h3 class="mb-0">
                  <span data-countup='{"startVal": 0}' data-to="124" data-aos data-aos-id="countup:in">0</span>k
                </h3>
                <p class="text-gray-700 mb-0">
                  Positions
                </p>
              </div>
              <div class="ps-5">
                <h3 class="mb-0">
                  <span data-countup='{"startVal": "0.0", "decimalPlaces": 1}' data-to="1.9" data-aos data-aos-id="countup:in">0.0</span>k
                </h3>
                <p class="text-gray-700 mb-0">
                  Partnerships
                </p>
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- IMAGE -->
    <section data-jarallax data-speed=".8" class="py-14 py-lg-16 jarallax" style="background-image: url(Images/rows-red-seats-theater.jpg);">

      <!-- Shape -->
      <div class="shape shape-top shape-fluid-x text-white">
        <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h2880v125h-720L720 250H0V0z" fill="currentColor"/></svg>      </div>

      <!-- Shape -->
      <div class="shape shape-bottom shape-fluid-x text-light">
        <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M720 125L2160 0h720v250H0V125h720z" fill="currentColor"/></svg>      </div>

    </section>

    <!-- ABOUT -->
    <section class="py-8 py-md-11 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-5 col-lg-6 order-md-2">

            <!-- iPhone + Macbook -->
            <div class="w-md-150 w-lg-130 mb-6 mb-md-0">
              <div class="device-combo device-combo-iphonex-macbook">

                <!-- iPhone -->
                <div class="device device-iphonex">
                  <img src="assets/img/screenshots/mobile/jobs.jpg" class="device-screen" alt="...">
                  <img src="assets/img/devices/iphonex.svg" class="img-fluid" alt="...">
                </div>

                <!-- Macbook -->
                <div class="device device-macbook">
                  <img src="assets/img/screenshots/desktop/jobs.jpg" class="device-screen" alt="...">
                  <img src="assets/img/devices/macbook.svg" class="img-fluid" alt="...">
                </div>

              </div>
            </div>

          </div>
          <div class="col-12 col-md-7 col-lg-6 order-md-1">

            <!-- Heading -->
            <h2>
              Keep your job applications <br>
              <span class="text-primary">organized and up to date</span>.
            </h2>

            <!-- Text -->
            <p class="fs-lg text-muted mb-6">
              Landkit centralizes all your job applications, resumes, and work, whether they're from our platform or through another site or service.
            </p>

            <!-- List -->
            <div class="d-flex">

              <!-- Icon -->
              <div class="icon text-primary">
                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M8 3v.5A1.5 1.5 0 009.5 5h5A1.5 1.5 0 0016 3.5V3h2a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2h2z" fill="#335EEA" opacity=".3"/><path d="M11 2a1 1 0 012 0h1.5a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-5a.5.5 0 01-.5-.5v-1a.5.5 0 01.5-.5H11z" fill="#335EEA"/><rect fill="#335EEA" opacity=".3" x="7" y="10" width="5" height="2" rx="1"/><rect fill="#335EEA" opacity=".3" x="7" y="14" width="9" height="2" rx="1"/></g></svg>              </div>

              <div class="ms-5">

                <!-- Heading -->
                <h4 class="mb-1">
                  Magic Resume
                </h4>

                <!-- Text -->
                <p class="text-muted mb-5">
                  Magic Resume will adapt based on what positions the employer has available when it's shared.
                </p>

              </div>

            </div>
            <div class="d-flex">

              <!-- Icon -->
              <div class="icon text-primary">
                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h24v24H0z"/><path d="M3.5 21h17a1.5 1.5 0 001.5-1.5v-11A1.5 1.5 0 0020.5 7H10L7.44 4.44A1.5 1.5 0 006.378 4H3.5A1.5 1.5 0 002 5.5v14A1.5 1.5 0 003.5 21z" fill="#335EEA" opacity=".3"/><path d="M12 17.228l-2.198 1.207a.527.527 0 01-.727-.236.585.585 0 01-.054-.357l.42-2.557-1.778-1.812a.58.58 0 01-.01-.795.53.53 0 01.308-.164l2.457-.373 1.1-2.327a.528.528 0 01.965 0l1.099 2.327 2.457.373a.56.56 0 01.455.637.572.572 0 01-.157.322l-1.778 1.812.42 2.557a.56.56 0 01-.44.65.518.518 0 01-.34-.057L12 17.228z" fill="#335EEA" opacity=".3"/></g></svg>              </div>

              <div class="ms-5">

                <!-- Heading -->
                <h4 class="mb-1">
                  Employer Insights
                </h4>

                <!-- Text -->
                <p class="text-muted mb-0">
                  Learn about who's looking at your profile and what experience they're most interested in.
                </p>

              </div>

            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- CTA -->
    <section class="pt-6 pt-md-8">
      <div class="container pb-6 pb-md-8 border-bottom">
        <div class="row align-items-center">
          <div class="col-12 col-md">

            <!-- Heading -->
            <h3 class="mb-1">
              Apply in 15 minutes
            </h3>

            <!-- Text -->
            <p class="fs-lg text-muted mb-6 mb-md-0">
              Get your dream job without the hassle.
            </p>

          </div>
          <div class="col-12 col-md-auto">

            <!-- Button -->
            <a href="#!" class="btn btn-primary-soft me-1 lift">
              Learn more
            </a>

            <a href="#!" class="btn btn-primary lift">
              Get started
            </a>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- FOOTER -->
    <footer class="py-8 py-md-11 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-4 col-lg-3">
    
            <!-- Brand -->
            <img src="./assets/img/brand.svg" alt="..." class="footer-brand img-fluid mb-2">
    
            <!-- Text -->
            <p class="text-gray-700 mb-2">
              A better way to build.
            </p>
    
            <!-- Social -->
            <ul class="list-unstyled list-inline list-social mb-6 mb-md-0">
              <li class="list-inline-item list-social-item me-3">
                <a href="#!" class="text-decoration-none">
                  <img src="./assets/img/icons/social/instagram.svg" class="list-social-icon" alt="...">
                </a>
              </li>
              <li class="list-inline-item list-social-item me-3">
                <a href="#!" class="text-decoration-none">
                  <img src="./assets/img/icons/social/facebook.svg" class="list-social-icon" alt="...">
                </a>
              </li>
              <li class="list-inline-item list-social-item me-3">
                <a href="#!" class="text-decoration-none">
                  <img src="./assets/img/icons/social/twitter.svg" class="list-social-icon" alt="...">
                </a>
              </li>
              <li class="list-inline-item list-social-item">
                <a href="#!" class="text-decoration-none">
                  <img src="./assets/img/icons/social/pinterest.svg" class="list-social-icon" alt="...">
                </a>
              </li>
            </ul>
    
          </div>
          <div class="col-6 col-md-4 col-lg-2">
    
            <!-- Heading -->
            <h6 class="fw-bold text-uppercase text-gray-700">
              Products
            </h6>
    
            <!-- List -->
            <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Page Builder
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  UI Kit
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Styleguide
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Documentation
                </a>
              </li>
              <li>
                <a href="#!" class="text-reset">
                  Changelog
                </a>
              </li>
            </ul>
    
          </div>
          <div class="col-6 col-md-4 col-lg-2">
    
            <!-- Heading -->
            <h6 class="fw-bold text-uppercase text-gray-700">
              Services
            </h6>
    
            <!-- List -->
            <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Documentation
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Changelog
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Pagebuilder
                </a>
              </li>
              <li>
                <a href="#!" class="text-reset">
                  UI Kit
                </a>
              </li>
            </ul>
    
          </div>
          <div class="col-6 col-md-4 offset-md-4 col-lg-2 offset-lg-0">
    
            <!-- Heading -->
            <h6 class="fw-bold text-uppercase text-gray-700">
              Connect
            </h6>
    
            <!-- List -->
            <ul class="list-unstyled text-muted mb-0">
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Page Builder
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  UI Kit
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Styleguide
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Documentation
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Changelog
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Documentation
                </a>
              </li>
              <li>
                <a href="#!" class="text-reset">
                  Changelog
                </a>
              </li>
            </ul>
    
          </div>
          <div class="col-6 col-md-4 col-lg-2">
    
            <!-- Heading -->
            <h6 class="fw-bold text-uppercase text-gray-700">
              Legal
            </h6>
    
            <!-- List -->
            <ul class="list-unstyled text-muted mb-0">
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Documentation
                </a>
              </li>
              <li class="mb-3">
                <a href="#!" class="text-reset">
                  Changelog
                </a>
              </li>
              <li>
                <a href="#!" class="text-reset">
                  Pagebuilder
                </a>
              </li>
            </ul>
    
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </footer>

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

  </body>
</html>
