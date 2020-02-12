

<div class="order">


    <div class="fieldset">
       
        <h2>your order from: <?php echo $this->_params['orders'][0]['orderDate'];?> </h2>
        <br>
        <table>
            <tr><td class="tdWidth">OrderId: </td><td><?php echo $this->_params['orders'][0]['id'];;?></td></tr>
            <tr><td class="tdWidth">orderDate: </td><td><?php echo $this->_params['orders'][0]['orderDate'];?></td></tr>
            <tr><td class="tdWidth">shipDate:</td> <td><?php echo $this->_params['orders'][0]['shipDate'];?></td></tr>
            <tr><td class="tdWidth">shipPrice: </td><td><?php echo $this->_params['orders'][0]['shipPrice'];?></td></tr>
            <tr><td class="tdWidth">payStatus: </td><td><?php echo $this->_params['orders'][0]['payStatus'];?></td></tr>
            <tr><td class="tdWidth">payMethod: </td><td><?php echo $this->_params['orders'][0]['payMethod'];?></td></tr>
            <tr><td class="tdWidth">payDate: </td><td><?php echo $this->_params['orders'][0]['payDate'];?></td></tr>
            <tr><td class="tdWidth">country: </td><td><?php echo  $this->_params['address'][0]['country'];?></td></tr>
            <tr><td class="tdWidth">city: </td><td><?php echo $this->_params['address'][0]['city'];?></td></tr>
            <tr><td class="tdWidth">zip: </td><td><?php echo $this->_params['address'][0]['zip'];?></td></tr>
            <tr><td class="tdWidth">street: </td><td><?php echo $this->_params['address'][0]['street'];;?></td></tr>
            <tr><td> </td><td></td></tr>
            <tr><td> </td><td></td></tr>
        </table>
        <br>
        <hr>
        <br>
        
        <?php foreach($this->_params['orderitem'] as $key => $value):?>
            
            <?php array_push($this->_params['product'],\skwd\models\Product::find('id= '.'\''. $this->_params['orderitem'][$key]['productID']. '\''.' order by id'));?>
            <?php array_push($this->_params['allProducts'],\skwd\models\AllProducts::find('productID= '.'\''. $this->_params['orderitem'][$key]['productID']. '\''.' order by productID')); ?>
            
            <table>
                <tr><td class="tdWidth">product id: </td><td><?php echo $this->_params['product'][$key][0]['id'];?></td></tr>
                <tr><td class="tdWidth">product name: </td><td><?php echo $this->_params['product'][$key][0]['prodName'];?></td></tr>
                <tr><td class="tdWidth">product typ: </td><td><?php echo $this->_params['product'][$key][0]['productType'];?></td></tr>
                
                <?php foreach($this->_params['allProducts'][$key] as $key1 => $value1):?>
                    <tr><td><?php echo $this->_params['allProducts'][$key][$key1]['name'].': ';?> </td><td><?php echo $this->_params['allProducts'][$key][$key1]['value'];?></td></tr>
                    <?php endforeach;?>
                    
                    <tr><td class="tdWidth">unit cost: </td><td><?php echo $this->_params['orderitem'][$key]['actualPrice'];?></td></tr>
                    <tr><td class="tdWidth">quantity: </td><td><?php echo $this->_params['orderitem'][$key]['qty'];?></td></tr>
                    <tr><td class="tdWidth">go to product: </td>
                    <td><a href="?c=products&a=theProduct&i=<?php echo $this->_params['product'][$key][0]['id'];?>">here</a></td></tr>
                </table>
                <br><br>
                
                <?php endforeach;?>
                
            </div>
            
        </div>
            