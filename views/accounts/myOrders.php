

<div class="myOrder">
<h1>Orders</h1>


<?php foreach($this->_params['orders'] as $key => $value):?>
       
<div class="fieldset">
<h3>Your order from <?php echo dateOfBirthInRightOrder($this->_params['orders'][$key]['orderDate']); ?></h3>
<br>

<?php $priceProducts =  orderPriceProducts($this->_params['orders'][$key]['id']); ?>
<?php $priceTotal = $priceProducts + $this->_params['orders'][$key]['shipPrice']; ?>
    <table>
        <tr><td class="tdWidth">Shid date: </td> <td><?php echo dateOfBirthInRightOrder($this->_params['orders'][$key]['shipDate']);?></td></tr>
        <tr><td class="tdWidth">Pay status: </td><td><?php echo $this->_params['orders'][$key]['payStatus'];?></td></tr>
        <tr><td class="tdWidth">Pay method: </td><td><?php echo $this->_params['orders'][$key]['payMethod'];?></td></tr>
        <tr><td class="tdWidth">Pay date: </td><td><?php echo $this->_params['orders'][$key]['payDate'];?></td></tr>
        <tr><td class="tdWidth">Total price for products:</td><td><?php echo number_format($priceProducts, 2, ",", "." ) . ' Euro';?></td></tr>
        <tr><td class="tdWidth">Ship price: </td><td><?php echo number_format($this->_params['orders'][$key]['shipPrice'], 2, ",", "." ). ' Euro';?></td></tr>
        <tr><td class="tdWidth"><strong> Total price: </strong></td><td><strong><?php echo  number_format($priceTotal, 2, ",", "." ). ' Euro';?></strong></td></tr>
    </table>
    
    <a href="?c=accounts&a=order&i=<?=$this->_params['orders'][$key]['id']?>">go to order</a>
    

</div>
<br>

<?php endforeach;?>


</div>