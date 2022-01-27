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

function confirmRental(storeid, filmid, storeAdress, filmTitle) {
    Swal.fire({
        title: "Confirmation",
        text: "Êtes-vous sûr de vouloir louer "+filmTitle+" ?",
        icon: "question",
        footer: 'Magasin : ' + storeAdress,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmer',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Merci !',
                'Le film vous est réservé pour une durée de X jours.',
                'success'
            )
        }
    })
}
