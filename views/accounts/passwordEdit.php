<form action="<?= $_SERVER['PHP_SELF'] . '?a=personalData&c=accounts&j=test2'; ?>" method="POST">
<fieldset>
<legend>change password</legend>
<label for="oldPassword">old password: </label>
<input type="password" name="oldPassword" id="oldPassword"
 value="<?= isset($_POST['firstName']) 
 ? 'your password' : 'your password'?>"/>
<br>
<br>
<label for="newPassword">new password: </label>
<input type="password" name="newPassword" id="newPassword" 
value="<?= isset($_POST['newPassword']) 
 ? 'your password' : 'your password'?>"/>
 <br>
 <label for="newPassword">new password check: </label>
<input type="password" name="newPasswordCheck" id="newPasswordCheck"
value="<?= isset($_POST['newPasswordCheck']) 
 ? 'your password' : 'your password'?>"/>
 <br>

 <input type="submit" value="submit edit" name="submitEditPassword">
</fieldset>
</form>
