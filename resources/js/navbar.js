
  document.addEventListener('DOMContentLoaded', function () {
      const hamburgerButton = document.querySelector('[data-collapse-toggle="navbar-hamburger"]');
      const navbarMenu = document.getElementById('navbar-hamburger');

      hamburgerButton.addEventListener('click', function () {
          navbarMenu.classList.toggle('hidden');
          const isExpanded = hamburgerButton.getAttribute('aria-expanded') === 'true' || false;
          hamburgerButton.setAttribute('aria-expanded', !isExpanded);
      });
  });
