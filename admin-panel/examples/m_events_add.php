

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../images/logo.png">
  <link rel="icon" type="image/png" href="../../images/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Add Manegerial | Admin
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
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-3.jpg">
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
          <li class="nav-item ">
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
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#">Events</a>
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

include('../../../mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')	{
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$venue = $_POST['venue'];
	$fee = $_POST['fees'];
	$descp = $_POST['descp'];
	$file = $_POST['link'];
	

$query = mysqli_query($dbc, "SELECT id FROM m_events ORDER BY id DESC LIMIT 0,1");
$user_ = mysqli_fetch_row($query);
$user = $user_[0] +1;

$pic=$_FILES["file"]["name"];
$conv=explode(".",$pic);
$ext=$conv['1'];
$url=$user.".".$ext;
if($dbc->connect_errno){
echo $dbc->connect_error;
}

$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = @end(explode(".", $_FILES["file"]["name"]));
if(isset($_POST['save'])){
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		
		if (file_exists("uploads/m_events/" . $_FILES["file"]["name"]))
		{
		unlink("uploads/m_events/" . $_FILES["file"]["name"]);
		}
		else{
			$pic=$_FILES["file"]["name"];
			$conv=explode(".",$pic);
			$ext=$conv['1'];
			move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/m_events/". $user.".".$ext);
//			echo "<br>Stored in as: " . "upload_siphon/".$user.".".$ext;
			$url=$user.".".$ext;
			
			$query2="INSERT INTO m_events(name, date, time, venue, descp, fee, cover, file) VALUES ('$name','$date','$time','$venue','$descp', '$fee', 'uploads/m_events/$url','$file')";
			
			if($dbc->query($query2)){
			echo "<br/>Saved to Database successfully";
			}else {echo $url;}
		 }
	}
}else{
 echo "File Size Limit Crossed 200 KB Use Picture Size less than 200 KB";
}
}
}
?>	  
		<form class="form-horizontal" id="addevent" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<div class="col-sm-4">
				<label for="ename" class="control-label">Event Name</label>
				<input type="text" name="name" id="event" class="form-control" placeholder="Name of event" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">	
				<label for="date" class="control-label">Date of Event</label>
				<input type="text" name="date" id="date" class="form-control" placeholder="Date" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">	
				<label for="time" class="control-label">Time</label>
				<input type="text" name="time" id="time" class="form-control" placeholder="Time as Text" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">	
				<label for="venue" class="control-label">Venue</label>
				<input type="text" name="venue" id="venue" class="form-control" placeholder="Venue" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">	
				<label for="cover" class="control-label">Cover Image</label>
				<input type="file" name="file" id="cover" class="form-control-file" placeholder="Select Cover Image" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">	
				<label for="descp" class="control-label">Small Description</label>
				<input type="text" name="descp" id="descp" class="form-control" placeholder="Description" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">	
				<label for="fee" class="control-label">Fee</label>
				<input type="text" name="fees" id="fees" class="form-control" placeholder="Ex. 20">
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">	
				<label for="link" class="control-label">Details Link</label>
				<input type="text" name="link" id="link" class="form-control" placeholder="G-Drive Link of details">
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-4">
				<button name="save" class="btn btn-success" type="submit"> Save </button>
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