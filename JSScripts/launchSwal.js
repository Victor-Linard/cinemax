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

function accountModificationResult(result) {
    let title = '';
    let text  = '';
    let icon  = '';

    switch (result) {
        case 'mailAlreadyExist':
            title = 'Oops ! 😕';
            text = 'Une erreur est survenue lors de la modification de votre compte, il semble que votre adresse email est déjà utilisée.';
            icon = 'error';
            break;
        case 'accountModificationError':
            title = 'Oops ! 😕';
            text = 'Une erreur est survenue lors de la modification de votre compte.';
            icon = 'error';
            break;
        case 'accountModificationSuccess':
            title = 'Yeah ! 😎';
            text = 'Votre compte à été modifié avec succès !';
            icon = 'success';
            break;
        case 'noInformationChange':
            title = 'Modification d\'information';
            text = 'Vous n\'avez pas modifié vos informations.';
            icon = 'info';
            break;
        case 'confirmPasswordIncorrect':
            title = 'Changement de mot de passe';
            text = 'Le mot de passe de confirmation ne correspond pas.';
            icon = 'warning';
            break;
        case 'currentPasswordIncorrect':
            title = 'Changement de mot de passe';
            text = 'Votre mot de passe actuel est incorrecte.';
            icon = 'warning';
            break;
        case 'changePasswordSuccess':
            title = 'Changement de mot de passe';
            text = 'Votre mot de passe à été changé.';
            icon = 'success';
            break;
        case 'changePasswordError':
            title = 'Changement de mot de passe';
            text = 'Votre mot de passe n\'a pas pu être changé.';
            icon = 'error';
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
            $.ajax({
                url: "./PHPScripts/rentFilm.php",
                method: "POST",
                data: {
                    "storeid" : storeid,
                    "filmid" : filmid
                },
                async: false,
                success: function (data) {
                    Swal.fire(
                        'Merci !',
                        'Le film vous est réservé, vous n\'avez plus qu\'a le récupérer.',
                        'success'
                    )
                },
                error: function (data) {
                    Swal.fire(
                        'Étrange !',
                        'Une erreur s\'est produite pendant la réservation veuillez réessayer.',
                        'error'
                    )
                }
            });
        }
    })
}

function confirmDeleteAccount(email) {
    Swal.fire({
        title: "Confirmation",
        text: "Êtes-vous sûr de vouloir nous quitter ?",
        icon: "question",
        footer: email,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmer',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            /*Swal.fire(
                'Suppression',
                'La demande va être envoyé.',
                'info'
            )*/
            window.location.href = "./PHPScripts/deleteAccount.php";
        }
    })
}

function deleteAccountResult(result) {
    let title = '';
    let text  = '';
    let icon  = '';

    switch (result) {
        case 'accountDeleteSuccess':
            title = '😢';
            text = 'On est triste de vous voir partir, n\'hésitez pas à nous dire ce qui ne vous a pas plus !';
            icon = 'info';
            break;
        case 'accountDeleteError':
            title = 'Oops ! 😕';
            text = 'Une erreur est survenue lors de la supression de votre compte.';
            icon = 'error';
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