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

function stringCheck(stringtext){
    var text = document.getElementById(stringtext).value;
    if (text == "") {
        alert("leerer Text");
    }
    else
    if (!text.match(re_string)) {
        document.getElementById(stringtext).value = "";
        alert("Text ist nicht gültig");
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