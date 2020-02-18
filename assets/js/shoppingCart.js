// ajax is supported we can prevent default by each button "Add to Basket"
//it could be made by javascript after the page was loaded for each product, we wanted to reduce traffic made by javascript
function preventDefaultAndUseAjax(event, id){
    if (getXMLHttpRequest()===null){
        return;
    }
    event.preventDefault();
    event.stopPropagation();
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
function changeQTY(select, productId) {
    var qty=select.options[select.selectedIndex].value;
    var url=window.location.href+'&qty='+qty+'&i='+productId+'&cartOp=upDate';
    sendAjax('get',url , null,function (error, resJson, status) {

        if (error===null && status<400){
            var h2=document.getElementById('shoppingCartTotal');
            h2.innerHTML= 'Subtotal for '+ resJson.qty +' items: '+ resJson.subtotal+ ' €';
        }


    });
}
/*function deleteItem(event, input, productId){
    if (getXMLHttpRequest()===null){
        return;
    }
    event.preventDefault();
    event.stopPropagation();
    sendAjax('get',window.location.href+'&i='+productId+'&cartOp=delete', null,function (error, resJson, status) {


    });

}*/








