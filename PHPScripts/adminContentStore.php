<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once './PHPScripts/config.php';
require_once './PHPScripts/functions.inc.php';
require_once './PHPScripts/adminFunctions.inc.php';
$config_db = $CONFIG['database'];
if (!isset($_SESSION['id']) || !isStaff($config_db, $_SESSION['id'])) {
    header('Location: ./index.php');
    exit;
}

function constructStoreDashBoard($config_db, $store=null) {
    $storeName = is_null($store) ? 'tous' : $store;
    $date = new DateTime(date('Y-m-d'));
    $shortDate = $date->format('d M');
    $dash = '';
    $dash .= '<div class="header">
                    <div class="container-fluid">
                        <div class="header-body">
                            <div class="row align-items-end">
                                <div class="col">
                                    <!-- Pretitle -->
                                    <h6 class="header-pretitle">
                                        Dashboard
                                    </h6>
                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Magasin : '.$storeName.'
                                    </h1>
                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .header-body -->
                    </div>
                </div> <!-- / .header -->
                <div class="container-fluid">
                    <div class="row kanban-container">
                        <div class="col-12 col-lg-6 col-xl kanban-category">
                            <div class="card kanban-item">
                                <div class="card-body">
                                    <div class="row align-items-center gx-0">
                                        <div class="col">
                                            <h6 class="text-uppercase text-muted mb-2">
                                                Chiffre d\'affaire, '.$shortDate.'
                                            </h6>
                                            <span class="h2 mb-0">
                                              ' . getBenefits($config_db, date("Y-m-d"), $store) . ' €
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="h2 fe fe-dollar-sign mb-0 text-success"></span>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl kanban-category">
                            <div class="card kanban-item">
                                <div class="card-body">
                                    <div class="row align-items-center gx-0">
                                        <div class="col">
                                            <h6 class="text-uppercase text-muted mb-2">
                                                Location, '.$shortDate.'
                                            </h6>
                                            <span class="h2 mb-0">
                                                ' . getNumberRental($config_db, date("Y-m-d"), $store) . '
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="h2 fe fe-film text-primary mb-0"></span>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl kanban-category">
                            <div class="card kanban-item">
                                <div class="card-body">
                                    <div class="row align-items-center gx-0">
                                        <div class="col">
                                            <h6 class="text-uppercase text-muted mb-2">
                                                DVD en retard
                                            </h6>
                                            <span class="h2 mb-0">
                                              ' . getNumberOverdueDVD($config_db, $store) . '
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="h2 fe fe-clock text-warning mb-0"></span>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl kanban-category">
                            <div class="card kanban-item">
                                <div class="card-body">
                                    <div class="row align-items-center gx-0">
                                        <div class="col">
                                            <h6 class="text-uppercase text-muted mb-2">
                                                Connexion, '.$shortDate.'
                                            </h6>
                                            <span class="h2 mb-0">
                                              ' . getNumberConnection($config_db, date("Y-m-d"), $store) . '
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="h2 fe fe-users text-info mb-0"></span>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                            </div>
                        </div>
                    </div> <!-- / .row -->
                    <div class="row kanban-container">
                        <div class="col-12 col-xl-8 kanban-category">
                            <div class="card kanban-item">
                                <div class="card-header">
                                    <h4 class="card-header-title">
                                        Locations
                                    </h4>        
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="rentalChart" class="chart-canvas"></canvas>
                                    </div>
                                    <script>
                                          new Chart("rentalChart", {
                                            type: "bar",
                                            options: {
                                              scales: {
                                                y: {
                                                  ticks: {
                                                    callback: function(value) {
                                                      return value;
                                                    }
                                                  }
                                                }
                                              }
                                            },
                                            data: {
                                              labels: '.getSevenDayRentals($config_db, date('Y-m-d'), $store)[1].',
                                              datasets: [{
                                                label: "Location",
                                                data: '.getSevenDayRentals($config_db, date('Y-m-d'), $store)[0].'
                                              },{
                                                label: "Chiffre d\'affaire",
                                                data: '.getSevenDayBenefits($config_db, date('Y-m-d'), $store).',
                                                backgroundColor: "#62D586"
                                              }]
                                            }
                                          });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4 kanban-category">
                            <div class="card kanban-item">
                                <div class="card-header">
                                    <h4 class="card-header-title">
                                        Stock
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="chart chart-appended">
                                        <canvas id="trafficChart" class="chart-canvas" data-toggle="legend" data-target="#trafficChartLegend"></canvas>
                                    </div>
                                    <div id="trafficChartLegend" class="chart-legend">
                                        <div>
                                            <span class="chart-legend-item">
                                                <span class="chart-legend-indicator" style="background-color: #407CDE"></span>
                                                Loué
                                            </span>
                                            <span class="chart-legend-item">
                                                <span class="chart-legend-indicator" style="background-color: #EFC45C"></span>
                                                En retard
                                            </span>
                                            <span class="chart-legend-item">
                                                <span class="chart-legend-indicator" style="background-color: #B5CEF0"></span>
                                                En stock
                                            </span>
                                        </div>
                                    </div>
                                    <script>
                                      new Chart("trafficChart", {
                                        type: "doughnut",
                                        options: {
                                          plugins: {
                                            tooltip: {
                                              callbacks: {
                                                afterLabel: function(value) {
                                                  return value
                                                }
                                              }
                                            }
                                          }
                                        },
                                        data: {
                                          labels: '.getStock($config_db, $store)[1].',
                                          datasets: [{
                                            data: '.getStock($config_db, $store)[0].',
                                            backgroundColor: ["#EFC45C", "#407CDE", "#B5CEF0"]
                                          }]
                                    }
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div> <!-- / .row -->
                    <div class="row">
                        <div class="col-12 kanban-category">
                            <div class="card kanban-item">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-header-title">
                                                Meilleurs clients <span class="badge bg-info-soft">1 mois glissant</span>
                                            </h4>
            
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                                '.constructBestClientTable($config_db, $store).'
                            </div>
            
                        </div>
                    </div> <!-- / .row -->
                </div>';
    return $dash;
}
