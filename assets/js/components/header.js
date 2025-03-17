// Feel free to modify, remove this script.
(function ($) {
  // Function to handle scroll event.
  function handleScroll() {
    if (window.scrollY > 100) {
      $(".site-header").addClass("scrolled");
    } else {
      $(".site-header").removeClass("scrolled");
    }
  }

  // Attach the scroll event to the window
  $(window).on("scroll", handleScroll);

  // Call the function initially to check the scroll position on page load
  handleScroll();
})(jQuery);
