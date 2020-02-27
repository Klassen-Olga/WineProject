//*//
//if js is activated next and previous button on start should not be shown
//*//
var prevNext = document.getElementById('nextPrevious');
if (prevNext !== null) {
    prevNext.style.display = "none";
}
//*//
//if js is activated load more button on start should be shown
//*//
var loadMoreAjax = document.getElementById('loadMore');
if (loadMoreAjax !== null) {
    loadMoreAjax.style.display = 'block';
}
//*//
//if js is activated the slides on start should not be able to be zoomed
//*//
var slides = document.getElementsByClassName("zoom");
for (var i = 0; i < slides.length; i++) {
    slides[i].classList.remove("zoom");
    i--;
}
//*//
// expands slides on click on start page
//*//
function expandSlide(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
var slideFirst = document.getElementById('slideFirst');
if (slideFirst !== null) {
    slideFirst.addEventListener('load', expandSlide(slideFirst));
}

//*//
//removes error, which was added by function insertError(input)
//*//
function removeError(input) {
    let nextElement = input.parentNode.nextSibling.nextSibling;
    if (nextElement !== null) {
        if (nextElement.tagName === "P" && nextElement.className === "error-text") {
            nextElement.remove();
            input.parentNode.nextSibling.remove();
        }
    }
}
//*//
//inserts an error to next to element which was triggered
//*//
function insertError(input, message) {
    let nextElement = input.parentNode.nextSibling;
    if (nextElement.tagName !== 'BR') {
        if (!(nextElement.tagName === "P" && nextElement.className === "error-text")) {
            input.parentNode.insertAdjacentHTML("afterend", `<br><p class="error-text">` + message + `</p>`);
        }
    }

}

function validateLength(input, minLength = 2) {
    if (input.value.trim().length < minLength) {
        insertError(input, `Minimal field length should be ${minLength} characters`);
    } else {
        removeError(input);
    }
}

function dobValidation(input, id) {
    let existsError = (input.parentNode.lastChild.tagName === 'P') && (input.parentNode.lastChild.className === 'error-text');
    if (document.getElementById(id).selectedIndex === 0) {
        if (!existsError) {
            input.parentNode.insertAdjacentHTML('beforeend', '<p class="error-text">Enter valid date of birth</p>');
        }
    } else {
        var i = input.parentNode.lastChild.tagName;
        if ((document.getElementById('year').selectedIndex !== 0) &&
            (document.getElementById('day').selectedIndex !== 0) &&
            (document.getElementById('month').selectedIndex !== 0)) {
            if (existsError) {
                input.parentNode.lastChild.remove();
            }
        }

    }
}

function countryValidation(input) {
    if (document.getElementById('country').selectedIndex === 0) {
        insertError(input, 'Enter valid country');
    } else {
        removeError(input);
    }

}
//*//
//if js is activated and a button is pressed menu will be triggered(for screen<600)
// and new class will be added to navigation
//*//
function responsiveNav() {
    var x = document.getElementById("myTopnav");
    var className = x.className;
    if (x.className === "menu") {
        x.className += " responsive";
        x.href = '';
    } else {
        x.className = "menu";
    }

}
//*//
//if js is activated and screen(<600) it will be added a new class(with certain slyling)
//*//
function responsiveNavSize() {
    var width = window.innerWidth;

    var x = document.getElementById("myTopnav");
    if (width > 600) {
        x.className = "menu";
    }
}

function validateEmail(input) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (input.value.match(re) === null) {
        insertError(input, "Enter a valid email");
    } else {
        removeError(input);
    }
}

function tabChange(link) {
    if (window.screen.width <= 600) {
        link.href = "#";
    }
}
//*//
//validates gender for register
//*//
function validateGender(input) {
    var first = document.getElementById('radio1');
    var second = document.getElementById('radio2');
    var third = document.getElementById('radio3');

    if (first.checked === false && second.checked === false && third.checked === false) {
        insertError(input, "Enter your gender");
    } else {
        removeError(input);
    }
}
//*//
//validates password for register and password change
//*//
function char_count() {
    if (document.getElementById('password1')) {
        var val = document.getElementById('password1').value;
        var call = document.getElementById('feedback');
    }
    if (document.getElementById('newPassword')) {
        var val = document.getElementById('newPassword').value;
        var call = document.getElementById('feedback2');
    }

    if (val.length > 7) {
        if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) && val.match(/\W/)) {
            call.style.color = "#428c0d";
            call.innerHTML = "<p>Very strong</p>";
        }

        else if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) || val.match(/\W/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/)) {
            call.style.color = "#56a40c";
            call.innerHTML = "<p>Your password is strong</p>";
        } else
        {

            call.style.color = "#ff9410";
            call.innerHTML = "<p class='error-text error-text-pass'>Please make your password stronger</p>";
        }
    } else
    {
        call.style.color = "#ff352c";
        call.innerHTML = "<p class='error-text error-text-pass'>At least 8 characters, a number of symbol</p>";
    }
}

function getXMLHttpRequest() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else {
        try {
            return new ActiveXObject("Msxml2.XMLHTTP.6.0");
        } catch (e) {
            try {

                return new ActiveXObject("Msxml2.XMLHTTP.3.0");
            } catch (e) {
                return null;
            }
        }
    }
}

function sendAjax(method, url, data = null, callback) {

    var request = getXMLHttpRequest();
    if (request !== null) {
        url += '&ajax=1';
    }

    request.onreadystatechange = function() {
        if (this.readyState === 4) {
            var resJson = null;
            var error = null;
            if (this.status > 0) {
                try {
                    resJson = JSON.parse(this.response);
                } catch (e) {
                    error = 'Invalid JSON response: ' + e;
                }
                if (this.status >= 300) {
                    if (resJson.message) {
                        error = resJson.message;
                    } else {
                        error = 'There is an error';
                    }
                }
            } else {
                error = 'Cancelled';
            }

            callback(error, resJson, this.status);
        }
    };
    request.open(method, url, true);
    request.setRequestHeader("Accept", "application/json");
    if (data === null) {
        request.send();
    } else {
        request.send(data);
    }

}

function createCustomAlert(mainText, subText, link = null) {
    var ALERT_TITLE = mainText;
    var ALERT_BUTTON_TEXT = "Ok";
    d = document;

    if (d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if (d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth) / 2 + "px";
    alertObj.style.visiblity = "visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));
    msg = alertObj.appendChild(d.createElement("p"));
    msg.innerHTML = subText;
    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.focus();
    btn.onclick = function() { removeCustomAlert(link); return false; };
    btn.tabindex = "10";
    alertObj.style.display = "block";

}

function removeCustomAlert(link) {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
    if (link !== null) {
        window.location.href = link;
    }

}
if (document.getElementById("myBtn1") !== null) {
    document.getElementById("myBtn1").style = 'none';
    document.getElementById("myBtn1").onclick = function() { printMe() };
}

function printMe() {
    window.print();
}


function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("regionDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) == 0) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

function newWindow() {
    window.open("https://www.paypal.com/sg/signin");
}