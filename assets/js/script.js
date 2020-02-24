//Sticky navigation by scrolling
window.onscroll = function() { changeNav() };

var navbar = document.getElementById("myTopnav");
var sticky = navbar.offsetTop+50;

var prevNext=document.getElementById('nextPrevious');
if (prevNext!==null){
    prevNext.style.display="none";
}
var loadMoreAjax=document.getElementById('loadMore');
if (loadMoreAjax!==null){
    loadMoreAjax.style.display='block';
}

function changeNav() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}

function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
var slideFirst = document.getElementById('slideFirst');
if (slideFirst !== null) {
    slideFirst.addEventListener('load', myFunction(slideFirst));
}


function removeError(input) {
    let nextElement = input.parentNode.nextSibling.nextSibling;
    if (nextElement !== null) {
        if (nextElement.tagName === "P" && nextElement.className === "error-text") {
            nextElement.remove();
            input.parentNode.nextSibling.remove();
        }
    }
}


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

function responsiveNav() {
    var x = document.getElementById("myTopnav");
    var className = x.className;
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
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

function char_count() {
    //Über die DOM-Methode document.getElementById wird der Wert aus dem Eingabefeld geholt
    //und der Variablen val zugewiesen.
    if (document.getElementById('password1')) {
        var val = document.getElementById('password1').value;
        var call = document.getElementById('feedback');
    }
    if (document.getElementById('newPassword')) {
        var val = document.getElementById('newPassword').value;
        var call = document.getElementById('feedback2');
    }
    //Anschließend wird über die selbe DOM-Methode ein Referenzpunkt für das Feedback erzeugt 
    //und in der Variablen call gespeichert.

    //Ab hier beginnt die Prüfung.
    //Das Passwort ist entweder zu kurz, unsicher, sicher oder sehr sicher

    //Ist das Passwort wenigstens 6 Zeichen lang?
    if (val.length > 7) {

        //Wenn das Passwort neben Buchstaben zusätzlich wenigstens eine Zahl 
        //und ein Sonderzeichen enthält, ist es "sehr sicher".    
        if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) && val.match(/\W/)) {
            call.style.color = "#428c0d";
            call.innerHTML = "<p>Very strong</p>";
        }

        //Wenn das Passwort nur eine Zahl oder ein Sonderzeichen enthält, ist es "sicher"?           
        else if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) || val.match(/\W/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/)) {
            call.style.color = "#56a40c";
            call.innerHTML = "<p>Your password is strong</p>";
        } else //Hier enthält das Passwort weder Ziffern noch Sonderzeichen und ist somit "unsicher".
        {

            call.style.color = "#ff9410";
            call.innerHTML = "<p class='error-text error-text-pass'>Please make your password stronger</p>";
        }
    } else //Hier enthält das Passwort nicht mal die erforderlichen 6 Zeichen und ist daher "zu kurz"
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
    if (request !== null ) {
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
    if (data===null) {
        request.send();
    } else {
        request.send(data);
    }

}

function createCustomAlert(mainText, subText, link = null) {
    var ALERT_TITLE = mainText;
    var ALERT_BUTTON_TEXT = "Ok"
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
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = subText;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.focus();
    btn.onclick = function() { removeCustomAlert(link); return false; };
    /*window.location.hash = '#closeBtn';*/
    btn.tabindex = "10";
    alertObj.style.display = "block";

}

function removeCustomAlert(link) {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
    if (link !== null) {
        window.location.href = link;
    }

}
if (document.getElementById("myBtn1")!==null){
    document.getElementById("myBtn1").style = 'none';

    document.getElementById("myBtn1").onclick = function() { printMe() };

}


function printMe() {
    window.print();
}



function dropDownToggle(input) {
    var nexDiv = input.nextSibling.nextSibling;
    if (nexDiv.style.display === "none") {
        var dropdownContents = document.getElementsByClassName('dropdown-content');
        for (var i = 0; i < dropdownContents.length; i++) {
            dropdownContents[i].style.display = 'none';

        }
        nexDiv.style.display = "block";
    } else {
        nexDiv.style.display = "none";
    }
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






