let form = document.querySelector(".main-register-info")
let firstName = document.querySelector(".main-register-info-firstName-input")
let lastName = document.querySelector(".main-register-info-lastName-input")
let employmentID = document.querySelector(".main-register-info-employmentID-input")
let submit = document.querySelector(".main-register-info-submit");
let submitValidation = document.querySelector(".main-register-info-submit-span")


form.addEventListener("keyup", (event)=>{
    if(firstName.value && lastName.value && employmentID.value){
        submit.disabled=false;
        submitValidation.style.display="inline"
    } else{
        submit.disabled=true;
        submitValidation.style.display="none"
    } 
})

