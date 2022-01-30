<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'PHPScripts/config.php';
require_once 'PHPScripts/functions.inc.php';
require_once 'PHPScripts/navBar.php';
require_once 'PHPScripts/signInUpModal.php';
$config_db = $CONFIG['database'];

session_start();
if(isset($_POST['submitSignIn'])) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB  = new PDO('mysql:host='.$config_db['db_address'].';dbname='.$config_db['db_name'],$config_db['db_user'],$config_db['db_password'],$db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['administrateur']))
        $sql = 'SELECT password FROM staff WHERE email=?;';
    else
        $sql = 'SELECT password FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $_POST['email']);
    $req->execute();
    if ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($_POST['password'], $data['password'])) {
            $_SESSION['id'] = $_POST['email'];
            header('Location: movies.php');
        }
        else {
            header('Location: ./movies.php?wrongInfo');
            exit;
        }
    }
    else {
        header('Location: ./movies.php?wrongInfo');
        exit;
    }
}
if (isset($_POST))
    $filter = cleanUpFilter($_POST);
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="JSScripts/launchSwal.js"></script>

    <!-- Title -->
    <title>Cinemax</title>
</head>
<body class="bg-light">

    <?php echo getSignModal(); ?>
    <?php echo getNavBar($config_db, "navbar-light bg-light border-bottom mb-3"); ?>

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
                                    <select name="category" class="form-select form-select-sm" data-choices id="filmCategory">
                                        <?php
                                        if (isset($_POST['category']))
                                            echo getAllCategory($CONFIG['database'], $_POST['category']);
                                        else
                                            echo getAllCategory($CONFIG['database']);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group mb-0">
                                    <!-- Label -->
                                    <label class="form-label" for="filmStore">Disponible en magasin</label>
                                    <!-- Select -->
                                    <select name="store" class="form-select form-select-sm" data-choices id="filmStore">
                                        <?php
                                        if (isset($_POST['store']))
                                            echo getAllStore($CONFIG['database'], $_POST['store']);
                                        else
                                            echo getAllStore($CONFIG['database']);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group mb-0">
                                    <!-- Label -->
                                    <label class="form-label" for="filmTitle">Titre</label>
                                    <!-- Select -->
                                    <input name="title" class="form-control form-control-sm" id="filmTitle" type="text" placeholder="Entrez du texte" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '';?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1rem;">
                            <div class="col-12 col-md-2">
                                <div class="form-group mb-0">
                                    <!-- Label -->
                                    <label class="form-label" for="filmMinPrice">De</label>
                                    <!-- Select -->
                                    <input name="minPrice" class="form-control form-control-sm" id="filmMinPrice" type="text" placeholder="€" value="<?php echo isset($_POST['minPrice']) ? $_POST['minPrice'] : '';?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group mb-0">
                                    <!-- Label -->
                                    <label class="form-label" for="filmMaxPrice">À</label>
                                    <!-- Select -->
                                    <input name="maxPrice" class="form-control form-control-sm" id="filmMaxPrice" type="text" placeholder="€" value="<?php echo isset($_POST['maxPrice']) ? $_POST['maxPrice'] : '';?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group mb-0">
                                    <!-- Label -->
                                    <label class="form-label" for="filmFilterSend">Encore un clique.</label>
                                    <button name="filter" type="submit" formmethod="post" class="w-100 btn btn-primary-soft btn-sm mb-1 lift" id="filmFilterSend">
                                        Filtrer
                                    </button>
                                </div>
                            </div>
                            <?php
                            if (isset($filter) && sizeof($filter) > 0) {
                                echo '<div class="col-12 col-md-1">
                                <div class="form-group mb-0">
                                    <label class="form-label" for="filmFilterSend">Filtres</label>
                                    <a href="./PHPScripts/deleteFilter.php" class="btn btn-rounded-circle btn-danger lift">
                                        <i class="fe fe-trash-2"></i>
                                    </a>
    
                                </div>
                            </div>';
                            }
                            ?>
                        </div> <!-- / .row -->
                    </form>
                </div>
            </div> <!-- / .row -->
            <div class="row align-items-center mb-5">
                <?php
                if (isset($filter) && preventSQLInjection($filter)) {
                    echo '<script>window.location.href = "https://img.over-blog-kiwi.com/1/99/88/66/20180607/ob_cac6fe_3f28281b-3377-45e2-96f3-34ebc2c7879c.png"</script>';
                    exit(0);
                }
                if (isset($filter) && sizeof($filter) > 0) {
                    echo getFilteredMovies($CONFIG['database'], $filter);}
                else
                    echo getMovies($CONFIG['database']);
                ?>
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
