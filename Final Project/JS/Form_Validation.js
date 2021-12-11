function checkName() {
    if (document.getElementById("fname").value == "") {
        document.getElementById("nameErr").innerHTML = "*Full Name cannot be blank";
        document.getElementById("fname").style.borderColor = "red";
    } else if (document.getElementById("fname").value.split(' ').length < 2) {
        document.getElementById("nameErr").innerHTML = "*Full name must be at least 2 words";
        document.getElementById("fname").style.borderColor = "red";
    } else if (!document.getElementById("fname").value.match(/^[A-Za-z ]*$/)) {
        document.getElementById("nameErr").innerHTML = "*For full name only upper/lower case letters and white spaces are allowed";
        document.getElementById("fname").style.borderColor = "red";
    } else {
        document.getElementById("nameErr").innerHTML = "";
        document.getElementById("fname").style.borderColor = "purple";
    }
}

function checkEmail() {
    if (document.getElementById("email").value == "") {
        document.getElementById("emailErr").innerHTML = "*Email cannot be blank";
        document.getElementById("email").style.borderColor = "red";
    } else if (!document.getElementById("email").value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        document.getElementById("emailErr").innerHTML = "*Please enter a valid email address";
        document.getElementById("email").style.borderColor = "red";
    } else {
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "purple";
    }
}

function checkPhoneNo() {
    if (document.getElementById("phoneNo").value == "") {
        document.getElementById("phoneNoErr").innerHTML = "*Phone number cannot be blank";
        document.getElementById("phoneNo").style.borderColor = "red";
    } else if (!document.getElementById("phoneNo").value.match(/^[0-9]{11}$/)) {
        document.getElementById("phoneNoErr").innerHTML = "*Phone number must be eleven (11) digits (excluding +88)";
        document.getElementById("phoneNo").style.borderColor = "red";
    } else {
        document.getElementById("phoneNoErr").innerHTML = "";
        document.getElementById("phoneNo").style.borderColor = "purple";
    }
}

