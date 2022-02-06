<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function listAllStore($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT store_id FROM store;';
    $req = $DB->prepare($sql);
    $req->execute();
    $str = '';
    while ($data = $req->fetch(PDO::FETCH_ASSOC))
        $str .= '<li class="nav-item"><a href="./admin.php?store_'.$data['store_id'].'" class="nav-link ">Magasin '.$data['store_id'].'</a></li>';

    return $str;
}

function getStoreList($config) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT store_id FROM store;';
    $req = $DB->prepare($sql);
    $req->execute();
    $stores = array();
    while ($data = $req->fetch(PDO::FETCH_ASSOC))
        $stores[] = $data['store_id'];
    return $stores;
}

function getBenefits($config, $date, $store=null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (is_null($store)) {
        $sql = 'SELECT SUM(f.rental_rate) AS ca FROM rental r INNER JOIN inventory i on r.inventory_id = i.inventory_id INNER JOIN film f on i.film_id = f.film_id WHERE DATE(rental_date)=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $date);
    }
    else {
        $sql = 'SELECT SUM(f.rental_rate) AS ca FROM rental r INNER JOIN inventory i on r.inventory_id = i.inventory_id INNER JOIN film f on i.film_id = f.film_id WHERE DATE(rental_date)=? AND i.store_id=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $date);
        $req->bindParam(2, $store);
    }
    $req->execute();
    $sum = $req->fetch(PDO::FETCH_ASSOC)['ca'];
    return $sum == '' ? 0 : $sum;
}

function getNumberRental($config, $date, $store=null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (is_null($store)) {
        $sql = 'SELECT COUNT(rental_id) AS count FROM rental WHERE DATE(rental_date)=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $date);
    }
    else {
        $sql = 'SELECT COUNT(r.rental_id) AS count FROM rental r INNER JOIN inventory i ON r.inventory_id = i.inventory_id WHERE DATE(r.rental_date)=? AND i.store_id=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $date);
        $req->bindParam(2, $store);
    }
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['count'];
}

function getNumberConnection($config, $date, $store=null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (is_null($store)) {
        $sql = 'SELECT COUNT(customer_id) AS count FROM customer WHERE DATE(last_update)=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $date);
    }
    else {
        $sql = 'SELECT COUNT(customer_id) AS count FROM customer WHERE DATE(last_update)=? AND store_id=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $date);
        $req->bindParam(2, $store);
    }
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['count'];
}

function getNumberOverdueDVD($config, $store=null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (is_null($store)) {
        $sql = 'SELECT COUNT(*) AS count FROM rental INNER JOIN customer ON rental.customer_id = customer.customer_id INNER JOIN address ON customer.address_id = address.address_id INNER JOIN inventory ON rental.inventory_id = inventory.inventory_id INNER JOIN film ON inventory.film_id = film.film_id WHERE rental.return_date IS NULL AND rental_date + INTERVAL film.rental_duration DAY < CURRENT_DATE();';
        $req = $DB->prepare($sql);
    }
    else {
        $sql = 'SELECT COUNT(*) AS count FROM rental INNER JOIN customer ON rental.customer_id = customer.customer_id INNER JOIN address ON customer.address_id = address.address_id INNER JOIN inventory ON rental.inventory_id = inventory.inventory_id INNER JOIN film ON inventory.film_id = film.film_id WHERE rental.return_date IS NULL AND rental_date + INTERVAL film.rental_duration DAY < CURRENT_DATE() AND inventory.store_id=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $store);
    }
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['count'];
}

function getSevenDayRentals($config, $startDate, $store=null) {
    $data = ']';
    $label = ']';

    for ($i=0; $i < 7; $i++) {
        $date = new DateTime($startDate);
        $date->sub(new DateInterval('P'.$i.'D'));
        $data = ','.getNumberRental($config, $date->format('Y-m-d'), $store).$data;
        $label = ',"'.$date->format('d F').'"'.$label;
    }

    return array('['.substr($data, 1, strlen($data)), '['.substr($label, 1, strlen($label)));
}

