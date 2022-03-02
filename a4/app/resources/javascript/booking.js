
    let total = document.getElementById("total");
    let discount_banner = document.getElementById("discount-banner");
    let discount_active = document.getElementById("discount-active");
    let quantity =  document.getElementById("quantity");
    let rememberMe = false;
    let rememberMeButton = document.getElementById("remember-me");

    let date = null;
    let seat = null;

    let email = document.getElementById("email");
    let phone = document.getElementById("mobile-number")
    let fullname = document.getElementById("name");

    let validatedEmail = false;
    let validatedPhone = false;
    let validatedName = false;

    let submit_button = document.getElementById("submit");

    if(!rememberMe){
        rememberMeButton.innerText = "Remember me";
        rememberMeButton.style.backgroundColor = "rgb(121, 0, 0)";
        rememberMeButton.style.boxShadow = "inset 0 0 5px 0 black";
    }

    //call the calculate function on page load first
    calculate(date,seat);



    document.addEventListener('input',(e)=>{

    if (e.target.getAttribute('name') === "date") {
    date = e.target.value;
    calculate(JSON.parse(date), JSON.parse(seat));
}
    if (e.target.getAttribute('name') === "seat-code") {
    seat = e.target.value;
    calculate(JSON.parse(date), JSON.parse(seat));
}
    if (e.target.getAttribute('name') === "quantity") {
    quantity = document.getElementById("quantity");
    calculate(JSON.parse(date), JSON.parse(seat));
}


})

    //calculate function called by changes to the fields
    function calculate(date,seat){

    if(seat != null && date != null) {

    let day = date.day;
    let discountDays = seat.discount_times[0];

    let i = 0;
    while (i < Object.keys(discountDays).length) {
    if (Object.keys(discountDays)[i] === day) {
    total.innerText = "$" + seat.discounted_price * quantity.value;
    discount_banner.style.display = "block";
    discount_active.style.display = "block";
    break;
} else {
    total.innerText = "$" + seat.standard_price * quantity.value;
    discount_banner.style.display = "none";
    discount_active.style.display = "none";

}
    i++;
}
}
    updateButton();

}

    //perform first load checks
    validatedEmail = validateEmail(email.value);
    validatedPhone = !!validatePhone(phone);
    validatedName = !!validateName(fullname);
    updateButton();


    //add input event listeners to watch for change
    email.addEventListener('input', function() {
    validatedEmail = validateEmail(email.value);
    updateButton();
});
    phone.addEventListener('input', function (){
    validatedPhone = !!validatePhone(phone);
    updateButton();
});
    fullname.addEventListener('input', function (){
    validatedName = !!validateName(fullname);
    updateButton();
})

    function updateButton(){

    if(validatedName && validatedPhone && validatedEmail && total.innerText !== "$0"){
    submit_button.style.backgroundColor = "red";
    submit_button.disabled = false;

}else{
    submit_button.style.backgroundColor = "#790000";
    submit_button.style.color = "white";
    submit_button.disabled = true;
}
}

    //Validate Email Function
    function validateEmail(email){
    let regex = /\S+@\S+\.\S+/;
    return regex.test(email);

    //Email validation reference, Page used to assist with creating this regular expression
    //https://stackoverflow.com/questions/46155/whats-the-best-way-to-validate-an-email-address-in-javascript
}

    //validate the phone number
    function validatePhone(phone){
    let regex = /^[0-9]+$/;
    return !!(phone.value.match(regex) && phone.value.length >= 8);

    //Phone validation reference,
    //https://thispointer.com/javascript-check-if-string-contains-only-digits/
}

    //validate the full name, simple check to ensure it is not null, length check to ensure it is over 2 characters
    function validateName(name){
    let outcome = false;

    if (name.value !== null || name.value !== " " || name.value.length >= 3) {
    outcome = true;
}
    return outcome;
}

function increaseQuanity(){
        let value = parseInt(document.getElementById("quantity").value);
        let quanityDisplay = document.getElementById("quanity-display");
        if(value < 10){
            value+=1;
        }
        quanityDisplay.innerText = value.toString();
        document.getElementById("quantity").value = value;

        calculateViaButtonPress();

}

function decreaseQuanity(){

    let value = parseInt(document.getElementById("quantity").value);
    let quanityDisplay = document.getElementById("quanity-display");
    if(value > 1){
        value-=1;
    }
    quanityDisplay.innerText = value.toString();
    document.getElementById("quantity").value = value;

    calculateViaButtonPress();

}

function calculateViaButtonPress(){
    date = document.querySelector('input[name="date"]:checked').value;
    seat = document.querySelector('input[name="seat-code"]:checked').value;
    if(date != null && seat != null) {
        calculate(JSON.parse(date), JSON.parse(seat));
    }
}

function updateRememberMe(){
        rememberMe = !rememberMe;
        if(rememberMe){
            rememberMeButton.innerText = "Forget me";
            rememberMeButton.style.backgroundColor = "red";
            rememberMeButton.style.color = "white";
            rememberMeButton.style.boxShadow = "inset 0 0 5px 0 white";
        }else{
            rememberMeButton.innerText = "Remember me";
            rememberMeButton.style.backgroundColor = "rgb(121, 0, 0)";
            rememberMeButton.style.boxShadow = "inset 0 0 5px 0 black";
        }
}

function processForm(){
        let details = {
            "name": fullname.value,
            "email": email.value,
            "phone": phone.value
        }

    if(rememberMe){
        window.localStorage.setItem("details", JSON.stringify(details));
    }else{
        window.localStorage.setItem("details", null);
    }
}

if(window.localStorage.getItem("details") != null){
    let details = JSON.parse(window.localStorage.getItem("details"));
    phone.value = details.phone;
    fullname.value = details.name;
    email.value = details.email;

    //these can be assumed to be true due to the validation that took place the first time they were checked

    validatedEmail = true;
    validatedPhone = true;
    validatedName = true;

    updateButton();
}