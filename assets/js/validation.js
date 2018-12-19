var isError = true;

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

    if (alerts.length == 0) {
        // Check the status of login input
        const request = async () => {
            const status = await 
                fetch('db/api/check_admin.php', {
                    method: 'post',
                    body: JSON.stringify({
                        username : username.value,
                        password : password.value
                    })
                })
                .then(res => res.json())
                .then(statusNumber => {
                    // correct login
                    if (statusNumber == 1) {
                        isError = false;
                    }

                    // username and password do not match
                    else if (statusNumber == 2) {
                        alert("*username and password do not match\n");
                        isError = true;
                    }

                    // the username does not exist in database
                    else {
                        alert("*the username does not exist in database\n");
                        isError = true;
                    }
                })
                .catch(err => console.error(err));
        }
        request();

        if (isError) {
            return false;
        }
        else {
            return true;
        }
    }
    else {
        alert(alerts);
        return false;
    }
}