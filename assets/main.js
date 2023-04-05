// Check Login//
function checkValidateLogin() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var error_id = document.getElementById("error-id");
    var error_password = document.getElementById("error-password");
    var submit_btn = document.getElementsByClassName("submit-btn");
    const USERNAME_BLANK_ERR = "Username can't be blank. Please input!";
    const PASSWORD_BLANK_ERR = "Password can't be blank. Please input!";
    const USERNAME_4_CHAR_VALIDATE = "Please input username at least 4 characters";
    const PASSWORD_6_CHAR_VALIDATE = "Please input password at least 6 characters";

    if (username != '' && password != '') {
        if ((username.length < 4) && (password.length < 6)) {
            error_id.innerText = USERNAME_4_CHAR_VALIDATE;
            error_password.innerText = PASSWORD_6_CHAR_VALIDATE;
        } else if ((username.length < 4) && (password.length > 5)) {
            error_id.innerText = USERNAME_4_CHAR_VALIDATE;
            error_password.innerText = "";
        } else if ((username.length > 3) && (password.length < 6)) {
            error_id.innerText = "";
            error_password.innerText = PASSWORD_6_CHAR_VALIDATE;
        } else if ((username.length > 3) && (password.length > 5)) {
            error_id.innerText = "";
            error_password.innerText = "";
        }
    } else if ((username == '') && (password == '')) {
        error_id.innerText = USERNAME_BLANK_ERR;
        error_password.innerText = PASSWORD_BLANK_ERR;
    } else if ((username == '') && (password != '')) {
        error_id.innerText = USERNAME_BLANK_ERR;
        if (password.length < 6) {
            error_password.innerText = PASSWORD_6_CHAR_VALIDATE;
        } else {
            error_password.innerText = "";
        }
    } else if ((username != '') && (password == '')) {

        if (username.length < 4) {
            error_id.innerText = USERNAME_4_CHAR_VALIDATE;
        } else {
            error_id.innerText = "";
        }
        error_password.innerText = PASSWORD_BLANK_ERR;
    }

    if ((error_id.innerText != '') && (error_password.innerText != '')) {
        submit_btn[0].disabled = true;
        submit_btn[0].style = "opacity: 0.5;cursor:default";
    } else if ((error_id.innerText == '') && (error_password.innerText == '')) {
        console.log("abc")
        submit_btn[0].disabled = false;
        submit_btn[0].style = "opacity: 1;cursor:pointer";
    }


}


function checkValidateReset() {
    var username = document.getElementById("username").value;
    var error_name = document.getElementById("error_name");
    var reset_btn = document.getElementById("reset-btn");

    if (username != '') {
        if (username.length < 4) {
            error_name.innerText = "Please input username at least 4 characters";
        } else {
            error_name.innerText = "";
        }
    } else {
        error_name.innerText = "Username can't be blank. Please input!"
    }
    if (error_name.innerText != '') {
        reset_btn.disabled = true;
        reset_btn.style = "opacity: 0.5; cursor: default";
    } else {
        reset_btn.disabled = false;
        reset_btn.style = "opacity: 1; cursor: pointer";
    }
}

function checkValidateInputPass(event) {
    console.log(event.target);
    var password = document.getElementsByClassName("password-input").value;
    var error_pass = document.getElementsByClassName("error_pass");
    var reset_btn = document.getElementById("reset-pass-btn");

    if (password != '') {
        if (password.length < 6) {
            error_pass.innerText = "Please input password at least 6 characters";
        } else {
            error_pass.innerText = "";
        }
    } else {
        error_pass.innerText = "Password can't be blank. Please input!"
    }
    if (error_pass.innerText != '') {
        reset_btn.disabled = true;
        reset_btn.style = "opacity: 0.5; cursor: default";
    } else {
        reset_btn.disabled = false;
        reset_btn.style = "opacity: 1; cursor: pointer";
    }
}