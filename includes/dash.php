<script type="text/javascript">
function printd(a,b,c,d,e,f) {
	window.location.href = 'print.php?first='+a+'&last='+b+'&email='+c+'&phone='+d+'&sex='+e+'&location='+f;
	
}
	
function view(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p) {
	window.location.href = 'view.php?first='+a+'&last='+b+'&email='+c+'&phone='+d+'&sex='+e+'&location='+f+'&qty='+g+'&tid='+h+'&amt='+i+'&status='+j+'&eid='+k+'&ename='+l+'&edate='+m+'&etime='+n+'&evenue='+o+'&file='+p;
}

</script>
<?php
$p_title = 'Dashboard | ChES';
include('includes/config.inc.php');
include('includes/header.html');
require(MYSQL);

if (isset($_SESSION['id'])){
	
	$id=$_SESSION['id'];

	$q = mysqli_query($dbc,"SELECT * FROM users WHERE id='$id'");
	$q2 = mysqli_query($dbc,"SELECT * FROM event_register WHERE u_id='$id' ORDER BY date DESC");
	$q3 = mysqli_query($dbc,"SELECT * FROM siphon_register WHERE u_id='$id' ORDER BY date DESC");
	
	$data=mysqli_fetch_row($q);
	

	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$feed = $_POST['feed'];
		if($query = mysqli_query($dbc,"INSERT INTO fandq (uid, name, email, fandq, date) VALUES ('$data[0]','$name','$email','$feed', NOW())")){
		echo"<script>alert('Your Feedback is submitted successfully. Thanks for your effort.)</script>";
		}
	}
	
	
	echo '<div class="w3-row w3-border" >
  <div class="w3-third w3-container w3-theme" id="img">';
	  
  echo"<img src='$data[11]' style='height: 225px; width: 200px; border-radius:30px; padding: 20px; margin-left: 30px;'>
  </div>
  <div class='w3-third w3-container' style='padding: 25px;' id='img'>
    <p>Name: $data[1] $data[2]</p> 
	 <p>e-Mail: $data[3]</p>
	 <p>Phone: $data[4]</p>
	 <p>DoB: $data[6]</p>
	 <p>Gender: $data[7]</P>
  </div>";
	echo'
  <div class="w3-third w3-container" style="padding: 25px;">
    <p><a href="changedp.php">Change DP</a></p> 
	 <p><a href="change_details.php">Change Details</a></p>
	 <p><a href="change_password.php">Change Password</a></p>
	 <p><a href="#" onclick="printd()">Print</a></p>
	 <p><a href="logout.php">Logout</a></p>
  </div>
</div>';
	?>