function getNumberInventoryInStock($config, $store=null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (is_null($store)) {
        $sql = 'SELECT COUNT(*) AS count FROM inventory WHERE inventory_in_stock(inventory_id);';
        $req = $DB->prepare($sql);
    }
    else {
        $sql = 'SELECT COUNT(*) AS count FROM inventory WHERE inventory_in_stock(inventory_id) AND store_id=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $store);
    }
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['count'];
}

function getNumberInventoryTotal($config, $store=null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (is_null($store)) {
        $sql = 'SELECT COUNT(*) AS count FROM inventory;';
        $req = $DB->prepare($sql);
    }
    else {
        $sql = 'SELECT COUNT(*) AS count FROM inventory WHERE store_id=?;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $store);
    }
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC)['count'];
}

function getStock($config, $store=null) {
    $overdue = getNumberOverdueDVD($config, $store);
    $stock = getNumberInventoryInStock($config, $store);
    $rent = getNumberInventoryTotal($config, $store) - $stock - $overdue;

    $data = '['.$overdue.','.$rent.','.$stock.']';
    $label = '["En retard","Loué","En stock"]';
    return array($data, $label);
}

function getSevenDayBenefits($config, $startDate, $store=null) {
    $data = ']';

    for ($i=0; $i < 7; $i++) {
        $date = new DateTime($startDate);
        $date->sub(new DateInterval('P'.$i.'D'));
        $data = ','.getBenefits($config, $date->format('Y-m-d'), $store).$data;
    }

    return '['.substr($data, 1, strlen($data));
}

function constructBestClientTable($config, $store=null) {
    $db_options = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $DB = new PDO('mysql:host='. $config['db_address'] .';dbname='.$config['db_name'], $config['db_user'], $config['db_password'], $db_options);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (is_null($store)) {
        $sql = 'SELECT p.customer_id,
                CONCAT(c.first_name, " ", c.last_name) AS name,
                SUM(p.amount) AS sum_payment,
                COUNT(p.payment_id) AS count_order,
                DATEDIFF(NOW(), c.create_date) / 365 AS time_since_join
            FROM payment AS p INNER JOIN customer c on p.customer_id = c.customer_id
            WHERE
                DATE(p.payment_date) BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
            GROUP BY customer_id
            ORDER BY sum_payment DESC
            LIMIT 5;';
        $req = $DB->prepare($sql);
    }
    else {
        $sql = 'SELECT p.customer_id,
                    CONCAT(c.first_name, " ", c.last_name) AS name,
                    SUM(p.amount) AS sum_payment,
                    COUNT(p.payment_id) AS count_order,
                    DATEDIFF(NOW(), c.create_date) / 365 AS time_since_join
                FROM payment AS p
                    INNER JOIN customer c on p.customer_id = c.customer_id
                    INNER JOIN rental r on p.rental_id = r.rental_id
                    INNER JOIN inventory i on r.inventory_id = i.inventory_id
                WHERE
                    DATE(p.payment_date) BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
                    AND i.store_id = ?
                GROUP BY customer_id
                ORDER BY sum_payment DESC
                LIMIT 5;';
        $req = $DB->prepare($sql);
        $req->bindParam(1, $store);
    }
    $req->execute();
    $table = '<div class="table-responsive mb-0">
                <table class="table table-sm table-nowrap card-table">
                    <thead>
                    <tr>
                        <th scope="col"><a class="text-muted">#</a></th>
                        <th><a class="text-muted">Client</a></th>
                        <th><a class="text-muted">Paiements</a></th>
                        <th><a class="text-muted">Commandes</a></th>
                        <th><a class="text-muted">Membre depuis</a></th>
                    </tr>
                    </thead>
                    <tbody class="list">';
    $i = 1;
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $timeSinceJoin = $data['time_since_join'] < 1 ? round($data['time_since_join']*12).' mois' : round($data['time_since_join']).' ans';
        $table .= '<tr><th scope="row" class="tables-row">'.$i.'</th>
                    <td>'.$data['name'].'</td>
                    <td>'.$data['sum_payment'].'€</td>
                    <td>'.$data['count_order'].'</td>
                    <td>'.$timeSinceJoin.'</td></tr>';
        $i++;
    }
    return $table.'</tbody></table></div>';
}