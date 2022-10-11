let form = document.querySelector('.main-register-info');
let studentIdInput = document.querySelector('.main-register-info-id-input');
let courseCodeInput = document.querySelector(
  '.main-register-info-course-code-input'
);
let submit = document.querySelector('.main-register-info-submit');
let submitValidation = document.querySelector(
  '.main-register-info-submit-span'
);

const isnum = (val) => /^\d+$/.test(val);
const isValidCourse = (val) => true;

function eventHandler() {
  if (
    studentIdInput.value &&
    isnum(studentIdInput.value) &&
    courseCodeInput.value &&
    isValidCourse(courseCodeInput.value)
  ) {
    submit.disabled = false;
    submitValidation.style.display = 'inline';
  } else {
    submit.disabled = true;
    submitValidation.style.display = 'none';
  }
}

form.addEventListener('keyup', eventHandler);
