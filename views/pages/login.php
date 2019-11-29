<div class="login">
    

        <form action="<?=$_SERVER['PHP_SELF'].'?p=login';?>" method="post">
            <label for="email">email: </label>
            <input type="text" name="email" id="email" placeholder="your e-mail" required
            <?=isset($_POST['email']) ? 'value="'.htmlspecialchars($_POST['email']).'"' : ''?>> <br>
            
            <label for="loginPassword">passwort: </label>
            <input type="password" name="validationPassword" id="loginPassword" placeholder="your password"
            required> <br>
            
            <input type="submit" name="submitLogin" value="login">

            <br>
            
            <input type="checkbox" name="rememberMe" id="check"
            <?=isset($_POST['rememberMe']) ? 'checked' : ''?>>
            <label for="check">remain signed in?</label>

            <br>
            
            <a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=register">no account yet?</a>
            
            
        </form>

    
</div>

