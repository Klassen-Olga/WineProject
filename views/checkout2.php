
<h1>Checkout</h1>
<div class="checkout2">
<div class="fieldset">

<h3 class="h4Top">Consignee </h3>
<br>
<table>
<tr><td class="tdWidth">First name: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
<tr><td class="tdWidth">Last name:</td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
<tr><td class="tdWidth">Email: </td><td><?php echo $this->_params['account'][0]['email'];?></td></tr>
<tr><td class="tdWidth">Phone number: </td><td><?php echo $this->_params['customer'][0]['phoneNumber']; ?></td></tr>
<tr><td class="tdWidth">Date of birth: </td><td><?php echo dateOfBirthInRightOrder($this->_params['customer'][0]['dateOfBirth']);?></td></tr>
</table>

<br>
<hr>

<br>

<h3>Delivery address </h3>
<br>
<table>
<tr><td class="tdWidth">Zip: </td><td><?php echo $_POST['zip'];?></td></tr>
<tr><td class="tdWidth">City</td><td><?php echo $_POST['city'];?></td></tr>
<tr><td class="tdWidth">Street</td><td><?php echo $_POST['street'];?></td></tr>
<tr><td class="tdWidth">Country</td><td><?php echo $_POST['country'];?></td></tr>
</table>
<br>
<hr>
<br>


<h3>Pay method and prices:  </h3>
<br>

<table>
<tr><td class="tdWidth">Pay method: </td><td><?php echo $_POST['payMethod'];?></td></tr>
<tr><td class="tdWidth">Price for products: </td><td><?php echo number_format( $this->_params['orderPrice'], 2, ".", "" ) . ' €';?></td></tr>
<tr><td class="tdWidth">Ship price: </td><td><?php echo number_format( $this->_params['shipPrice'], 2, ".", "" ) . ' €';?></td></tr>
<tr><td class="tdWidth"><strong> Total price: </strong></td><td><strong><?php echo number_format( $this->_params['orderPriceTotal'], 2, ".", "" ) . ' €';?></strong></td></tr>

</table>




<form action="<?= $_SERVER['PHP_SELF'] . '?a=checkout';?>" method = "POST">
<div class="button">
    <input type="submit" name="submitOrder" value="submit order">
</div>
</form>
</div>
</div>

