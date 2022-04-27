<?php
require_once './PHPScripts/config.php';
require_once './PHPScripts/functions.inc.php';
require_once './PHPScripts/adminFunctions.inc.php';
$config_db = $CONFIG['database'];
if (!isset($_SESSION['id']) || !isStaff($config_db, $_SESSION['id'])) {
    header('Location: ./index.php');
    exit;
}
$title = isset($_GET['customer']) ? 'Clients' : 'Staff';
$usersList = constructUsersTable($config_db, isset($_GET['customer']) ? 'customer' : 'staff');
$users = '<div class="header">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-end">
                            <div class="col">
                                <h6 class="header-pretitle">
                                    Utilisateurs
                                </h6>
                                <h1 class="header-title">'.$title.'</h1>
                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .header-body -->
                </div>
            </div> <!-- / .header -->
            <div class="container-fluid">
                <div class="row">
                    <div class="card" data-list="{&quot;valueNames&quot;: [&quot;users-number&quot;, &quot;users-firstname&quot;, &quot;users-lastname&quot;, &quot;users-email&quot;, &quot;users-lastupdate&quot;]}">
                        <div class="card-header">
                            <form>
                                <div class="input-group input-group-flush input-group-merge input-group-reverse">
                                    <input class="form-control list-search" type="search" placeholder="Search">
                                    <span class="input-group-text">
                                  <i class="fe fe-search"></i>
                                </span>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table">
                                <thead>
                                <tr>
                                    <th>
                                        <a href="#" class="text-muted list-sort" data-sort="users-number">
                                            Client
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted list-sort" data-sort="users-firstname">
                                            Prénom
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted list-sort" data-sort="users-lastname">
                                            Nom
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted list-sort" data-sort="users-email">
                                            Email
                                        </a>
                                    </th>
                                    <th colspan="2">
                                        <a href="#" class="text-muted list-sort" data-sort="users-lastupdate">
                                            Dernière connexion
                                        </a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                    '.$usersList.'
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>     
            </div>';

if (isset($_GET['userId'])) {
    $userId = intval($_GET['userId']);
    $userEmail = getCustomerEmailFromId($config_db, $userId);
    $userDetails = '<div class="header">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-end">
                            <div class="col">
                                <h6 class="header-pretitle">
                                    Informations utilisateur
                                </h6>
                                <h1 class="header-title">'.getFullNameFromEmail($config_db, $userEmail, false).'</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">';
    $userDetails .= getCustomerRentals($config_db, $userId, ' AND r.return_date IS NULL', ' ORDER BY day_left_before_return ASC', true);
    $userDetails .= getCustomerRentals($config_db, $userId, ' AND r.return_date IS NOT NULL', ' ORDER BY r.rental_date DESC', false);

    $userDetails .= '</div></div>';
}