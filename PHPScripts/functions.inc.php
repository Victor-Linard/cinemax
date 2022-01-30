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

        $str .= constructMovieCard($config, $i, $data, $disponibility, $category);
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

        $str .= constructMovieCard($config, $i, $data, $disponibility, $category);
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

function constructMovieCard($config, $i, $data, $disponibility, $category) {
    $card = '';
    if ($i % 3 == 0)
        $card .= "</div><div class=\"row\" style=\"margin-bottom: 15px;\">";
    $card .= "<div class=\"col-4\"><div class=\"card shadow-light-lg lift\" data-bs-filmid=\"".$data['film_id']."\" 
                                                                            data-bs-title=\"".$data['title']."\"
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

    return $card;
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

function isStaff($config, $email) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT staff_id FROM staff WHERE email = ?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC);
}

function getFilmNumber($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT COUNT(film_id) cfi FROM film;';
    $req = $DB->prepare($sql);
    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC)['cfi'];
}

function getClientNumber($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT COUNT(customer_id) cci FROM customer;';
    $req = $DB->prepare($sql);
    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC)['cci'];
}

function getRentalNumber($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT COUNT(rental_id) cri FROM rental;';
    $req = $DB->prepare($sql);
    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC)['cri'];
}

function get10LastNewFilm($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM film ORDER BY last_update DESC LIMIT 10;';
    $req = $DB->prepare($sql);
    $req->execute();
    $str = '{"strings": [';
    while ($data = $req->fetch(PDO::FETCH_ASSOC))
        $str .= '"'.$data['title'].'",';

    return substr($str, 0, -1).']}';
}

function get10BestSellers($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT COUNT(i.film_id) count, i.film_id, f.title FROM rental INNER JOIN inventory i on rental.inventory_id = i.inventory_id INNER JOIN film f on i.film_id = f.film_id GROUP BY i.film_id ORDER BY count DESC;';
    $req = $DB->prepare($sql);
    $req->execute();
    $str = '{"strings": [';
    while ($data = $req->fetch(PDO::FETCH_ASSOC))
        $str .= '"'.$data['title'].'",';

    return substr($str, 0, -1).']}';
}

function getFullNameFromEmail($config, $email) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT CONCAT(customer.first_name, " ", customer.last_name) AS customer FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    return $data['customer'];
}

function getFirstNameFromEmail($config, $email) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT first_name FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    return $data['first_name'];
}

function getLastNameFromEmail($config, $email) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT last_name FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    return $data['last_name'];
}

function emailAlreadyExist($config, $email) {
    $db_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host=' . $config['db_address'] . ';dbname=' . $config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT email FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    if ($req->fetch(PDO::FETCH_ASSOC))
        return true;
    else
        return false;
}

function getCustomerIdFromEmail($config, $email) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT customer_id FROM customer WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    return $data['customer_id'];
}

function getCustomerRentals($config, $id, $returned, $orderBy) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT
       r.rental_id,
       r.rental_date,
       r.inventory_id,
       r.customer_id,
       r.return_date,
       i.film_id,
       f.title,
       f.rental_duration,
       f.replacement_cost,
       r.rental_date + INTERVAL f.rental_duration DAY AS prevision_return_date,
       DATEDIFF(r.rental_date + INTERVAL f.rental_duration DAY, NOW()) AS day_left_before_return
FROM rental r
    INNER JOIN inventory i on r.inventory_id = i.inventory_id
    INNER JOIN film f on i.film_id = f.film_id
WHERE customer_id=?
'.$returned.$orderBy.';';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $id);
    $req->execute();

    $str = '';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $str .= constructRentalscard($data['title'], $data['rental_date'], $data['return_date'], $data['prevision_return_date'], $data['day_left_before_return'], 100-(100*intval($data['day_left_before_return'])/$data['rental_duration']), $data['replacement_cost']);
    }

    return $str;
}

function constructRentalsCard($film_title, $rental_date, $return_date, $prevision_return_date, $day_left, $percentage, $replacement_cost) {
    $rental_date_txt = 'Loué le '.strToDate(explode(" ",$rental_date)[0]).', à rendre le : '.strToDate(explode(" ",$prevision_return_date)[0]);
    $action = '<div class="dropdown">
                      <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a href="#!" class="dropdown-item">
                          Rendre
                        </a>
                        <a href="#!" class="dropdown-item">
                          Déclarer perdu : '.$replacement_cost.'€
                        </a>
                      </div>
                    </div>';
    if (is_null($return_date) && $day_left >= 0) {
        if ($day_left == 0)
            $day_left_txt = '<div class="small me-2">Reste : aujourd\'hui</div>';
        else
            $day_left_txt = '<div class="small me-2">Reste : '.($day_left == 1 ? $day_left.' jour</div>' : $day_left.' jours</div>');
        $progess = '<div class="col">            
                        <div class="progress progress-sm">
                          <div class="progress-bar" role="progressbar" style="width: '.$percentage.'%" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>';
    }
    elseif (is_null($return_date) && $day_left < 0) {
        if ($day_left == -1)
            $day_left_txt = '<div class="small me-2">Retard : '.abs($day_left).' jour</div>';
        else
            $day_left_txt = '<div class="small me-2">Retard : '.abs($day_left).' jours</div>';
        $progess = '<div class="col">            
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>';
    }
    else {
        $rental_date_txt = 'Loué du '.strToDate(explode(" ",$rental_date)[0]).' au '.strToDate(explode(" ",$return_date)[0]);
        $day_left_txt = "";
        $progess = "";
        $action = "";
    }

    return '<div class="card shadow-light-lg mb-5">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col ms-n2">
                    <h4 class="mb-1">
                      '.$film_title.'
                    </h4>            
                    <p class="small text-muted mb-1">'.$rental_date_txt.'</p>            
                    <div class="row align-items-center g-0">
                      <div class="col-auto">            
                        '.$day_left_txt.'
                      </div>
                      '.$progess.'
                    </div>
                  </div>
                  <div class="col-auto">            
                    '.$action.'
                  </div>
                </div>
              </div>
            </div>';
}

function strToDate($date) {
    $day = explode("-", $date)[2];
    $year = explode("-", $date)[0];
    switch (explode("-", $date)[1]) {
        case "01": return $day." janvier ".$year;
        case "02": return $day." février ".$year;
        case "03": return $day." mars ".$year;
        case "04": return $day." avril ".$year;
        case "05": return $day." mai ".$year;
        case "06": return $day." juin ".$year;
        case "07": return $day." juillet ".$year;
        case "08": return $day." août ".$year;
        case "09": return $day." septemnbre ".$year;
        case "10": return $day." octobre ".$year;
        case "11": return $day." novembre ".$year;
        case "12": return $day." décembre ".$year;
    }
    return "No date";
}

function getInventoryId($config, $film, $store) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT inventory_id FROM inventory WHERE film_id=? AND store_id=? AND inventory_in_stock(inventory_id);';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $film);
    $req->bindParam(2, $store);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    return $data['inventory_id'];
}

function getStoreManager($config, $storeid) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT manager_staff_id FROM store WHERE store_id=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $storeid);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    return $data['manager_staff_id'];
}