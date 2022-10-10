let form = document.querySelector('.main-register-info');
let firstName = document.querySelector('.main-register-info-firstName-input');
let lastName = document.querySelector('.main-register-info-lastName-input');
let employmentID = document.querySelector(
  '.main-register-info-employmentID-input'
);
let submit = document.querySelector('.main-register-info-submit');
let submitValidation = document.querySelector(
  '.main-register-info-submit-span'
);
let button = document.querySelector('button');

//You fetch from  (http://localhost/SOEN-387-assignment1/api/login-administrator.php) and you make sure ther response isn't empty, then you can go to another HTML to create the course

// form.addEventListener("keyup", (event)=>{
//     console.log(firstName.value)

//     if(firstName.value && lastName.value && employmentID.value){
//         submit.disabled=false;
//         submitValidation.style.display="inline"
//     } else{
//         submit.disabled=true;
//         submitValidation.style.display="none"
//     }
// })

button.addEventListener('click', async (event) => {
  event.preventDefault();
  const config = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ employmentID: employmentID.value }), // body data type must match "Content-Type" header
  };

  try {
    const response = await fetch(
      'http://localhost/SOEN-387-assignment1/api/login-administrator.php',
      config
    );
    const data = await response.json();
    if (!data[0]) {
      alert(
        `There is no employmentID of ${employmentID.value} in the database`
      );
    } else {
      alert(
        `The employmentID (${data[0].employmentID}) exists in the database\nYou are an administrator!\nYou will be redirected to create an course`
      );
      window.location.replace(
        'http://localhost/SOEN-387-assignment1/create-course.html'
      );
    }
  } catch (e) {
    alert(e);
  }
});
