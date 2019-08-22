<?php # Script 18.8 - login.php
// This is the login page for the site.
require ('../../includes/config.inc.php'); 
$p_title = 'Login';
include ('../../includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('../../../mysqli_connect.php');
	
	// Validate the email address:
	if (!empty($_POST['email'])) {
		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
	} else {
		$e = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}
	
	// Validate the password:
	if (!empty($_POST['pass'])) {
		$p = mysqli_real_escape_string ($dbc, $_POST['pass']);
	} else {
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}
	
	if ($e && $p) { // If everything's OK.

		// Query the database:
		$q = "SELECT id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p') AND active IS NULL AND role='admin')";		
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (@mysqli_num_rows($r) == 1) { // A match was made.
			
			// Register the values:
			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
			mysqli_free_result($r);
			mysqli_close($dbc);
							
			// Redirect the user:
			$url = (BASE_URL.'admin-panel/examples/dashboard.php'); // Define the URL.
			ob_end_clean(); // Delete the buffer.
			header("Location: $url");
			exit(); // Quit the script.
				
		} else { // No match was made.
			echo "<script>alert('Either the email address and password entered do not match those on file or you have not yet activated your account.');</script>";
		}
		
	} else { // If everything wasn't OK.
		echo '<p class="error">Please try again.</p>';
	}
	
	mysqli_close($dbc);

} // End of SUBMIT conditional.
?>
<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4">
<h1>Login</h1>
<p>Your browser must allow cookies in order to log in. Just simply login...don't worry.</p>

<form class="form-horizontal" id="loginform" action="" method="post">
			<div class="form-group">
			
				<label for="uname" class="control-label">Email</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="Email">
			
			</div>
			<div class="form-group">
				
				<label for="pass" class="control-label">Password</label>
				<input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
			
			</div>
				<a href="forgot_password.php">Forgot password.</a>
			<div class="form-group">
			
				<button class="btn btn-success" type="submit"> Login </button>
			
			</div>
		</form>
</div>
	<div class="col-md-4"></div>
</div>
<?php include ('../../includes/footer.html'); ?>