<?php
require_once 'PHPScripts/config.php';
require_once 'PHPScripts/functions.inc.php';
$config_db = $CONFIG['database'];

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

$default = '<div class="card card-bleed shadow-light-lg">
              <div class="card-body">
                Sélectionnez un menu.
              </div>
            </div>';

$generale = '<div class="card card-bleed shadow-light-lg mb-6" id="general">
                <div class="card-header">
                    <!-- Heading -->
                    <h4 class="mb-0">
                        Basic Information
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form method="post" action="./PHPScripts/updateProfile.php?generale">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!-- Name -->
                                <div class="form-group">
                                    <label class="form-label" for="first_name">First name</label>
                                    <input class="form-control" id="first_name" name="first_name" type="text" placeholder="First name" value="'.getFirstNameFromEmail($config_db, $_SESSION['id']).'" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Name -->
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Last name</label>
                                    <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Last name" value="'.getLastNameFromEmail($config_db, $_SESSION['id']).'" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <!-- Email -->
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="name@address.com" value="'.$_SESSION['id'].'" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-auto">
                                <!-- Button -->
                                <button class="btn w-100 btn-primary" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Vous allez être déconnecter">
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>';

$security = '<div class="card card-bleed shadow-light-lg mb-6" id="security">
                <div class="card-header">
                    <!-- Heading -->
                    <h4 class="mb-0">
                        Security Information
                    </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="./PHPScripts/updateProfile.php?security">
                        <!-- Current password -->
                        <div class="form-group">
                            <label class="form-label" for="currentPassword">Current Password</label>
                            <input class="form-control" id="currentPassword" name="currentPassword" type="password">
                        </div>
                        <!-- New password -->
                        <div class="form-group">
                            <label class="form-label" for="newPassword">New Password</label>
                            <input class="form-control" id="newPassword" name="newPassword" type="password">
                        </div>
                        <!-- Confirm password -->
                        <div class="form-group">
                            <label class="form-label" for="confirmPassword">Confirm Password</label>
                            <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" onkeyup="verifyConfPassword();">
                            <div id="newPasswordIndicator"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-auto">
                                <!-- Button -->
                                <button class="btn w-100 btn-primary" type="submit">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>';

$current_rentals = getCustomerRentals($config_db, getCustomerIdFromEmail($config_db, $_SESSION['id']), ' AND r.return_date IS NULL', ' ORDER BY day_left_before_return ASC', false);

$passed_rentals = getCustomerRentals($config_db, getCustomerIdFromEmail($config_db, $_SESSION['id']), ' AND r.return_date IS NOT NULL', ' ORDER BY r.rental_date DESC', false);
