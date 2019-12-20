
<form action="<?= $_SERVER['PHP_SELF'] . '?a=personalData&c=accounts&j=test'; ?>" method="POST">
<fieldset>
<legend>personal data</legend>
<input type="text" name="firstName" 
 value="<?= isset($_POST['firstName']) 
 ? htmlspecialchars($_POST['firstName']) : $this->_params['customer'][0]['firstName']?>"/>
<br>
<input type="text" name="lastName" 
value="<?= isset($_POST['lastName']) 
 ? htmlspecialchars($_POST['lastName']) : $this->_params['customer'][0]['lastName']?>"/>
 <br>
<input type="text" name="email" 
value="<?= isset($_POST['email']) 
 ? htmlspecialchars($_POST['email']) : $this->_params['account'][0]['email']?>"/>
 <br>
<input type="text" name="phoneNumber" 
value="<?= isset($_POST['phoneNumber']) 
 ? htmlspecialchars($_POST['phoneNumber']) : $this->_params['customer'][0]['phoneNumber']?>"/>
 <br>
 <input type="submit" value="submit edit" name="submitEdit">
</fieldset>
</form>
