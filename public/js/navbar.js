const currentPage = window.location.pathname;
const logoItem = document.getElementById('nav-logo');
const catalogItem = document.getElementById('nav-catalog');
const homeItem = document.getElementById('nav-home');

switch (true) {
  case currentPage === '/':
    homeItem.classList.add('active-nav-item');
    catalogItem.classList.remove('active-nav-item');
    break;
    case currentPage.includes('catalog'):
        catalogItem.classList.add('active-nav-item');
        homeItem.classList.remove('active-nav-item');
    break;
  default:
    break;
}