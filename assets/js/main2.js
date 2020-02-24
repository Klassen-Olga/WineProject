function include(file) {

    var script  = document.createElement('script');
    script.src  = file;
    script.type = 'text/javascript';
    script.defer = true;

    document.getElementsByTagName('footer').item(0).appendChild(script);

}

include('assets/js/script.js');
include('assets/js/register.js');
include('assets/js/ajaxLoadMore.js');
include('assets/js/shoppingCart.js');
