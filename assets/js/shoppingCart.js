// ajax is supported we can prevent default by each button "Add to Basket"
//it could be made by javascript after the page was loaded for each product, we wanted to reduce traffic made by javascript
function preventDefaultAndUseAjax(event, id){
    if (getXMLHttpRequest()===null){
        return;
    }
    event.preventDefault();
    event.stopPropagation();
    var addToBasketForm=document.getElementById('addToBasketForm');
    sendAjax('get', '../../WineProject/index.php?a=shoppingCartShow&i='+id,null,function (error, resJson, status){
        if(error===null && status<400){
            if (typeof resJson.ok !=='undefined'){
                createCustomAlert('You have successfully added a purchase!', 'Type ok');
            }
            else if(typeof resJson.notLoggedIn !=='undefined'){
                createCustomAlert("Please Log in", 'Type ok to log in', "../../WineProject?c=pages&a=login");
            }
            else{
                for (var i=0; i<resJson.length; i++){
                    createCustomAlert(resJson[i], 'Type ok');
                }
            }
        }

    });

}

        //hide all change qty buttons if js is included
function changeQTY(id, qty) {
/*    var qtySelectors= document.getElementsByClassName('qtySelectors');
    for (var i=0; i<qtySelectors.length; i++){
        qtySelectors[i].addEventListener('change', function (event) {

        })
    }*/
    sendAjax('get', window.location.href+'&i='+id+'&qty='+qty, null,function (error, resJson, status) {


    });
}








