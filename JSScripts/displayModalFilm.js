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