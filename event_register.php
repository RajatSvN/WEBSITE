<?php
$p_title = "Registration-Events | ChES";
include('includes/header.html');
include('../mysqli_connect.php');
require('includes/config.inc.php');



if (isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	$query = mysqli_query($dbc,"SELECT * FROM users where id = $id");
	
	$row1 = mysqli_fetch_row($query);
	if(isset($_GET['deluser'])){
		$ide = $_GET['deluser'];
		
		$query2 = mysqli_query($dbc,"SELECT * FROM events WHERE id = $ide");
		$row2 = mysqli_fetch_row($query2);
	}
	
}else{  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	
	// Assume invalid values:
	$uid = $eid = $qty = $amt = $tid = $ph = FALSE;
	// Check for a id:
	$uid = $row1[0];
	$eid = $row2[0];
	$qty = $_POST['qty'];
	$amt = $_POST['total'];
	$tid = $_POST['tid'];
	$ph = $row1[4];
	$email = $row1[3];
	

	$query3 = mysqli_query($dbc,"SELECT * FROM event_register WHERE t_id = '$tid'");
	$row3 = mysqli_num_rows($query3);
	
	if($row3 == 0){


			// Add the user to the database:
			$q = "INSERT INTO event_register (u_id, e_id, qty, amt, t_id, phone, date) VALUES ('$uid', '$eid', '$qty', '$amt', '$tid', '$ph', NOW())";
			
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
				
				// Send the email:
				$body = "Thank you for registering to $row2[1]. See you soon\n Date | Time: $row2[2] | $row2[3]\n Venue: $row2[4] \n Total Bill: $amt \n For any query please contact: 7016641699\n";
				
				$mail = mail($email, 'Registration Successful', $body, 'From: Ajayrajpurohit1@hotmail.com');
				if($mail == TRUE){
                   
				echo'<script type="text/javascript">';      
				echo 'alert("Thank you for registering! A confirmation email has been sent to your email address. If you don\'t see mail check in your SPAM box.")';
					echo'</script>';
				header('Location: http://ches.in');
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				echo '<script type="text/javascript">';
				echo 'alert("You will not recieve confirmation email so please check your DASHBOARD or contact 7016641699 to verify your registeration.")';
				echo '</script>';
			}
			
		} else { // The email address is not available.
			echo '<p class="error">That email address has already been registered. If you have forgotten your password, <a href="http://ches.in/forgot_password.php">Click here.</a></p>';
		}
		
		}else {
		echo '<script type="text/javascript">';
		echo 'alert("This Transaction Id is already registered in system. Make call to report any error.")';
		echo '</script>';
	}
}


	mysqli_close($dbc);
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap MultiStep Form</title>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

      <link rel="stylesheet" href="multi/css/style.css">

	<script>
		$(document).ready(function(){
			$("#calc").hover(function(){
			var x = "<?php echo $row2['6'];?>";
			var y = $('#qty1').val();
			var z = x*y;
			$("#amt").val(z);
			$("#total").val("Total Bill to Pay: "+z);
	});
});
	</script>
	
</head>

<body>

  <!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
		 <?php
		 if(isset($_SESSION['id'])){
			 
		 echo"
        <form id='msform' method='post' action=''>
            <!-- progressbar -->
            <ul id='progressbar'>
                <li class='active'>Personal Info.</li>
                <li>Event Details</li>
                <li>Checkout</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class='fs-title'>Personal Details</h2>
                <h3 class='fs-subtitle'>Verify your Details</h3>
					 <input type='text' name='id' placeholder='ID' value='$row1[0]' hidden />
                <input type='text' name='fullname' placeholder='Name'  value='$row1[1] $row1[2]' required/>
                <input type='text' name='email' placeholder='Email' value='$row1[3]' required />
                <input type='text' name='dob' placeholder='DOB' value='$row1[6]' required/>
					 <input type='text' name='phone' placeholder='Phone number' value='$row1[4]' required/>
                <input type='button' name='next' class='next action-button' value='Next'/>
            </fieldset>
            <fieldset>
                <h2 class='fs-title'>Event Information</h2>
                <h3 class='fs-subtitle'>Your presence is highly rewarding</h3>
                <input type='text' name='ename' placeholder='Name' value='Name: $row2[1]' disabled/>
                <input type='textarea' name='desp' placeholder='Description' value='$row2[5]' disabled/>
                <input type='text' name='date' placeholder='Date and Time' value='Date & Time: $row2[2] | $row2[3]' disabled/>
					 <input type='text' name='venue' placeholder='venue' value='Venue: $row2[4]' disabled />
					 <input type='text' name='fee' placeholder='fee' value='Fee: $row2[6]' disabled />
					 <input type='number' name='qty' id='qty1' placeholder='Please mention quantity of tickets you want. Ex. 2' value='' required/>
                <input type='button' name='previous' class='previous action-button-previous' value='Previous'/>
                <input id='calc' type='button' name='next' class='next action-button' onclick='calc()' value='Next'/>
            </fieldset>
            <fieldset>
                <h2 class='fs-title'>Payment Details</h2>
                <h3 class='fs-subtitle'>Have a Great Day!!</h3>
                <img src='includes/ches.jpg' height='200px' width='200px'>
                <input type='text' name='pphone' placeholder='phone' value='PayTM: 7016641699' disabled/>
                <input id='total' type='text' name='amt' placeholder='Total' disabled/>
					 <input id='amt' type='text' name='total' placeholder='Total' hidden/>
					 <input type='text' name='tid' placeholder='Please enter your transaction id to Confirm your booking' required/>
                <input type='button' name='previous' class='previous action-button-previous' value='Previous'/>
                <input type='submit' name='submit' class='action-button' value='Submit'/>
            </fieldset>
        </form>";}
		 		else {
					echo"<p>Please <a href='login.php'>Login</a> or <a href='register.php'>Register</a> to proceed event registeration.</p>";
				}
			  ?>
        <!-- link to designify.me code snippets -->
        <div class="dme_link">
            
        </div>
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

  

    <script  src="multi/js/index.js"></script>




</body>

</html>


<?php include('includes/footer.html'); ?>
