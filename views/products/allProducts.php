<div  id="postList">
<section class="container">
    <?php
 
 $db = $GLOBALS['db'];
    // Get records from the database
    //$query = $db->query("SELECT * FROM  product ORDER BY id DESC LIMIT 2");

    $statement = $db->prepare("SELECT * FROM  product ORDER BY prodId DESC LIMIT 5");
    $statement->execute();
   // $result = $statement->fetchall();
  
    if($statement->rowCount() > 0){ 
        while($row = $statement->fetch()){ 
            $postID = $row['prodId'];
            $dbPicture = productsPicture($row['prodId']);
        $price =  $row['standardPrice']/*-($row['standardPrice']*$row['discount']/100); */  ;
    ?>
    
     <article>
     

                    <div class="container-name">
                        <a href="?c=products&a=theProduct&i=<?= $row['prodId'] ?>"> <?= $row['prodName']; ?></a>
                    </div>
                    <div class="container-price">
                        <?= $price . ' €' ?>
                    </div>

                    <form action="?a=shoppingCartShow&i=<?= $row['prodId']; ?>" id="addToBasketForm"
                          method="get">
                        <div class="basket-button">
                            <input type="submit" onclick="preventDefaultAndUseAjax(event, <?= $row['prodId']; ?>)" value="Add to basket"/>
                        </div>
                    </form>
      </article>
<?php } ?>

    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">

    </div>
<?php } ?>
</section>
</div>
<button id="loadMore">Load More</button>

<script type="text/javascript">


        document.getElementById('loadMore').addEventListener('click',function() {

            document.getElementsByClassName('load-more')[0].style.display = 'block'; // show
            var lastID = document.getElementsByClassName('load-more')[0].getAttribute("lastID");
            if  (lastID!=0){
                var request = getXMLHttpRequest();
                request.open('post', 'ajax_more.php', true);
                request.onreadystatechange = function()
                {
                    if(request.readyState == 4 && request.status == 200)
                    {
                        document.getElementsByClassName('load-more')[0].parentNode.removeChild(document.getElementsByClassName('load-more')[0]);
                        document.getElementById('postList').innerHTML+=this.responseText;
                        console.log(lastID);
                    }
                };
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send("id="+lastID);
            }
            var loadMoreBtn=document.getElementById('loadMore');
            if (lastID==2){
                loadMoreBtn.style.display='none';
            }
        });




</script>








