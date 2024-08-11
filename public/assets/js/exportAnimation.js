document.addEventListener('DOMContentLoaded', function () {
    const dropDownButton = document.getElementById('dropDownExport');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownIcon = document.getElementById('dropdownIcon');
    const bounceIcon = document.getElementById('bounceIcon');

    dropDownButton.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
        dropdownIcon.classList.toggle('rotate-180');
        bounceIcon.classList.toggle('fa-bounce');
    });

});
