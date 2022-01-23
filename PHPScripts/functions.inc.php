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
        $category = getFilmCategory($config, $data['film_id']);

        if ($i % 3 == 0)
            $str .= "</div><div class=\"row\" style=\"margin-bottom: 15px;\">";
        $str .= "<div class=\"col-4\"><div class=\"card shadow-light-lg lift\" data-bs-title=\"".$data['title']."\" 
                                                                               data-bs-rating=\"".$data['rating']."\" 
                                                                               data-bs-price=\"".$data['rental_rate']."\" 
                                                                               data-bs-rentalDuration=\"".$data['rental_duration']."\" 
                                                                               data-bs-description=\"".$data['description']."\" 
                                                                               data-bs-length=\"".$data['length']."\" 
                                                                               data-bs-language=\"".getLanguageName($config, $data['language_id'])."\" 
                                                                               data-bs-bonus=\"".$data['special_features']."\" 
                                                                               data-bs-category=\"".$category."\" 
                                                                               data-bs-actors=\"".getFilmActors($config, $data['film_id'])."\" 
                                                                               data-bs-stores=\"".getStores($config, $data['film_id'])."\" 
                                                                               data-bs-toggle=\"modal\" 
                                                                               data-bs-target=\"#filmDetailsModal\" 
                                                                               style=\"cursor: pointer;\">
                  <div class=\"card-body my-auto \" href=\"#!\">
                      <h3 class=\"mt-auto\">".$data['title']."</h3>
                      <h6 class='\"mt-auto\"'>".$category."</h6>
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

function getFilmInStoreDisponibility($config, $film_id, $store_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT COUNT(*) total FROM inventory WHERE film_id = ? AND store_id = ? AND inventory_in_stock(inventory_id);';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $film_id);
    $req->bindParam(2, $store_id);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['total'];
}

function getLanguageName($config, $language_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT name FROM language WHERE language_id = ?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $language_id);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['name'];
}

function getFilmCategory($config, $film_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT name FROM category WHERE category_id = (SELECT category_id FROM film_category WHERE film_id = ?);';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $film_id);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['name'];
}

function getFilmActors($config, $film_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT first_name, last_name FROM film_actor INNER JOIN actor a on film_actor.actor_id = a.actor_id WHERE film_id = ?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $film_id);
    $req->execute();
    $str = '';
    while ($data = $req->fetch(PDO::FETCH_ASSOC))
        $str .= ucfirst(strtolower($data['first_name'])).' '.ucfirst(strtolower($data['last_name'])).', ';

    return substr($str, 0, -1);
}

function getStores($config, $film_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM store;';
    $req = $DB->prepare($sql);
    $req->execute();
    $str = '';

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $contact = getStaffContact($config, $data['manager_staff_id']);
        $address = getStoreAddress($config, $data['store_id']);
        $disponibility = getStoreDisponibility($config, $data['store_id'], $film_id);
        $str .= $data['store_id'].':'.$contact.':'.$address.':'.$disponibility.'|';
    }
    return substr($str, 0, -1);
}

function getStaffContact($config, $staff_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT email FROM staff WHERE staff_id = ?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $staff_id);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['email'];
}

function getStoreAddress($config, $store_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'select address, city from address inner join city c on address.city_id = c.city_id where address_id = (select address_id from store where store_id = ?);';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $store_id);
    $req->execute();
    $res = $req->fetch(PDO::FETCH_ASSOC);
    return $res['address'].', '.$res['city'];
}

function getStoreDisponibility($config, $store_id, $film_id) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'CALL film_in_stock(?,?,@count);';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $film_id);
    $req->bindParam(2, $store_id);
    $req->execute();
    $i = 0;
    while ($req->fetch(PDO::FETCH_ASSOC))
        $i++;
    return $i;
}

function getAllCategory($config, $selectedValue = null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT category_id, name from category;';
    $req = $DB->prepare($sql);
    $req->execute();
    $str = '<option value="0">Toutes</option>';
    while ($res = $req->fetch(PDO::FETCH_ASSOC)) {
        $selected = $res['category_id'] == $selectedValue ? 'selected' : '';
        $str .= '<option value="'.$res['category_id'].'" '.$selected.'>'.$res['name'].'</option>';
    }
    return $str;
}

