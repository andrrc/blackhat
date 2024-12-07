const menuIcon = document.getElementById('menu-icon');
const nav = document.querySelector('header nav');

menuIcon.addEventListener('click', () => {
    nav.classList.toggle('show-menu');
});