function checkPass() {
    if (document.getElementById("pass").value == "") {
        document.getElementById("passErr").innerHTML = "*Password cannot be blank";
        document.getElementById("pass").style.borderColor = "red";
    } else if (document.getElementById("pass").value.length < 6) {
        document.getElementById("passErr").innerHTML = "*Password must not be less than six (6) characters";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[A-Z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[a-z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[0-9]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else {
        document.getElementById("passErr").innerHTML = "";
        document.getElementById("pass").style.borderColor = "purple";
    }
}

function checkConPass() {
    if (document.getElementById("conPass").value == "") {
        document.getElementById("conPassErr").innerHTML = "*Confirm Password cannot be blank";
        document.getElementById("conPass").style.borderColor = "red";
    } else if (document.getElementById("conPass").value != document.getElementById("pass").value) {
        document.getElementById("conPassErr").innerHTML = "*Password and confirm password does not match";
        document.getElementById("conPass").style.borderColor = "red";
    } else {
        document.getElementById("conPassErr").innerHTML = "";
        document.getElementById("conPass").style.borderColor = "purple";
    }
}

function checkDOB() {
    if (document.getElementById("dob").value == "") {
        document.getElementById("dobErr").innerHTML = "*Date of Birth cannot be blank";
        document.getElementById("dob").style.borderColor = "red";
    } else if (calculate_age(new Date(document.getElementById("dob").value)) < 18) {
        document.getElementById("dobErr").innerHTML = "*You must be 18 years or older";
        document.getElementById("dob").style.borderColor = "red";
    } else {
        document.getElementById("dobErr").innerHTML = "";
        document.getElementById("dob").style.borderColor = "purple";
    }
}

function calculate_age(dob) {
    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms);

    return Math.abs(age_dt.getUTCFullYear() - 1970);
}

function checkTicketId() {
    if (document.getElementById("ticketId").value == "") {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID cannot be blank";
        document.getElementById("ticketId").style.borderColor = "red";
    } else if (!document.getElementById("ticketId").value.match(/^[0-9]+$/)) {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID must contain only numbers";
        document.getElementById("ticketId").style.borderColor = "red";
    } else {
        document.getElementById("ticketIdErr").innerHTML = "";
        document.getElementById("ticketId").style.borderColor = "purple";
    }
}

function checkprice() {
    if (document.getElementById("price").value == "") {
        document.getElementById("priceErr").innerHTML = "*Price ccannot be blank !";
        document.getElementById("price").style.borderColor = "red";
    } else if (!document.getElementById("price").value.match(/^[0-9]+$/)) {
        document.getElementById("priceErr").innerHTML = "*Price must contain only numbers !";
        document.getElementById("price").style.borderColor = "red";
    } else {
        document.getElementById("priceErr").innerHTML = "";
        document.getElementById("price").style.borderColor = "purple";
    }
}

function checkbusId() {
    if (document.getElementById("busId").value == "") {
        document.getElementById("busIdErr").innerHTML = "*Bus ID cannot be blank !";
        document.getElementById("busId").style.borderColor = "red";
    } else if (!document.getElementById("busId").value.match(/^[0-9]+$/)) {
        document.getElementById("busIdErr").innerHTML = "*Bus ID must contain only numbers !";
        document.getElementById("busId").style.borderColor = "red";
    } else {
        document.getElementById("busIdErr").innerHTML = "";
        document.getElementById("busId").style.borderColor = "purple";
    }
}


function validEmail() {
    if (document.getElementById("email").value == "") {
        document.getElementById("emailErr").innerHTML = "*Email cannot be blank";
        document.getElementById("email").style.borderColor = "red";
    } else if (!document.getElementById("email").value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        document.getElementById("emailErr").innerHTML = "*Please enter a valid email address";
        document.getElementById("email").style.borderColor = "red";
    } else {
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "purple";
    }
}

function validPass() {
    if (document.getElementById("pass").value == "") {
        document.getElementById("passErr").innerHTML = "*Password cannot be blank";
        document.getElementById("pass").style.borderColor = "red";
    } else if (document.getElementById("pass").value.length < 5) {
        document.getElementById("passErr").innerHTML = "*Password must not be less than six (6) characters";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[A-Z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[a-z]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else if (!document.getElementById("pass").value.match(/[0-9]+/)) {
        document.getElementById("passErr").innerHTML = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        document.getElementById("pass").style.borderColor = "red";
    } else {
        document.getElementById("passErr").innerHTML = "";
        document.getElementById("pass").style.borderColor = "purple";
    }
}

function validConPass() {
    if (document.getElementById("conPass").value == "") {
        document.getElementById("conPassErr").innerHTML = "*Confirm Password cannot be blank";
        document.getElementById("conPass").style.borderColor = "red";
    } else if (document.getElementById("conPass").value != document.getElementById("pass").value) {
        document.getElementById("conPassErr").innerHTML = "*Password and confirm password does not match";
        document.getElementById("conPass").style.borderColor = "red";
    } else {
        document.getElementById("conPassErr").innerHTML = "";
        document.getElementById("conPass").style.borderColor = "purple";
    }
}

function validTicketId() {
    if (document.getElementById("ticketId").value == "") {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID cannot be blank";
        document.getElementById("ticketId").style.borderColor = "red";
    } else if (!document.getElementById("ticketId").value.match(/^[0-9]+$/)) {
        document.getElementById("ticketIdErr").innerHTML = "*Ticket ID must contain only numbers";
        document.getElementById("ticketId").style.borderColor = "red";
    } else {
        document.getElementById("ticketIdErr").innerHTML = "";
        document.getElementById("ticketId").style.borderColor = "purple";
    }
}

function validTrainName() {
    if (document.getElementById("trainName").value == "") {
        document.getElementById("trainNameErr").innerHTML = "*Train Name cannot be blank";
        document.getElementById("trainName").style.borderColor = "red";
    } else if (document.getElementById("trainName").value.split(' ').length < 1) {
        document.getElementById("trainNameErr").innerHTML = "*Train name must be single words";
        document.getElementById("trainName").style.borderColor = "red";
    } else if (!document.getElementById("trainName").value.match(/^[A-Za-z ]*$/)) {
        document.getElementById("trainNameErr").innerHTML = "*For train name only upper/lower case letters and white spaces are allowed";
        document.getElementById("trainName").style.borderColor = "red";
    } else {
        document.getElementById("trainNameErr").innerHTML = "";
        document.getElementById("trainName").style.borderColor = "purple";
    }
}

function validTrainLocation(){
    if (document.getElementById("trainLocation").value == "") {
        document.getElementById("trainLocationErr").innerHTML = "*Location cannot be blank";
        document.getElementById("trainLocation").style.borderColor = "red";
    }
}

function validTrainFrom(){
    if (document.getElementById("trainFrom").value == "") {
        document.getElementById("fromErr").innerHTML = "*Please select a location";
        document.getElementById("trainFrom").style.borderColor = "red";
    }
}

function validTrainTo(){
    if (document.getElementById("trainTo").value == "") {
        document.getElementById("toErr").innerHTML = "*Please select a location";
        document.getElementById("trainTo").style.borderColor = "red";
    }
}
