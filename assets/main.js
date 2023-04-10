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



    var inputElementId = event.target.id.slice(-1);
    var error_pass = event.target.parentNode.querySelector("#err_pass" + inputElementId);
    var reset_button = document.querySelector("#reset-pass-btn" + inputElementId);

    if (event.target.value != '') {
        if (event.target.value.length < 6) {
            error_pass.innerText = "Please input password at least 6 characters";
        } else {
            error_pass.innerText = "";
        }
    } else {
        console.log("a")
        error_pass.innerText = "Password can't be blank. Please input!"
    }
    if (error_pass.innerText != '') {
        reset_button.disabled = true;
        reset_button.style = "opacity: 0.5; cursor: default";
    } else {
        reset_button.disabled = false;
        reset_button.style = "opacity: 1; cursor: pointer";
    }

}

function checkValidateEvent() {
    //input elemnent
    var event_name = document.getElementById("event-name").value;
    var slogan = document.getElementById("slogan").value;
    var leader = document.getElementById("leader").value;
    var description = document.getElementById("description").value;
    var event_submit = document.getElementById("event-submit-btn");

    //element to insert error message
    var eventnameDiv = document.getElementById("event-name-input");
    var sloganDiv = document.getElementById("slogan-input");
    var leaderDiv = document.getElementById("leader-input");
    var descriptionDiv = document.getElementById("description-input");
    var avatarDiv = document.getElementById("avatar-input");

    //reference node 

    var eventnameLabel = document.getElementById("event-name-label");
    var sloganLabel = document.getElementById("slogan-label");
    var leaderLabel = document.getElementById("leader-label");
    var descriptionLabel = document.getElementById("description-label");
    var avatarLabel = document.getElementById("avatar-label");

    // error message
    const pElement = document.createElement('p');
    pElement.classList.add("error-message", "event-error");

    var errorElement = document.getElementsByClassName("error-message");


    if (event_name != '') {
        if (event_name.length > 100) {
            if (errorElement.length > 0) {
                pElement.innerText = "Event name needs to be fewer than 100 characters!";
            } else {
                pElement.innerText = "Event name needs to be fewer than 100 characters!";
                eventnameDiv.insertBefore(pElement, eventnameLabel);
            }
        }

    } else {
        if (errorElement.length > 0) {
            pElement.innerText = "Event name can't be blank!";
        } else {
            pElement.innerText = "Event name can't be blank!";
            eventnameDiv.insertBefore(pElement, eventnameLabel);
        }

    }
}