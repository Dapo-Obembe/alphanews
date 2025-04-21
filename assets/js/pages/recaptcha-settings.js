// JavaScript to toggle reCAPTCHA version fields.
document.addEventListener("DOMContentLoaded", function () {
  const recaptchaVersionField = document.getElementById("recaptcha_version");
  const v2Fields = document.querySelectorAll(".recaptcha-v2-fields");
  const v3Fields = document.querySelectorAll(".recaptcha-v3-fields");

  function toggleRecaptchaFields() {
    if (recaptchaVersionField.value === "v2") {
      v2Fields.forEach((field) => (field.style.display = "block"));
      v3Fields.forEach((field) => (field.style.display = "none"));
    } else {
      v2Fields.forEach((field) => (field.style.display = "none"));
      v3Fields.forEach((field) => (field.style.display = "block"));
    }
  }

  recaptchaVersionField.addEventListener("change", toggleRecaptchaFields);

  // Initial state.
  toggleRecaptchaFields();
});
