<?php $this->titre = "My Blog - login"; ?>
<p>You have to be logged to access on this page.</p>

<form action="connexion/login" method="post">
    <input name="login" type="text" placeholder="Enter your login" 
    required autofocus>
    <input name="password" type="password" placeholder="Enter your password"
    required>
    <button type="submit">Login</button>
</form>

<?php if (isset($msgError)): ?>
    <p><?php echo $msgError; ?></p>
<?php endif; ?>