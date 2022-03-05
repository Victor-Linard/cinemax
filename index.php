<?php
require_once 'PHPScripts/config.php';
require_once 'PHPScripts/navBar.php';
require_once 'PHPScripts/functions.inc.php';
require_once 'PHPScripts/signInUpModal.php';
$config_db = $CONFIG['database'];
session_start();

if(isset($_POST['submitSignIn'])) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB  = new PDO('mysql:host='.$config_db['db_address'].';dbname='.$config_db['db_name'],$config_db['db_user'],$config_db['db_password'],$db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['administrateur']))
        $sql = 'SELECT password, active FROM staff WHERE email=?;';
    else
        $sql = 'SELECT password, active FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $_POST['email']);
    $req->execute();
    if ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($_POST['password'], $data['password']) && $data['active'] == 1) {
            $_SESSION['id'] = $_POST['email'];
            updateLastConnection($config_db, isset($_POST['administrateur']) ? 'staff' : 'customer', $_POST['email']);
            header('Location: index.php');
        }
        else {
            header('Location: ./index.php?wrongInfo');
            exit;
        }
    }
    else {
        header('Location: ./index.php?wrongInfo');
        exit;
    }
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
  <!-- START SWAL TEST -->
  <?php if(isset($_GET['wrongInfo'])) { ?>
      <script>connectionResult('wrongInfo'); </script>
  <?php } ?>
  <?php if(isset($_GET['mailAlreadyExist'])) { ?>
      <script>createAccountResult('mailAlreadyExist'); </script>
  <?php } ?>
  <?php if(isset($_GET['accountCreationError'])) { ?>
      <script>createAccountResult('accountCreationError'); </script>
  <?php } ?>
  <?php if(isset($_GET['accountCreationSuccess'])) { ?>
      <script>createAccountResult('accountCreationSuccess'); </script>
  <?php } ?>
  <?php if(isset($_GET['accountDeleteSuccess'])) { ?>
      <script>deleteAccountResult('accountDeleteSuccess'); </script>
  <?php } ?>
  <?php if(isset($_GET['accountDeleteError'])) { ?>
      <script>deleteAccountResult('accountDeleteError'); </script>
  <?php } ?>

  <?php echo getSignModal(); ?>
  <?php echo getNavBar($config_db, "navbar-dark navbar-togglable fixed-top"); ?>

    <!-- WELCOME -->
    <section data-jarallax data-speed=".8" class="pt-12 pb-10 pt-md-15 pb-md-14" style="background-image: url(Images/rows-red-seats-theater.jpg)">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-9 col-lg-8">

            <!-- Heading -->
            <h1 class="display-3 fw-bold text-white" id="welcomeHeadingSource">
              Les plus demandés <br />
              <span class="text-warning" data-typed='<?php echo get10BestSellers($config_db);?>'></span>
            </h1>

            <!-- Text -->
            <p class="fs-lg text-white-80 mb-6">
              Avec Cinemax, amenez le cinéma jusque dans votre salon.
            </p>

              <div class="input-group">
                  <a href="movies.php" class="btn w-50 btn-primary d-flex align-items-center">
                      Découvrez nos films<i class="fe fe-arrow-right ms-auto"></i>
                  </a>
              </div>
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
              Votre compte
            </h6>

            <!-- Heading -->
            <h2>
              Rejoignez-nous !
            </h2>

            <!-- Text -->
            <p class="lead text-muted mb-6 mb-md-0">
              Les étapes pour louer un film sont simples et vous pouvez le faire à la maison.
            </p>

          </div>
          <div class="col-12 col-md-6 col-xl-5">

            <div class="row gx-0">
              <div class="col-4">

                <!-- Image -->
                <div class="w-150 mt-9 p-1 bg-white shadow-lg" data-aos="fade-up" data-aos-delay="100">
                  <img src="assets/img/illustrations/illustration-3.png" class="img-fluid" alt="...">
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
                  Faisons connaissance.
                </h3>

                <!-- Text -->
                <p class="text-muted mb-6 mb-md-0">
                  Un prénom, un nom, un email et on vous ouvre la porte du Cinemax.
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
                  Choisissez votre film
                </h3>

                <!-- Text -->
                <p class="text-muted mb-6 mb-md-0">
                  Parcourez notre liste de film et réservez tout ce qu'il vous plaît.
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
                  On a hâte de vous rencontrer.
                </h3>

                <!-- Text -->
                <p class="text-muted mb-0">
                  Passez dans la boutique où vous avez réservez pour récupérer votre commande.
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
          <div class="row">
              <div class="col-12 col-md-10 col-lg-8">

                  <!-- Preheading -->
                  <h6 class="text-uppercase text-primary">
                      Quelques chiffres
                  </h6>

                  <!-- Heading -->
                  <h2 class="mb-6 mb-md-8">
                      Cinemax est la meilleure plateforme de location de film que vous n'avez jamais vu.
                  </h2>

                  <!-- Stats -->
                  <div class="d-flex">
                      <div class="pe-5">
                          <h3 class="mb-0">
                              <span data-countup='{"startVal": 0}' data-to="<?php echo getFilmNumber($config_db);?>" data-aos data-aos-id="countup:in">0</span>
                          </h3>
                          <p class="text-gray-700 mb-0">
                              Films
                          </p>
                      </div>
                      <div class="px-5">
                          <h3 class="mb-0">
                              <span data-countup='{"startVal": 0}' data-to="<?php echo getClientNumber($config_db);?>" data-aos data-aos-id="countup:in">0</span>
                          </h3>
                          <p class="text-gray-700 mb-0">
                              Clients
                          </p>
                      </div>
                      <div class="ps-5">
                          <h3 class="mb-0">
                              <span data-countup='{"startVal": "0"}' data-to="<?php echo getRentalNumber($config_db);?>" data-aos data-aos-id="countup:in">0</span>
                          </h3>
                          <p class="text-gray-700 mb-0">
                              Locations
                          </p>
                      </div>
                  </div>

              </div>
          </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

  </body>
</html>
