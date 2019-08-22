<?php
$p_title = 'Change Details';
include('header.html');
if(isset($_SESSION['id'])){
	$user = $_SESSION['id'];
	
	$fn = $_POST['first_name'];
	$ln = $_POST['last_name'];
	$e = $_POST['email'];
	$ph = $_POST['phone'];
	$d = $_POST['dob'];
	$s = $_POST['gender'];
$dbc = mysqli_connect('localhost','root','','quiz');
	$q = "UPDATE users SET first_name='$fn', last_name='$ln', email='$e', DoB='$d', sex='$s', phone='$ph' WHERE id='$user'";
if(mysqli_query($dbc, $q)==true){
	echo'<h3>Successfully Updated :)</h3>';
}else{echo'failed to updated :/';}
}else{echo'You are not logged in';}

include('footer.html');
?>