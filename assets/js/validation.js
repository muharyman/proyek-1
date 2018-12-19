// Check whether the username is filled out or not
function validateUsername($input) {
    if ($input.length == 0) {
        return "*Username must be filled out\n";
    }
    return "";
}

// Check whether the password is filled out or not
function validatePassword($input) {
    if ($input.length == 0) {
        return "*Password must be filled out\n";
    }
    return "";
}

// Validate all things about the login input
function validateLoginForm() {
    var alerts = "";

    var username = document.getElementById("username");
    var password = document.getElementById("password");

    alerts += validateUsername(username.value);
    alerts += validatePassword(password.value);

    if (alerts.length > 0) {
        alert(alerts);
        return false;
    }
    else {
        return true;
    }
}