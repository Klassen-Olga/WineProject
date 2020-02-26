<h1>your personal data</h1>
<div class="personalData">

<div class="fieldset">
<h4 class="h4Top">personal data: <a href="?c=accounts&a=personalData&j=test">edit</a></h4>
<table>
    <tr><td class="tdWidth">firstname: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
    <tr><td class="tdWidth">lastname:</td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
    <tr><td class="tdWidth">email: </td><td><?php echo $this->_params['account'][0]['email'];?></td></tr>
    <tr><td class="tdWidth">phone number: </td><td><?php echo $this->_params['customer'][0]['phoneNumber'];?></td></tr>
    <tr><td class="tdWidth">date of birth: </td><td><?php echo $this->_params['dateOfBirthInRightOrder'];?></td></tr>
</table>
<hr>


<h4>address: <a href="?c=accounts&a=personalData&j=test1">edit</a></h4>
<table>
<tr><td class="tdWidth">zip: </td><td><?php echo $this->_params['address'][0]['zip'];?></td></tr>
<tr><td class="tdWidth">city</td><td><?php echo $this->_params['address'][0]['city'];?></td></tr>
<tr><td class="tdWidth">street</td><td><?php echo $this->_params['address'][0]['street'];?></td></tr>
<tr><td class="tdWidth">country</td><td><?php echo $this->_params['address'][0]['country'];?></td></tr>
</table>
<hr>


<h4>change password <a href="?c=accounts&a=personalData&j=test2">edit</a></h4>

</div>
</div>