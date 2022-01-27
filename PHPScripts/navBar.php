<?php
function getNavBar($config, $class) {
    require_once 'functions.inc.php';
    $name = 'Mon compte';
    if (isset($_SESSION['id'])) {
        $name = getNameFromEmail($config, $_SESSION['id']);
        if (isStaff($config, $_SESSION['id']))
            $dropdown = '<li class="dropdown-item dropend">
                            <a class="dropdown-item" href="./admin.php">
                                Administration
                            </a>
                        </li>';
        else
            $dropdown = '<li class="dropdown-item dropend">
                            <a class="dropdown-item" href="./account-general.html">
                                Général
                            </a>
                        </li>';

        $dropdown .= '<li class="dropdown-item dropend">
                            <a class="dropdown-item" href="./PHPScripts/logout.php">
                                Déconnexion
                            </a>
                        </li>';
    }
    else {
        $dropdown = '<li class="dropdown-item dropend">
                            <a class="dropdown-item" data-bs-toggle="modal" href="#modalSigninHorizontal">
                                Connexion
                            </a>
                        </li>
                        <li class="dropdown-item dropend">
                            <a class="dropdown-item" data-bs-toggle="modal" href="#modalSignupHorizontal">
                                Inscription
                            </a>
                        </li>';
    }

    return '
    <nav class="navbar navbar-expand-lg '.$class.'">
      <div class="container">
    
        <!-- Brand -->
        <a class="navbar-brand" href="./index.php">
          <h3>Cinemax</h3>
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
    
          <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarAccount" data-bs-toggle="dropdown" href="#"
                       aria-haspopup="true" aria-expanded="false">
                        '.$name.'
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarAccount">'.$dropdown.'</ul>
                </li>
            </ul>
    
        </div>
    
      </div>
    </nav>';
}