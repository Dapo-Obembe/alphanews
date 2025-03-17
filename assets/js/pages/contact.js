document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener(
    "wpcf7mailsent",
    function (event) {
      Swal.fire({
        title: "Thank you!",
        text: "Your message has been sent successfully. We will be in touch soon.",
        icon: "success",
        confirmButtonText: "OK",
      });
    },
    false
  );
  document.addEventListener(
    "wpcf7invalid",
    function (event) {
      Swal.fire({
        title: "OOPS!",
        text: "Hey, buddy. Some fields need to be filled.",
        icon: "error",
        confirmButtonText: "OK",
      });
    },
    false
  );
});
