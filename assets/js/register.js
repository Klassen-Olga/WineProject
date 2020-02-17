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
            if (submit.parentNode.firstChild.tagName!=="P"){
                submit.parentNode.insertAdjacentHTML("afterbegin", `<p class="ajaxErr">` + "*Check all fields" + `</p>`);
            }
            return;
        }

        sendAjax('post', window.location.href, new FormData(form), function (error, resJson, status) {

            if (error === null){
                if (typeof  resJson.ok !== 'undefined'){
                    createCustomAlert('Welcome to SKWD!', 'Sign now in', "../../WineProject?c=pages&a=login");

                }
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