function getAllStore($config, $selectedValue = null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT store.store_id, a.address, c.city from store inner join address a on store.address_id = a.address_id inner join city c on a.city_id = c.city_id;';
    $req = $DB->prepare($sql);
    $req->execute();
    $str = '<option value="0">Tous</option>';
    while ($res = $req->fetch(PDO::FETCH_ASSOC)) {
        $selected = $res['store_id'] == $selectedValue ? 'selected' : '';
        $str .= '<option value="'.$res['store_id'].'" '.$selected.'>'.$res['address'].', '.$res['city'].'</option>';
    }
    return $str;
}

function getFilteredMovies($config, $filter) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = constructFilteredQueries(cleanUpFilter($filter));
    $req = $DB->prepare($sql);
    $req->execute();
    $str = "<div class=\"row\" style=\"margin-top: 15px;\">";
    $i = 0;

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        if (isset($filter['store']))
            $stock = getFilmInStoreDisponibility($config, $data['film_id'], $filter['store']);
        else
            $stock = getFilmDisponibility($config, $data['film_id']);
        $disponibility = $stock == 0 ? "<span class=\"badge bg-danger-soft\">Indisponible</span>" : "<span class=\"badge bg-success-soft\">Disponible : ".$stock."</span>";
        $category = getFilmCategory($config, $data['film_id']);

        if ($i % 3 == 0)
            $str .= "</div><div class=\"row\" style=\"margin-bottom: 15px;\">";
        $str .= "<div class=\"col-4\"><div class=\"card shadow-light-lg lift\" data-bs-title=\"".$data['title']."\" 
                                                                               data-bs-rating=\"".$data['rating']."\" 
                                                                               data-bs-price=\"".$data['rental_rate']."\" 
                                                                               data-bs-rentalDuration=\"".$data['rental_duration']."\" 
                                                                               data-bs-description=\"".$data['description']."\" 
                                                                               data-bs-length=\"".$data['length']."\" 
                                                                               data-bs-language=\"".getLanguageName($config, $data['language_id'])."\" 
                                                                               data-bs-bonus=\"".$data['special_features']."\" 
                                                                               data-bs-category=\"".$category."\" 
                                                                               data-bs-actors=\"".getFilmActors($config, $data['film_id'])."\" 
                                                                               data-bs-stores=\"".getStores($config, $data['film_id'])."\" 
                                                                               data-bs-toggle=\"modal\" 
                                                                               data-bs-target=\"#filmDetailsModal\" 
                                                                               style=\"cursor: pointer;\">
                  <div class=\"card-body my-auto \" href=\"#!\">
                      <h3 class=\"mt-auto\">".$data['title']."</h3>
                      <h6 class='\"mt-auto\"'>".$category."</h6>
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

function cleanUpFilter($filter) {
    foreach ($filter as $key => $value)
        if ($value == "" || ($key == "category" && $value == 0) || ($key == "disponibility" && $value == 0) || ($key == "store" && $value == 0))
            unset($filter[$key]);
    return $filter;
}

function preventSQLInjection($filter) {
    foreach ($filter as $key => $value) {
        switch ($key) {
            case "disponibility":
            case "minPrice":
            case "maxPrice":
            case "category": if (preg_match('/[,?;:\/=+%*^-_|!@#&><a-zA-Z]/', $value)) return true;
            case "title":if (preg_match('/[,?;:\/=+%*^-_|!@#&><]/', $value)) return true;
        }
    }
}

function constructFilteredQueries($filter) {
    $sql = 'SELECT DISTINCT f.film_id, f.title, f.rating, f.rental_rate, f.rental_duration, f.description, f.length, f.language_id, f.special_features  FROM film f INNER JOIN film_category fc on f.film_id = fc.film_id';
    $where = '';

    foreach ($filter as $key => $value) {
        switch ($key) {
            case "category": $where .= ' AND fc.category_id = '.$value; break;
            case "title": $where .= ' AND f.title LIKE "%'.$value.'%"'; break;
            case "minPrice": $where .= ' AND f.rental_rate > '.$value; break;
            case "maxPrice": $where .= ' AND f.rental_rate < '.$value; break;
            case "store": $sql .= ' INNER JOIN inventory i on f.film_id = i.film_id'; $where .= ' AND i.store_id = '.$value.' AND inventory_in_stock(i.inventory_id)'; break;
        }
    }
    $sql .= ' WHERE '.substr($where, 4, strlen($where)).';';

    return $sql;
}