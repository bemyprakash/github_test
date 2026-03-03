const menuButton = document.querySelector('[data-menu-toggle]');
const menu = document.querySelector('[data-menu]');
if (menuButton && menu) {
  menuButton.addEventListener('click', () => menu.classList.toggle('open'));
}
document.querySelectorAll('img').forEach((img) => img.setAttribute('loading', 'lazy'));
