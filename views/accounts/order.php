<div class="order">
    
    
    <div class="fieldset">
        
        <?php $priceProducts =  orderPriceProducts($this->_params['orders'][0]['id']); ?>
        <?php $priceTotal = $priceProducts + $this->_params['orders'][0]['shipPrice']; ?>
        
        <h2>Your order from: <?php echo dateOfBirthInRightOrder($this->_params['orders'][0]['orderDate']); ?> </h2>
        <br>
        <table>
                    <tr>
                        <td class="tdWidth">Street:</td>
                        <td><?php echo $this->_params['address'][0]['street'];; ?></td>
                    </tr>
                    <tr>
                        <td class="tdWidth">Zip:</td>
                        <td><?php echo $this->_params['address'][0]['zip']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdWidth">City:</td>
                        <td><?php echo $this->_params['address'][0]['city']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdWidth">Country:</td>
                        <td><?php echo $this->_params['address'][0]['country']; ?></td>
                    </tr>
                                            <tr>
                                                <td class="tdWidth">Ship date:</td>
                                                <td><?php echo dateOfBirthInRightOrder($this->_params['orders'][0]['shipDate']); ?></td>
                                            </tr>
                   
            <tr>
                <td class="tdWidth">Pay method:</td>
                <td><?php echo $this->_params['orders'][0]['payMethod']; ?></td>
            </tr>
            <tr>
                <td class="tdWidth">Pay status:</td>
                <td><?php echo $this->_params['orders'][0]['payStatus']; ?></td>
            </tr>
            <tr>
                <td class="tdWidth">Pay date:</td>
                <td><?php echo dateOfBirthInRightOrder($this->_params['orders'][0]['payDate']); ?></td>
            </tr>
            <tr><td class="tdWidth">Total price for products:</td><td><?php echo number_format($priceProducts, 2, ".", "" ) . ' €';?></td></tr>
        <tr><td class="tdWidth">Ship price: </td><td><?php echo number_format($this->_params['orders'][0]['shipPrice'], 2, ".", "" ). ' €';?></td></tr>
        <tr><td class="tdWidth"><strong> Total price: </strong></td><td><strong><?php echo  number_format($priceTotal, 2, ".", "" ). ' €';?></strong></td></tr>
            </table>
        <br>
       
        <div class="icon-printer" id="myBtn1" style="float: left; display: none;" >
    <div class="printer-body" style="background-color: #9a0002"></div>
    <div class="printer-top"></div>
    <div class="printer-bottom"></div>
    <div class="printer-file-top" style="background-color: #e0292c"></div>
    <div class="printer-dot" style="left: 65%"></div>
    <div class="printer-line" style="left: 50%; top: 32%; margin-left: -12%"></div>
    <div class="printer-line" style="left: 50%; top: 42%; margin-left: -12%"></div>
    <div class="printer-file-bottom" style="background-color: #e0292c"></div>
  </div> 
  <br>
  

        <br>
    </div>
    <?php foreach ($this->_params['orderitem'] as $key => $value): ?>

        <div class="fieldset">

            <?php array_push($this->_params['product'], \skwd\models\Product::find('prodId= ' . '\'' . $this->_params['orderitem'][$key]['productID'] . '\'' . ' order by prodId')); ?>
            <?php array_push($this->_params['allProducts'], \skwd\models\AllProducts::find('productID= ' . '\'' . $this->_params['orderitem'][$key]['productID'] . '\'' . ' order by productID')); ?>
            <?php array_push($this->_params['picture'], \skwd\models\Picture::find('productID= ' . '\'' . $this->_params['orderitem'][$key]['productID'] . '\'' . ' order by productID')); ?>
            <div class="orderWrapper">

                <table>
                    <tr>
                        <td class="tdWidth">Product name:</td>
                        <td><?php echo $this->_params['product'][$key][0]['prodName']; ?></td>
                    </tr>
                    <tr>
                        <td class="tdWidth">Product typ:</td>
                        <td><?php echo $this->_params['product'][$key][0]['productType']; ?></td>
                    </tr>
                    <!-- ein produkt besitzt eine unbestimmte anzahl an properties -->
                    <?php foreach ($this->_params['allProducts'][$key] as $key1 => $value1): ?>
                        <tr>
                            <td><?php echo $this->_params['allProducts'][$key][$key1]['name'] . ': '; ?> </td>
                            <td><?php echo $this->_params['allProducts'][$key][$key1]['value']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td class="tdWidth">Unit cost:</td>
                        <td><?php echo $this->_params['orderitem'][$key]['actualPrice']. ' €'; ?></td>
                    </tr>
                    <tr>
                        <td class="tdWidth">Quantity:</td>
                        <td><?php echo $this->_params['orderitem'][$key]['qty']; ?></td>
                    </tr>


                </table>
                <div class=orderPictureBox>
                
                <?php if(empty($this->_params['picture'][$key][0]['path'])): ?>
                    <img src="assets/images/noPicture.jpg" alt="product has no picture">
                <?php else: ?>
                    <img src="<?php echo $this->_params['picture'][$key][0]['path']; ?>" alt="product">
                <?php endif; ?>
                    <br>
                    <a href="?c=products&a=theProduct&i=<?php echo $this->_params['product'][$key][0]['prodId']; ?>">go
                        To product</a>
                </div>
            </div>
            <br><br>

        </div>
    <?php endforeach; ?>
</div>
            