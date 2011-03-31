//<<Regulaere Ausdruecke>>
var re_email = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/;
var re_string = /^([a-zA-Z-]+\s)*[a-zA-Z-]+$/;
var re_integer = /^[0-9]+$/;
var re_date = /^[0-9]{4,4}\-[0-9]{2,2}\-[0-9]{2,2}$/

function emailCheck(){
    var email = document.getElementById("email").value;
//    var emailRegxp = /^.+@.+\..{2,5}$/;

    if (email == "") {
        alert("leerer Text");
    }
    else
    if (!email.match(re_email)) {
        document.getElementById('email').value = "";
        alert("Email ist nicht gültig");
    }
}

function lastnameCheck(){
    var name = document.getElementById("lastname").value;
    if (name == "") {
        alert("leerer Text");
    }
    else
    if (!name.match(re_string)) {
        document.getElementById("lastname").value = "";
        alert("Name ist nicht gültig");
    }
}

function firstnameCheck(){
    var name = document.getElementById("firstname").value;
    if (name == "") {
        alert("leerer Text");
    }
    else
    if (!name.match(re_string)) {
        document.getElementById("firstname").value = "";
        alert("Vorname ist nicht gültig");
    }
}

function dateCheck(datum){
    var date = document.getElementById(datum).value;
    if (date == "") {
        alert("leerer Text");
    }
    else
    if (!date.match(re_date)) {
        document.getElementById(datum).value = "";
        alert("Datum ist nicht gültig. Bitte folgendes Format verwenden (JJJJ-MM-TT)");
    }
}

function passwordCheck(){
    var password = document.getElementById("user_password").value;
    var confirm_password = document.getElementById("password_confirm").value;
    if (password != confirm_password){
        document.getElementById("password_confirm").value = "";
        alert("Passwörter sind nicht gleich");
    }
}