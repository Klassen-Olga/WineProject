
    <h1>SKWD ~ Infinity of Wine</h1>


<div class="row">
    <div class="column">
        <img src="assets/images/slideGallery/1.jpg" alt="Nature" style="width:100%"  onclick="myFunction(this);" onload="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/2.jpg" alt="Snow" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/3.jpg" alt="Mountains" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/4.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/5.jpg" alt="Mountains" style="width:100%" onclick="myFunction(this);">
    </div>
    <div class="column">
        <img src="assets/images/slideGallery/6.jpg" alt="Lights" style="width:100%" onclick="myFunction(this);">
    </div>
</div>

<div class="container-slide">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" style="width:100%">
    <div id="imgtext"></div>
</div>

<?php

    /*key=productId, value sale in %*/
      /*  $saleProducts=[
            0=>["1"=>10],
            1=>["2"=>11],
            2=>["3"=>12],
            3=>["4"=>13],
            4=>["5"=>14],
            5=>["6"=>15],
            6=>["7"=>16],
            7=>["8"=>20],
            8=>["9"=>50],

    ];
foreach ($saleProducts as $key => $value):

$dbQuery = null;
$dbQuery = \skwd\models\Product::find();
$this->_params['error'] = [];
if ($dbQuery === null || count($dbQuery) === 0) :
    array_push($this->_params['error'], "There are no products yet");
else:

 $dbPicture = productsPicture($dbQuery[$key]['id']);
        $picture = count($dbPicture) !== 0 ? $dbPicture[0]['path'] : 'assets/images/noPicture.jpg';
        $price = $dbQuery[$key]['standardPrice'];
        */?>
       <!-- <article>
            <a href="?c=products&a=theProduct&i=<?/*/*= $dbQuery[$key]['id'] */?>"><img class="container-image" src="<?php /*/*echo $picture; */?>"></a><br>
            <div class="container-name">
                <a href="?c=products&a=theProduct&i=<?/*/*= $dbQuery[$key]['id'] */?>"> <?/*/*= $dbQuery[$key]['prodName']; */?></a>
            </div>
            <div class="container-price">
                <?/*/*= $price . ' €' */?>
            </div>
            <iframe name="hiddenFrame" class="hide"></iframe>
            <form action="?a=shoppingCartShow&i=<?/*/*= $dbQuery[$key]['id']; */?>&p=<?/*/*= $price; */?>"
                  method="post" <?/*= usersIdIfLoggedIn() === null ? "" : "target=\"hiddenFrame\"" */?>>
                <div class="basket-button">
                    <button type="submit">Add to basket</button>
                </div>
            </form>

        </article>-->

    <?php /*endforeach; */?>



