<h1>Your personal data</h1>
<div class="personalData">

<div class="fieldset">
<h4 class="h4Top">Personal data: <a href="?c=accounts&a=personalData&j=test">Edit</a></h4>
<table>
    <tr><td class="tdWidth">First name: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
    <tr><td class="tdWidth">Last name:</td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
    <tr><td class="tdWidth">Email: </td><td><?php echo $this->_params['account'][0]['email'];?></td></tr>
    <tr><td class="tdWidth">Phone number: </td><td><?php echo $this->_params['customer'][0]['phoneNumber'];?></td></tr>
    <tr><td class="tdWidth">Date of birth: </td><td><?php echo $this->_params['dateOfBirthInRightOrder'];?></td></tr>
</table>
<hr>


<h4>Address: <a href="?c=accounts&a=personalData&j=test1">Edit</a></h4>
<table>
<tr><td class="tdWidth">Zip: </td><td><?php echo $this->_params['address'][0]['zip'];?></td></tr>
<tr><td class="tdWidth">City</td><td><?php echo $this->_params['address'][0]['city'];?></td></tr>
<tr><td class="tdWidth">Street</td><td><?php echo $this->_params['address'][0]['street'];?></td></tr>
<tr><td class="tdWidth">Country</td><td><?php echo $this->_params['address'][0]['country'];?></td></tr>
</table>
<hr>


<h4>Change password <a href="?c=accounts&a=personalData&j=test2">Edit</a></h4>

</div>
</div>