<?php
/*
$dbQuery = null;
$dbQuery = \skwd\models\Product::find();
$this->_params['error'] = [];
$json = json_encode($dbQuery);

file_put_contents("values.txt",$json);
?>
<?php if ($dbQuery === null || count($dbQuery) === 0):
    array_push($this->_params['error'], "There are no products yet");
    ?>
<?php else: ?>
    <section class="container">
        <?php foreach ($dbQuery as $key => $value): ?>

            <?php $dbPicture = productsPicture($dbQuery[$key]['id']);
            $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
            $price =  $dbQuery[$key]['standardPrice']-($dbQuery[$key]['standardPrice']*$dbQuery[$key]['discount']/100);
            ?>
                <article>
                    <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"><img class="container-image" src="<?php echo $picture; ?>"></a><br>
                    <div class="container-name">
                        <a href="?c=products&a=theProduct&i=<?= $dbQuery[$key]['id'] ?>"> <?= $dbQuery[$key]['prodName']; ?></a>
                    </div>
                    <div class="container-price">
                        <?= $price . ' €' ?>
                    </div>

                    <form action="?a=shoppingCartShow&i=<?= $dbQuery[$key]['id']; ?>" id="addToBasketForm"
                          method="get">
                        <div class="basket-button">
                            <input type="submit" onclick="preventDefaultAndUseAjax(event, <?= $dbQuery[$key]['id']; ?>)" value="Add to basket"/>
                        </div>
                    </form>

                </article>

        <?php endforeach; ?>
    </section>
<?php endif; ?>
*/



?>




<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function(){
        var lastID = $('.load-more').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
            $.ajax({
                type:'POST',
                url:'ajax_more.php',
                data:'id='+lastID,
                beforeSend:function(){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('#postList').append(html);
                }
            });
        }
    });
});

</script>-->


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
     
      <a href="?c=products&a=theProduct&i=<?= $row['id'] ?>"><img class="container-image" src="<?php echo $picture; ?>"></a><br>
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
        <img src="loading.gif"/>
    </div>
<?php } ?>
</section>
</div>


<script type="text/javascript">
   /* $(window).scroll(function(){
        var lastID = $('.load-more').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
            $.ajax({
                type:'POST',
                url:'ajax_more.php',
                data:'id='+lastID,
                beforeSend:function(){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('#postList').append(html);
                }
            });
        }
    });
    });*/

    (function () {

        window.addEventListener('scroll',function() {

            document.getElementsByClassName('load-more')[0].style.display = 'block'; // show
            var lastID = document.getElementsByClassName('load-more')[0].getAttribute("lastID");


            if  (((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && (lastID!=0)){
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


                /* sendAjax('post', 'ajax_more.php', 'id='+lastID, function (error, resJson, status) {

                      document.getElementsByClassName('load-more')[0].style.display = 'none'; // show
                      console.log(status);
                      //document.getElementById('postList').append();



                  });*/

            }
        })


    })();

</script>








