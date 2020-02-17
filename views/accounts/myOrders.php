

<div class="myOrder">
<h1>Orders</h1>

<?php foreach($this->_params['orders'] as $key => $value):?>
       
<div class="fieldset">
<h3>orderDate from <?php echo dateOfBirthInRightOrder($this->_params['orders'][$key]['orderDate']); ?></h3>


    <table>
        <tr><td class="tdWidth">OrderId: </td> <td><?php echo $this->_params['orders'][$key]['id'];?></td></tr>
        <tr><td class="tdWidth">shipd date: </td> <td><?php echo dateOfBirthInRightOrder($this->_params['orders'][$key]['shipDate']);?></td></tr>
        <tr><td class="tdWidth">ship price: </td><td><?php echo $this->_params['orders'][$key]['shipPrice'];?></td></tr>
        <tr><td class="tdWidth">pay status: </td><td><?php echo $this->_params['orders'][$key]['payStatus'];?></td></tr>
        <tr><td class="tdWidth">pay method: </td><td><?php echo $this->_params['orders'][$key]['payMethod'];?></td></tr>
        <tr><td class="tdWidth">pay date: </td><td><?php echo $this->_params['orders'][$key]['payDate'];?></td></tr>
    </table>
    
    <a href="?c=accounts&a=order&i=<?=$this->_params['orders'][$key]['id']?>">go to order</a>
    

</div>
<br>

<?php endforeach;?>


</div>