function createAccountResult(result) {
    var _title = '';
    var _text  = '';
    var _icon  = '';

    switch (result) {
        case 'mailAlreadyExist':
            _title = 'Oops ! 😕';
            _text = 'Une erreur est survenue lors de la création de votre compte, il semble que votre adresse email est déjà utilisée.';
            _icon = 'error';
            break;
        case 'sendFormError':
            _title = 'Oops ! 😕';
            _text = 'Une erreur est survenue lors de la création de votre compte, les données ont mal été transmises au serveur.';
            _icon = 'error';
            break;
        case 'accountCreationError':
            _title = 'Oops ! 😕';
            _text = 'Une erreur est survenue lors de la création de votre compte.';
            _icon = 'error';
            break;
        case 'mailSuccess':
            _title = 'Yeah ! 😎';
            _text = 'Ton compte à été créé avec succès ! Regardez votre boîte mail et validez votre compte !';
            _icon = 'success';
            break;
        case 'mailError':
            _title = 'Oops ! 😕';
            _text = 'Le mail de confirmation n\'a pas pu être envoyé ! Votre adresse mail est peut-être incorrecte.';
            _icon = 'error';
            break;
    }

    swal({
        title: _title,
        text: _text,
        icon: _icon,
    })
        .then((ok) => {
            window.location = window.location.href.split('?')[0];
        });
}

function connectionResult(result) {
    let title = '';
    let text  = '';
    let icon  = '';

    switch (result) {
        case 'wrongInfo':
            title = 'Oops !';
            text = 'Email ou mot de passe incorrecte.';
            icon = 'warning';
            break;
    }

    Swal.fire({
        title: title,
        text: text,
        icon: icon,
    }).then((result) => {
        window.location = window.location.href.split('?')[0];
    })
}
