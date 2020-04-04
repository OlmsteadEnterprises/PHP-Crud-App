$(document).ready(function () {
    $("#submit").click(function (e) {
        e.preventDefault();

        var email = $("#email").value;
        var fname = $("#fname").value;
        var lname = $("#lname").value;
        var pword = $("#password").value;
        var valid = true;

        if(fname == "") {
            valid = false;
            $("#errorFirstName").innerHTML("First Name cannot be empty");
        } else {
            $("#errorFirstName").innerHTML("");
        }
        if(lname == "") {
            valid = false;
            $("#errorLastName").innerHTML("Last Name cannot be empty");
        } else {
            $("#errorLastName").innerHTML("");
        }
        if(email == "") {
            valid = false;
            $("#errorEmail").innerHTML("Email cannot be empty");
        } else {
            $("#errorEmail").innerHTML("");
        }
        if(pword == "") {
            valid = false;
            $("#errorPassword").innerHTML("Password cannot be empty");
        } else {
            $("#errorPassword").innerHTML("");
        }
    });
});