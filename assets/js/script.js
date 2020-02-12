function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}

function removeError(input) {
    let nextElement = input.parentNode.nextSibling;
    if (nextElement.tagName === "P" && nextElement.className === "error-text") {
        nextElement.remove();
    }
}

function insertError(input, message) {
    let nextElement = input.parentNode.nextSibling;
    if (!(nextElement.tagName === "p" && nextElement.className === "error-text")) {
        input.parentNode.insertAdjacentHTML("afterend", `<p class="error-text">` + message + `</p>`);
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
    if (document.getElementById(id).selectedIndex === 0) {
        if (!(input.parentNode.firstChild.tagName === 'P' && input.parentNode.firstChild.className === 'error-text')) {
            input.parentNode.insertAdjacentHTML('afterbegin', '<p class="error-text">Enter valid date of birth</p>')
        }
    } else {
        if ((document.getElementById('year').selectedIndex !== 0) &&
            (document.getElementById('day').selectedIndex !== 0) &&
            (document.getElementById('month').selectedIndex !== 0)) {
            if (input.parentNode.firstChild.tagName === 'P' && input.parentNode.firstChild.className === 'error-text') {
                input.parentNode.firstChild.remove();
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

function tabChange(link) {
    if (window.screen.width <= 600) {
        link.href = "#";
    }
}

function char_count() {
    //Über die DOM-Methode document.getElementById wird der Wert aus dem Eingabefeld geholt
    //und der Variablen val zugewiesen.
    var val = document.getElementById('password1').value;

    //Anschließend wird über die selbe DOM-Methode ein Referenzpunkt für das Feedback erzeugt 
    //und in der Variablen call gespeichert.
    var call = document.getElementById('feedback');

    //Ab hier beginnt die Prüfung.
    //Das Passwort ist entweder zu kurz, unsicher, sicher oder sehr sicher

    //Ist das Passwort wenigstens 6 Zeichen lang?
    if (val.length > 7) {

        //Wenn das Passwort neben Buchstaben zusätzlich wenigstens eine Zahl 
        //und ein Sonderzeichen enthält, ist es "sehr sicher".    
        if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) && val.match(/\W/)) {
            call.style.color = "#428c0d";
            call.innerHTML = "<strong>Very strong</strong>";
        }

        //Wenn das Passwort nur eine Zahl oder ein Sonderzeichen enthält, ist es "sicher"?           
        else if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) || val.match(/\W/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/)) {
            call.style.color = "#56a40c";
            call.innerHTML = "<strong>Your password ist strong</strong>";
        } else //Hier enthält das Passwort weder Ziffern noch Sonderzeichen und ist somit "unsicher".
        {

            call.style.color = "#ff9410";
            call.innerHTML = "<strong>Please make your password stronger</strong>";
        }
    } else //Hier enthält das Passwort nicht mal die erforderlichen 6 Zeichen und ist daher "zu kurz"
    {
        call.style.color = "#ff352c";
        call.innerHTML = "<strong>At least 8 characters, a number of symbol</strong>";
    }
}