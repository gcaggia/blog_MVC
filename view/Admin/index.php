<?php $this->title = "My Blog - Administration"; ?>

<h2>Administration</h2>

<p>Welcome, <strong><?php echo $login; ?></strong> !</p>

<p>This blog has <strong><?php echo $nbPosts; ?></strong> post(s) and
<strong><?php echo $nbComments; ?></strong> comment(s).</p>

<a id="logoutlink" href="connexion/logout">Logout</a>