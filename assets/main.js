// Check Login//
function checkValidate() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var error_id = document.getElementsByClassName("error-id");
    var error_password = document.getElementsByClassName("error-password");

    if (username != '' && password != '') {

    }
    elseif(username == '' && password == '') {
        error_id.innerHTML = "Username can't be blank. Please input!";
        error_password.innerHTML = "Password can't be blank. Please input!";
    }
    elseif(username == '' && password != '') {

    }
    elseif(username != '' && password == '') {

    }

}