let form = document.querySelector('.main-register-info');
let submit = document.querySelector('.main-register-info-submit');
let courseCode = document.querySelector('.main-register-info-ID-input');
let courseTitle = document.querySelector('.main-register-info-title-input');
let semester = document.querySelector('.main-register-info-semester-input');
let days = document.querySelector('.main-register-info-days-input');
let courseTime = document.querySelector('.main-register-info-courseTime-input');
let instructor = document.querySelector(".main-register-info-instructor-input")
let startDate = document.querySelector(".main-register-info-startDate-input")
let endDate = document.querySelector(".main-register-info-endDate-input")
let room = document.querySelector('room');


form.addEventListener('change', (event) => {
    // console.log(endDate.value)
    let startDateObject = new Date(startDate.value);
    let endDateObject = new Date(endDate.value);

    if(startDateObject.getTime() > endDateObject.getTime()){
        alert("Start Date is after End Date. Please adjust accordingly")
        startDate.value = ""
        endDate.value = ""
    }
    
let room = document.querySelector('room');
    if (courseCode.value && courseTime.value && semester.value && days.value && courseTime.value && instructor.value  && room.value && startDate.value && endDate.value) {
      submit.disabled = false;
    } else {
      submit.disabled = true;
    }
  });