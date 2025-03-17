/**
 * Mobile nav JS
 */

document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const mobileNavContainer = document.querySelector(".mobile-nav");

  // Return if either of the elements isn't present.
  if (!menuToggle || !mobileNavContainer) return;

  menuToggle.addEventListener("click", () => {
    const expanded =
      menuToggle.getAttribute("aria-expanded") === "true" || false;

    document.body.classList.toggle("menu-open");

    menuToggle.setAttribute("aria-expanded", !expanded);
    mobileNavContainer.hidden = !mobileNavContainer.hidden;
    menuToggle.classList.toggle("menu-toggle--open");
    mobileNavContainer.classList.toggle("mobile-nav--open");
  });
});
