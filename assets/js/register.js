var form = document.getElementById('registerForm');
if (form!==null){
    var submit = form.querySelector('input[type="submit"]');
    submit.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        var event = document.createEvent("HTMLEvents");
        var event1 = document.createEvent("HTMLEvents");

        event.initEvent("change", false, true);
        event1.initEvent("keyup", false, true);
        document.getElementById('fname').dispatchEvent(event);
        document.getElementById('lname').dispatchEvent(event);
        document.getElementById('email').dispatchEvent(event);
        document.getElementById('month').dispatchEvent(event);
        document.getElementById('day').dispatchEvent(event);
        document.getElementById('year').dispatchEvent(event);
        document.getElementById('password1').dispatchEvent(event1);
        document.getElementById('password2').dispatchEvent(event);
        document.getElementById('street').dispatchEvent(event);
        document.getElementById('zip').dispatchEvent(event);
        document.getElementById('city').dispatchEvent(event);
        document.getElementById('country').dispatchEvent(event);
        document.getElementById('radio1').dispatchEvent(event);
        if (document.getElementsByClassName('error-text').length>0){
            return;
        }

        sendAjax('post', window.location.href, new FormData(form), function (error, resJson, status) {

            if (error === null){
                if (typeof  resJson.ok !== 'undefined'){
                    console.log("Welcome");
                }
/*
                submit.parentNode.nextSibling.insertAdjacentHTML('afterend',`<div id="popup1" class="overlay">`+
                    ` <div class="popup">`+ `<h2>Here i am</h2>`+ `<a class="close" href="../../WineProject?c=pages&a=login">&times;</a>`+ `<div class="content">`+
                                                        `Thank to pop me out of that button, but now i'm done so you can close this window.`+
                    `</div>`+
                    `</div>`+
                    `</div>`);

                }*/
                else{
                    for (var i=0; i< form.children[0].children.length; i++){
                        if ( form.children[0].children[i].tagName!=='P'){
                            break;
                        }
                        else{
                            form.children[0].children[i].remove();
                        }
                    }



                    for(var i=0; i<resJson.length; i++){

                        form.children[0].insertAdjacentHTML("afterbegin", `<p class="ajaxErr">` +'*' +resJson[i] + `</p>`);
                    }


                    if (submit.parentNode.firstChild.tagName!=="P"){
                        submit.parentNode.insertAdjacentHTML("afterbegin", `<p class="ajaxErr">` + "*Check all fields" + `</p>`);
                    }
                }

            }
            else{
                console.log(error);
            }
        });
    });

}
