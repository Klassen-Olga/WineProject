

<div class="myOrder">
<h1>Orders</h1>

<?php foreach($this->_params['orders'] as $key => $value):?>
       
<div class="fieldset">
<h3>orderDate from <?php echo $this->_params['orders'][$key]['orderDate'];?></h3>


    <table>
        <tr><td class="tdWidth">OrderId: </td> <td><?php echo $this->_params['orders'][$key]['id'];?></td></tr>
        <tr><td class="tdWidth">shipDate: </td> <td><?php echo $this->_params['orders'][$key]['shipDate'];?></td></tr>
        <tr><td class="tdWidth">shipPrice: </td><td><?php echo $this->_params['orders'][$key]['shipPrice'];?></td></tr>
        <tr><td class="tdWidth">payStatus: </td><td><?php echo $this->_params['orders'][$key]['payStatus'];?></td></tr>
        <tr><td class="tdWidth">payMethod: </td><td><?php echo $this->_params['orders'][$key]['payMethod'];?></td></tr>
        <tr><td class="tdWidth">payDate: </td><td><?php echo $this->_params['orders'][$key]['payDate'];?></td></tr>
    </table>
    
    <a href="?c=accounts&a=order&i=<?=$this->_params['orders'][$key]['id']?>">go to order</a>
    

</div>
<br>

<?php endforeach;?>


</div>