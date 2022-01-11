<?php require_once 'procesos/Login/login.php' ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/master.css">
<div class="container">
	<div class="row">
		<div class="login">
  <div class="login-triangle"></div>

  <h2 class="login-header">Log in</h2>
  <form class="login-container" method="post" action="">
    <p><input name="username" type="text" placeholder="Usuario"></p>
    <p><input name="password" type="password" placeholder="Contraseña"></p>
    <p><input type="submit" value="Log in"></p>
    <p><?php echo isset($login) ? $login : ''; ?></p>
  </form>
</div>>
	</div>
</div>
