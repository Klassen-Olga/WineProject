var loadMoreButton=document.getElementById('loadMore');
if(loadMoreButton!==null){
    loadMoreButton.addEventListener('click', function () {
        loadMoreButton.classList.add("clicked");
    });
    addEventListener('click',function() {
        var loadButtonClicked=document.getElementsByClassName("clicked").length;
        var lastID = document.getElementsByClassName('load-more')[0].getAttribute("lastID");
        if  (lastID!=0 && loadButtonClicked!==0){
            var request2 = getXMLHttpRequest();
            request2.open('post', 'config/ajaxLoadMore.php', true);
            request2.onreadystatechange = function()
            {
                if(request2.readyState == 4 && request2.status == 200 && loadButtonClicked!==0)
                {
                    document.getElementsByClassName('load-more')[0].parentNode.removeChild(document.getElementsByClassName('load-more')[0]);
                    document.getElementById('postList').innerHTML+=this.responseText;
                }

            };
            loadMoreButton.classList.remove("clicked");
            request2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request2.send("id="+lastID);

        }
        if (lastID==0){
            var loadMoreBtn=document.getElementById('loadMore');
            loadMoreBtn.style.display='none';
        }
    });
}




