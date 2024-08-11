document.addEventListener('DOMContentLoaded', () => {
    const sidebarBackdrop = document.getElementById('sidebarBackdrop');
    const navbarDropdown = document.getElementById('navbar-dropdown');
    document.getElementById('toggle-nav').addEventListener('click', function () {
        navbarDropdown.classList.toggle('hidden');
        sidebarBackdrop.classList.toggle('hidden');
    });
    document.getElementById('toggleSidebarMobileSearch').addEventListener('click', function () {
        navbarDropdown.classList.toggle('hidden');
        sidebarBackdrop.classList.toggle('hidden');
    });
    document.getElementById('sidebarBackdrop').addEventListener('click', function () {
        navbarDropdown.classList.toggle('hidden');
        sidebarBackdrop.classList.toggle('hidden');
    });

    const dropdownButton = document.getElementById('user-menu-button-2');
    const dropdownMenu = document.getElementById('dropdown-2');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
});
