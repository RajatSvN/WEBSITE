

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../images/logo.png">
  <link rel="icon" type="image/png" href="../../images/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Add User | Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-3.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://sparsh-svnit.com" class="simple-text logo-normal">
          <img src="../../images/logo.png" style="height: 50px; width: 50px;">
        </a>
      </div>
           <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./users.php">
              <i class="material-icons">people</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./t_events.php">
              <i class="material-icons">event</i>
              <p>Technical</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./m_events.php">
              <i class="material-icons">event</i>
              <p>Manegerial</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./w_events.php">
              <i class="material-icons">event</i>
              <p>Workshops</p>
            </a>
          </li>
          
          </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Add User</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
  <!--          <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
-->
              <li class="nav-item">
                <a class="nav-link" href="http://ches.in">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
		<?php
include('../../includes/config.inc.php');
include('../../../mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	// Assume invalid values:
	$fn = $e = $p = $b = $s = FALSE;
	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['name'])) {
		$fn = mysqli_real_escape_string ($dbc, $trimmed['name']);
	} else {
		echo '<p class="error">Please enter your name! It should only contain  letters, apostrophe, space, dash and length between 2-20.</p>';
	}

	// Check for a last name:
	
	
	// Check for an email address:
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($dbc, $trimmed['email']);
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}
	//Check for DOB
	if (isset($_POST['phone'])){
		$b = $_POST['phone'];
	}
	
	//Check for Sex
	if (isset($_POST['inst'])){
		$s = $_POST['inst'];
	}
	
	
	// Check for a password and match against the confirmed password:
	if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
		if ($trimmed['password1'] == $trimmed['password2']) {
			$p = mysqli_real_escape_string ($dbc, $trimmed['password1']);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password! It should only contain  letters, numbers, underscore and length between 4-20.</p>';
	}
	
	if ($fn && $e && $p && $b && $s) { // If everything's OK...

		// Make sure the email address is available:
		$q = "SELECT id FROM users WHERE email='$e'";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 0) { // Available.

			// Create the activation code:
			

			// Add the user to the database:
			$q = "INSERT INTO users (email, pass, name, active, reg_date, phone, institute) VALUES ('$e', SHA1('$p'), '$fn', '', NOW(), '$b', '$s')";
			
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
				
				echo "Thank you for registering at Sparsh.\n\n";
			}
				else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
			
		} else { // The email address is not available.
			echo '<p class="error">That email address has already been registered. If you have forgotten your password, <a href="http://sparsh-svnit.com/includes/forgot_password.php">Click here.</a></p>';
		}
		
		}else { // If one of the data tests failed.
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);
	}
// End of the main Submit conditional.
?>	  
		<form class="form-horizontal" id="signupform" action="" method='post'>
			<div class="form-group">
				<div class="col-sm-6">
					<label for="fname" class="control-label">User Name</label>
					<input class="form-control input-sm" name="name" id="name" placeholder="Full Name" value="<?php if (isset($trimmed['name'])) echo $trimmed['name']; ?>" required>
				</div>
			</div>
			<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label" for="phone">Phone Number </label>
				<input type="text" name="phone" id="phone" class="form-control input-sm"  required />
			</div>
			<div class="col-sm-6">
				<label for="gender" class="control-label">Institute Name</label>
				<input type="text" name="inst" id="inst" class="form-control input-sm"  required />
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-sm-12">
				<label for="email" class="control-label">Email ID</label>
				<input type="email" name="email" id="email" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" class="form-control input-sm" placeholder="Email" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
				<label for="pass" class="control-label">Password</label>
				<input type="password" name="password1" id="password1" class="form-control input-sm" placeholder="Password" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">	
				<label for="passconf" class="control-label">Password Confirm</label>
				<input type="password" name="password2" id="password2" class="form-control input-sm" placeholder="Password Confirm" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>" required>
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-sm-12">	
				<button name="save" class="btn btn-success btn-sm" type="submit">Save</button>
			</div>
			</div>
	</form>
			  
			</div>
        </div>
      </div>
      <footer class="footer">
<!--
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
-->
      </footer>
    </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>