<div class="container">
	<ul class="nav nav-tabs">
    <li style="width: 25%;" class="active"><a data-toggle="tab" href="#event" style="color: blue;">Events</a></li>
    <li style="width: 25%;"><a data-toggle="tab" href="#siphon" style="color: black;">Siphon</a></li>
    <li style="width: 25%;"><a data-toggle="tab" href="#feedback" style="color: blue;">Feedback</a></li>
    <li style="width: 25%;"><a data-toggle="tab" href="#query" style="color: black;">Query</a></li>
  </ul>

  <div class="tab-content">
    <div id="event" class="tab-pane fade in active">
			<?php
				while($data2=mysqli_fetch_row($q2)){
					$data4 = mysqli_fetch_row(mysqli_query($dbc,"SELECT * FROM events WHERE id = '$data2[1]'"));
				echo"
           <div class='row'>
				  <div class='col-md-4'><img src='admin-panel/examples/$data4[7]' style='height: 100px; width: 100px;' ></div>
				  <div class='col-md-4'>
				  		<ul class='list-unstyled'>
							<li><h4>$data2[1] $data4[1]</h4><hr></li>
							<li>Date | Time: $data4[2] | $data4[3]</li>
							<li>Venue: $data4[4]</li>
						</ul>
				  </div>
				  <div class='col-md-2'><h4>Status</h4><hr>$data2[7]</div>"; ?>
				  <div class='col-md-2'><h4>View</h4><hr><a class='btn btn-info' href="javascript:view('<?php echo $data[1];?>','<?php echo $data[2];?>','<?php echo $data[3];?>','<?php echo $data[4];?>','<?php echo $data[7];?>','<?php echo $data[11];?>','<?php echo $data2[2];?>','<?php echo $data2[4];?>','<?php echo $data2[3];?>','<?php echo $data2[7];?>','<?php echo $data4[0];?>','<?php echo $data4[1];?>','<?php echo $data4[2];?>','<?php echo $data4[3];?>','<?php echo $data4[4];?>','<?php echo $data4[7];?>')">View/Print</a></div>
				</div><hr><?php
				}
           ?>
		 </div>
    <div id="siphon" class="tab-pane fade">
		 <img src="includes/head.jpg" style="width: 100%;" hidden>
		 <p>Click this button to get the print of your SIPHON tickets. <a type="button" href="javascript:printd('<?php echo $data[1];?>','<?php echo $data[2];?>','<?php echo $data[3];?>','<?php echo $data[4];?>','<?php echo $data[7];?>','<?php echo $data[11];?>')" class="btn btn-info">Print</a></p>
      	<?php
				while($data3=mysqli_fetch_row($q3)){
					$data4 = mysqli_fetch_row(mysqli_query($dbc,"SELECT * FROM siphon WHERE id = '$data3[1]'"));
				echo"
           <div class='row'>
				  <div class='col-md-4'><img src='admin-panel/examples/$data4[7]' style='height: 100px; width: 100px;' ></div>
				  <div class='col-md-3'>
				  		<ul class='list-unstyled'>
							<li><h5>$data3[1] $data4[1]</h5></li>
							<li>Date | Time: $data4[2] | $data4[3]</li>
							<li>Venue: $data4[4]</li>
						</ul>
				  </div>
				  <div class='col-md-3'>
				  		<ul class='list-unstyled'>
							<li><h5>Status: $data3[7]</h5></li>
							<li>Transaction Id: $data3[4]</li>
							<li>Total Bill: $data3[3]</li>
						</ul>
				  </div>
				  <div class='col-md-2'>
				  <ul class='list-unstyled'>
				  		<li><h5>Quantity: $data3[2]</h5></li><br>";
						for($i=0;$i<$data3[2];$i++){
							echo"<input type='checkbox' />&nbsp;";
						}
					echo "</ul></div></div><hr>";
				}  
           ?>
    </div>
    <div id="feedback" class="tab-pane fade">
		 <div class="row">
			 
			 <div class="col-md-4"></div>
			 <div class="col-md-4">
				 <h3>Feedback form...Happy to hear.</h3>
      	<form  name="feedform" action="dash.php" method="post">
			<input type="hidden" name="fform" value="Feed">	
			<div class="form-group">
			
				<label for="id" class="control-label">ID</label>
				<input type="text" name="id"  class="form-control" placeholder="Id" disabled value="<?php echo $data[0]; ?>">
			
			</div>
			<div class="form-group">
				<label for="name" class="control-label">Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $data[1].' '.$data[2]; ?>">
			</div>
			<div class="form-group">
				<label for="email" class="control-label">Email</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $data[3]; ?>">
			</div>
			
			<div class="form-group">
				
				<label for="feedback" class="control-label">Feedback</label>
				<input type="textarea" style="height: 100px;" name="feed" id="feed" class="form-control" placeholder="Enter your opinion here...">
			</div>
			
			<div class="form-group">
			
				<button class="btn btn-success" name="feedback" type="submit" > Send </button>
			</div>
			
		</form>
		</div>
		<div class="col-md-4"></div>
    </div>
	 </div>
    <div id="query" class="tab-pane fade">
     <div class="row">
			 
			 <div class="col-md-4"></div>
			 <div class="col-md-4">
				 <h3>We'll get back to you soon.</h3>
      	<form  name="queryform" action="query.php" method="GET">
			
			<div class="form-group">
			
				<label for="id" class="control-label">ID</label>
				<input type="text" name="id" id="uid" class="form-control" placeholder="id" value="<?php echo $data[0]; ?>" disabled>
			</div>
			<div class="form-group">
				<label for="name" class="control-label">Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $data[1].' '.$data[2]; ?>">
			</div>
			<div class="form-group">
				<label for="email" class="control-label">Email</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $data[3]; ?>">
			</div>
			<div class="form-group">
				<label for="phone" class="control-label">Phone</label>
				<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?php echo $data[4]; ?>">
			</div>
			<div class="form-group">
				
				<label for="query" class="control-label">Query</label>
				<input type="textarea" style="height: 100px;" name="que" id="query" class="form-control" placeholder="Please leave your question here...">
			</div>
			
			<div class="form-group">
			
				<button class="btn btn-success" type="submit" name="query"> Send </button>
			</div>
			
		</form>
		</div>
		<div class="col-md-4"></div>
    </div>
	 </div>
    
  </div>
</div>

<?php
} else {
	echo "Please <a href='login.php'>Login</a>/<a href='register.php'>Register</a> to continue.";
}
include('includes/footer.html');
?>
