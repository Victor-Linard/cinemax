<?php

require_once 'PHPScripts/config.php';
require_once 'PHPScripts/functions.inc.php';
$config_db = $CONFIG['database'];

if (isset($_POST['submitSignUp'])) {
    $email = $_POST['email'];
    $password = encrypt($salt, htmlspecialchars($_POST['confirmedPassword']));
    $type_of_account = 'normal';
    if (isset($_POST['offers'])) {
        $offers = $_POST['offers'];
    } else {
        $offers = 0;
    }
    $avkey = generateAccountValidationKey();

    $DB = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_passwd, $db_options);

    //Verify if the email doesn't exist before insert
    $sql = 'SELECT email FROM users WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    if ($req->fetch(PDO::FETCH_ASSOC)) {
        header('Location: ../map.php?mailAlreadyExist');
        exit;
    }

    $sql = 'INSERT INTO users (email, password, account_validation_key, type_of_account, accept_offers_by_mail, creation_date, last_connection, favoris) VALUES (?,?,?,?,?,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(),"{}");';
    $req = $DB->prepare($sql);
    $req->bindParam(1, htmlspecialchars($email));
    $req->bindParam(2, $password);
    $req->bindParam(3, $avkey);
    $req->bindParam(4, $type_of_account);
    $req->bindParam(5, $offers);
    $req->execute();

    //Verify if the user has been correctly insert
    $sql = 'SELECT account_validation_key FROM users WHERE email=?;';
    $req = $DB->prepare($sql);
    $req->bindParam(1, $email);
    $req->execute();
    if ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $link = $__DOMAIN__ . '/manageAccount.php?avkey=' . $data['account_validation_key'];

        $receveir_mail = array($email);
        $receveir_name = array('Nouveau membre');
        $subject = 'Passim - Validation de ton compte';
        $body = 'Bonjour,<br/> Vous venez de créer un compte sur notre plateforme Passim, merci beaucoup! Il reste une dernière étape avant de pouvoir accéder à toutes les fonctionnalitées.<br/><br/>Cliquez simplement sur le lien ci-dessous et vous pourrez vous connecter !<br/><br/> <a href="' . $link . '">Activer mon compte</a>';

        if (sendMail($receveir_mail, $receveir_name, $subject, $body)) {
            header('Location: ../index.php?mailSuccess');
            exit;
        } else {
            header('Location: ../index.php?mailError');
            exit;
        }
    } else {
        header('Location: ../index.php?accountCreationError');
        exit;
    }

} else {
    header('Location: ../index.php?sendFormError');
    exit;
}
