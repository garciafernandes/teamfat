<form method='post' action="<?php echo DIR;?>utilisateur/modification">
    <label>Mot de passe courant</label><input type='password' name="current_password" placeholder="Votre mot de passe courant" required /><br />
    <label>Mot de passe</label><input type='password' name="password" placeholder="Votre nouveau mot de passe" required /><br />
    <label>Mot de passe</label><input type='password' name="password-again" placeholder="Votre nouveau mot de passe" required /><br />
    <input type="submit" value="Valider" />
</form>