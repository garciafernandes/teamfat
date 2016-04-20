<form method='post' action="<?php echo DIR;?>utilisateur/login">
    <label>Login</label><input type='text' name="login" placeholder="Votre login" required /><br />
    <label>Mot de passe</label><input type='password' name="password" placeholder="Votre mot de passe" required /><br />
    <label>Rester connecté</label><input type='checkbox' name="remember"/><br />
    <input type="submit" value="Valider" />
</form>