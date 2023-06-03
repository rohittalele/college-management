<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <?php include('./includes/links.php')?>
</head>
<body>
	<div class="main">
		<?php include('./includes/header.php')?>

			<div class="login">
				<form method="POST">
				<h2>Login</h2>
				<p><?php include('./scripts/login-script.php'); ?></p>
				<input type="text" name="email" placeholder="Email">
				<input type="password" name="pass" placeholder="Password">
				<button name="submit">Login</button>
				</form>
			</div>	
	</div>

</body>
</html>