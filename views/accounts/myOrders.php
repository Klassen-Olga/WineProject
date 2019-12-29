<p>orders</p>

<div>


<?php foreach($this->_params['orders'] as $key => $value):?>
       
<fieldset>
<legend>orderDate: <?php echo $this->_params['orders'][$key]['orderDate'];?></legend>
<table>
<tr><td>OrderId: <?php echo $this->_params['orders'][$key]['id'];?></td></tr>
<tr><td>shipDate:</td> <td><?php echo $this->_params['orders'][$key]['shipDate'];?></td></tr>
<tr><td>shipPrice: </td><td><?php echo $this->_params['orders'][$key]['shipPrice'];?></td></tr>
<tr><td>payStatus: </td><td><?php echo $this->_params['orders'][$key]['payStatus'];?></td></tr>
<tr><td>payMethod: </td><td><?php echo $this->_params['orders'][$key]['payMethod'];?></td></tr>
<tr><td>payDate: </td><td><?php echo $this->_params['orders'][$key]['payDate'];?></td></tr>
</table>

<a href="?c=accounts&a=order&i=<?=$this->_params['orders'][$key]['id']?>">go to order</a>

</fieldset>
<br>

<?php endforeach;?>




</div>