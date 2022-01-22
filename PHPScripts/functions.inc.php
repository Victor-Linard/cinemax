<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getMovies($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM film;';
    $req = $DB->prepare($sql);
    $req->execute();
    $str = "<div class=\"row\" style=\"margin-top: 15px;\">";
    $i = 0;
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $stock = getFilmDisponibility($config, $data['film_id']);
        $disponibility = $stock == 0 ? "<span class=\"badge bg-danger-soft\">Indisponible</span>" : "<span class=\"badge bg-success-soft\">Disponible : ".$stock."</span>";

        if ($i % 3 == 0)
            $str .= "</div><div class=\"row\" style=\"margin-bottom: 15px;\">";
        $str .= "<div class=\"col-4\"><div class=\"card shadow-light-lg lift\" data-bs-title=\"".$data['title']."\" data-bs-rating=\"".$data['rating']."\" data-bs-toggle=\"modal\" data-bs-target=\"#filmDetailsModal\" style=\"cursor: pointer;\">
                  <div class=\"card-body my-auto \" href=\"#!\">
                      <h3 class=\"mt-auto\">".$data['title']."</h3>
                      <h6 class='\"mt-auto\"'>".ratingToMeaning($data['rating'])."</h6>
                      <p class=\"mb-0 text-muted\">
                      ".$data['description']."
                      </p>
                  </div>
                  <div class=\"card-meta\" href=\"#!\">
                      <hr class=\"card-meta-divider\">
                      <h6 class=\"text-uppercase text-muted me-2 mb-0\">".$data['rental_rate']." €</h6>
                      <p class=\"h6 text-uppercase text-muted mb-0 ms-auto\">".$disponibility."</p>
                  </div>
              </div>
          </div>";
        $i++;
    }

    $color = $i == 0 ? "bg-danger-soft" : "bg-primary-soft";
    return "<div class=\"col\">
                <div class=\"col-auto\">
                    <span class=\"badge rounded-pill ".$color."\">
                        <span class=\"h6 text-uppercase\">".$i." résultats</span>
                    </span>
                </div>
            </div>".$str;
}

function ratingToMeaning($str) {
    switch ($str) {
        case "G": return "<span class=\"fe fe-user\"></span> Tout public";
        case "PG": return "<span class=\"fe fe-alert-circle\"></span> Mineur";
        case "G-13": return "<span class=\"fe fe-slash\"></span> -13 ans";
        case "R": return "<span class=\"fe fe-users\"></span> Avec adulte";
        case "NC-17": return "<span class=\"fe fe-slash\"></span> -17 ans";
        default: return "";
    }
}

function getFilmDisponibility($config, $film_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT COUNT(*) total FROM inventory WHERE film_id = ? AND inventory_in_stock(inventory_id);';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $film_id);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['total'];
}