const filmModal = document.getElementById('filmDetailsModal');
filmModal.addEventListener('show.bs.modal', function (event) {
    const card = event.relatedTarget;
    const title = card.getAttribute('data-bs-title')
    const category = card.getAttribute('data-bs-category');
    const rating = card.getAttribute('data-bs-rating');
    const price = card.getAttribute('data-bs-price');
    const description = card.getAttribute('data-bs-description');
    const length = card.getAttribute('data-bs-length')
    const actors = card.getAttribute('data-bs-actors')
    const rentalDuration = card.getAttribute('data-bs-rentalDuration');
    const language = card.getAttribute('data-bs-language');
    const bonus = card.getAttribute('data-bs-bonus');
    const stores = strToDict(card.getAttribute('data-bs-stores'));

    const modalFilmTitle = filmModal.querySelector('#modal-filmTitle');
    const modalFilmCategory = filmModal.querySelector('#modal-filmCategory');
    const modalFilmPrice = filmModal.querySelector('#modal-filmPrice');
    const modalFilmDescription = filmModal.querySelector('#modal-filmDescription');
    const modalFilmLength = filmModal.querySelector('#modal-filmLength');
    const modalFilmActors = filmModal.querySelector('#modal-filmActors');
    const modalFilmRatingIcon = filmModal.querySelector('#modal-filmRatingIcon');
    const modalFilmRatingMeaning = filmModal.querySelector('#modal-filmRatingMeaning');
    const modalFilmRentalDuration = filmModal.querySelector('#modal-filmRentalDuration');
    const modalFilmLanguage = filmModal.querySelector('#modal-filmLanguage');
    const modalFilmBonus = filmModal.querySelector('#modal-filmBonus');
    const modalFilmDisponibility = filmModal.querySelector('#modal-filmDisponibility');


    modalFilmTitle.textContent = title;
    modalFilmCategory.textContent = category;
    modalFilmPrice.textContent = price+" €";

    modalFilmDescription.textContent = description+".";

    modalFilmLength.textContent = minuteToHM(length);
    modalFilmActors.textContent = actors;
    modalFilmLanguage.textContent = language;
    modalFilmBonus.textContent = bonus;
    modalFilmRatingIcon.innerHTML = ratingToIcon(rating);
    modalFilmRatingMeaning.textContent = ratingToMeaning(rating);
    modalFilmRentalDuration.textContent = "À louer pour une durée de "+rentalDuration+" jours";

    modalFilmDisponibility.innerHTML = createStoreCard(stores['stores']);
})

function ratingToMeaning(str) {
    switch (str) {
        case "G": return 'Tout public';
        case "PG": return 'Certaines scènes peuvent ne pas convenir aux mineurs';
        case "G-13": return 'Inappropriés pour les enfants de moins de 13 ans';
        case "R": return 'Réservé aux adultes';
        case "NC-17": return 'Inappropriés pour les enfants de moins de 17 ans';
        default: return "";
    }
}

function ratingToIcon(str) {
    switch (str) {
        case "G": return '<span class="fe fe-user"></span>';
        case "PG": return '<span class="fe fe-alert-circle"></span>';
        case "G-13": return '<span class="fe fe-slash"></span>';
        case "R": return '<span class="fe fe-users"></span>';
        case "NC-17": return '<span class="fe fe-slash"></span>';
        default: return "";
    }
}

function minuteToHM(minute) {
    return Math.floor(minute / 60)+"h"+(minute % 60 < 10 ? "0"+minute % 60 : minute % 60);
}

function strToDict(str) {
    let storeDict = {"stores": []};
    let stores = str.split('|');
    for (const storesKey of stores) {
         let infos = storesKey.split(':');
         storeDict['stores'].push({"store_id": infos[0], "contact": infos[1], "address": infos[2], "disponibility": infos[3]});
    }
    return storeDict;
}

function createStoreCard(stores) {
    let cards = '';
    for (const store of stores) {
        let dispo = store['disponibility'] === "0" ? '<span style="margin-bottom: 1.5rem;" class="badge bg-danger-soft">Indisponible</span>' : '<span style="margin-bottom: 1.5rem;" class="badge bg-success-soft">Disponible : '+store['disponibility']+'</span>';
        let location = store['disponibility'] === "0" ? "" : '<div class="mt-6"><button class="btn w-100 btn-primary-soft btn-xs lift" type="submit">Louer</button></div>';
        cards += '<div class="card shadow-light-lg mb-5"> <div class="card-body"> ' +
            '<h4>Magasin '+store['store_id']+'</h4>' +
            '<h6 class="fw-bold text-uppercase text-gray-700 mb-2">Article</h6>' +
            dispo +
            '<h6 class="fw-bold text-uppercase text-gray-700 mb-2">Rejoingnez nous</h6>' +
            '<p class="fs-sm mb-5">'+store['address']+'</p>' +
            '<h6 class="fw-bold text-uppercase text-gray-700 mb-2">Contactez nous</h6>' +
            '<p class="fs-sm mb-0"><a href="mailto:'+store['contact']+'" class="text-reset">'+store['contact']+'</a></p>' +
            location+'</div></div>';
    }
    return cards;
}