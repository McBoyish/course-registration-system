let form = document.querySelector('.main-register-info');
let phoneNumberInput = document.querySelector(
  '.main-register-info-phoneNumber-input'
);
let phoneNumberValidation = document.querySelector(
  '.main-register-info-phoneNumber-validation'
);
let emailInput = document.querySelector('.main-register-info-email-input');
let emailValidation = document.querySelector(
  '.main-register-info-email-validation'
);
let submit = document.querySelector('.main-register-info-submit');
let submitValidation = document.querySelector(
  '.main-register-info-submit-span'
);
let date = document.querySelector('.main-register-info-dateOfBirth-input');

phoneNumberInput.addEventListener('keyup', (event) => {
  if (validePhoneNumber(phoneNumberInput.value)) {
    phoneNumberValidation.style.display = 'inline';
  } else phoneNumberValidation.style.display = 'none';
});

emailInput.addEventListener('keyup', (event) => {
  if (validateEmail(emailInput.value)) {
    emailValidation.style.display = 'inline';
  } else emailValidation.style.display = 'none';
});

form.addEventListener('keyup', (event) => {
  if (
    validateEmail(emailInput.value) &&
    validePhoneNumber(phoneNumberInput.value)
  ) {
    submit.disabled = false;
    submitValidation.style.display = 'inline';
  } else {
    submit.disabled = true;
    submitValidation.style.display = 'none';
  }
});

// Validate phone number
function validePhoneNumber(input_str) {
  let re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
  return re.test(input_str);
}
//validate email
function validateEmail(email) {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}
