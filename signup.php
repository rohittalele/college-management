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
				<h2>Registration</h2>
				<p><?php include('./scripts/signup-script.php'); ?></p>
				<input type="text" name="name" placeholder="Full Name">
				<div style="display: flex;">
					<input type="text" name="year" placeholder="College Year">
					<select name="branch">
						<option>Branch</option>
						<option value="B.Sc">B.Sc</option>
						
					</select>
				</div>
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="pass" placeholder="Password">
				
				<button name="submit">Register</button>
				</form>
			</div>	
	</div>

</body>
</html>