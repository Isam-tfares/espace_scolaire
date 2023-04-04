window.onscroll = function() {myFunction()};
var nav = document.querySelector('.navbar');
var li = document.querySelectorAll('.navbar ul li a');
var style = document.querySelector('style');
var css_hover = '.nav-item a:hover { color: var(--main-color);font-weight: normal;} .navbar{box-shadow: 0px 1px 0px rgba(0, 0, 0, .1);}';

function myFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        nav.classList.add("bg-white");
        nav.classList.remove("bleu-back");
        style.innerHTML = css_hover;
    }
    else {
        nav.classList.remove("bg-white");
        nav.classList.add("bleu-back");
        style.innerHTML = '';
    }
}

//password hidden seen

let $eyes = document.querySelector('#changeVisibility i');
let $password = document.querySelector('#passwordEdit');
if ($eyes != null) {
    $eyes.addEventListener('click', (e) => {
        // password is hidden
        if (e.currentTarget.classList.value == "bi bi-eye") {
            e.currentTarget.classList.value = "bi bi-eye-slash";
            $password.setAttribute('type', 'text');
        }
        else {
            e.currentTarget.classList.value = "bi bi-eye";
            $password.setAttribute('type', 'password');
        }

    })
}

// messsanger

var messageBody = document.querySelector('#messageBody');
if (messageBody != null) {
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
}
function setFocusToTextBox() {

    let add = document.getElementById("addMessage");
    if (add != null) {
        add.focus();
    }
}
setFocusToTextBox();

