function createAccountResult(result) {
    let title = '';
    let text  = '';
    let icon  = '';

    switch (result) {
        case 'mailAlreadyExist':
            title = 'Oops ! 😕';
            text = 'Une erreur est survenue lors de la création de votre compte, il semble que votre adresse email est déjà utilisée.';
            icon = 'error';
            break;
        case 'sendFormError':
            title = 'Oops ! 😕';
            text = 'Une erreur est survenue lors de la création de votre compte, les données ont mal été transmises au serveur.';
            icon = 'error';
            break;
        case 'accountCreationError':
            title = 'Oops ! 😕';
            text = 'Une erreur est survenue lors de la création de votre compte.';
            icon = 'error';
            break;
        case 'accountCreationSuccess':
            title = 'Yeah ! 😎';
            text = 'Votre compte à été créé avec succès !';
            icon = 'success';
            break;
    }

    Swal.fire({
        title: title,
        text: text,
        icon: icon,
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
