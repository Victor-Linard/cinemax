const filmModal = document.getElementById('filmDetailsModal');
filmModal.addEventListener('show.bs.modal', function (event) {
    const card = event.relatedTarget;
    const title = card.getAttribute('data-bs-title')
    const rating = ratingToMeaning(card.getAttribute('data-bs-rating'));
    const modalFilmTitle = filmModal.querySelector('#modal-filmTitle');
    const modalFilmRating = filmModal.querySelector('#modal-filmRating');

    modalFilmTitle.textContent = title;
    modalFilmRating.innerHTML = rating;
})

function ratingToMeaning(str) {
    switch (str) {
        case "G": return '<span class="fe fe-user"></span> Tout public';
        case "PG": return '<span class="fe fe-alert-circle"></span> Mineur';
        case "G-13": return '<span class="fe fe-slash"></span> -13 ans';
        case "R": return '<span class="fe fe-users"></span> Avec adulte';
        case "NC-17": return '<span class="fe fe-slash"></span> -17 ans';
        default: return "";
    }
}