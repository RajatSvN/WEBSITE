<?php

$p_title = "Change Details";
include('includes/header.html');
if(isset($_SESSION['id'])){
	$user = $_SESSION['id'];
	$dbc = mysqli_connect('localhost','root','','quiz');
	$q = mysqli_query($dbc,"SELECT * from users WHERE id=$user");
	$row = mysqli_fetch_array($q);
	}else{echo'You are not logged in';}
	
?>

<div class="row"><div class="col-md-6">
	<h3>Edit details..</h3>

<form class="form-horizontal" action="includes/change.php" method="post">
			<div class="form-group">
				<div class="col-sm-6">
					<label for="fname" class="control-label">First Name</label>
					<input class="form-control input-sm" name="first_name" id="fname" value="<?php echo $row['first_name']; ?>" required>
				</div>
				<div class="col-sm-6">
					<label for="lname" class="control-label">Last Name</label>
					<input class="form-control input-sm" name="last_name" id="lname" value="<?php echo $row['last_name']; ?>" required>
				</div>
			</div>
			<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label" for="dob">Date of Birth </label>
				<input type="date" name="dob" id="dob" class="form-control input-sm" editable='false' value="<?php echo $row['dob']; ?>" required>
			</div>
			<div class="col-sm-6">
				<label for="gender" class="control-label">Gender</label>
				<div class="radio">
					<label><input type="radio" name="gender" id="gender" value="M" checked="checked" /> Male </label>
					<label><input type="radio" name="gender" id="gender" value="F"/> Female</label>
				</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-sm-12">
				<label for="email" class="control-label">Email ID</label>
				<input type="email" name="email" id="email" class="form-control input-sm" value="<?php echo $row['email']; ?>" required>
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-sm-12">
				<label for="email" class="control-label">Phone</label>
				<input type="number" name="phone" id="phone" class="form-control input-sm" value="<?php echo $row['phone']; ?>" required>
			</div>
			</div>

			<div class="form-group">
			<div class="col-sm-12">	
				<button class="btn btn-success btn-sm" type="submit">Submit</button>
			</div>
			</div>
	</form>
		</div></div>
	<?php
		include('includes/footer.html');

?>