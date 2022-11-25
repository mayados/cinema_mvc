/* Menu burger */

function afficherMenu() {
    const menuNavigation = document.querySelector('#menu-navigation');
    const burger = document.querySelector('.burger');
  
    burger.addEventListener('click', (event) => {    
      menuNavigation.classList.toggle('show-nav');
    });    
  } 
  
  afficherMenu();