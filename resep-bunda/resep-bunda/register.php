<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="register-check.php" method="post">
     	<h2>REGISTER</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

         <label>Re-enter password</label>
     	<input type="Your Password" name="repassword" placeholder="Re-enter password"><br>

     	<button type="submit">REGISTER</button>
         <a href="login.php" class="regis">Have an account? Log in now!</a>
     </form>
</body>
</html>