// script for card home
const cardsHeader = document.querySelectorAll('#content .card-header');

cardsHeader.forEach(header => {
    header.addEventListener('click', function () {
        header.nextElementSibling.classList.toggle('d-none');
    })
});


