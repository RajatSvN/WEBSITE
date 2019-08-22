
<?php
$p_title="Profile Photo";
error_reporting(0);
include('includes/header.html');
$user=$_SESSION['id']; //you can fetch username here
$db= mysqli_connect('localhost','root','','quiz');

$pic=$_FILES["file"]["name"];
$conv=explode(".",$pic);
$ext=$conv['1'];
$url=$user.".".$ext;
if($db->connect_errno){
echo $db->connect_error;
}
$pull="select * from users  where id='$user'";
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = @end(explode(".", $_FILES["file"]["name"]));
if(isset($_POST['pupload'])){
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
		
		echo "Uploaded Successully";
		echo '</div>';echo"<br/><b><u>Image Details</u></b><br/>";

		echo "Name: " . $_FILES["file"]["name"] . "<br/>";
		echo "Type: " . $_FILES["file"]["type"] . "<br/>";
		echo "Size: " . ceil(($_FILES["file"]["size"] / 1024)) . " KB";

		if (file_exists("uploads/" . $_FILES["file"]["name"]))
		{
		unlink("uploads/" . $_FILES["file"]["name"]);
		}
		else{
			$pic=$_FILES["file"]["name"];
			$conv=explode(".",$pic);
			$ext=$conv['1'];
			move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/". $user.".".$ext);
//			echo "<br>Stored in as: " . "uploads/".$user.".".$ext;
			$url=$user.".".$ext;
			
			$query="update users set pic='uploads/$url' where id='$user'";
			
			if($db->query($query)){
			echo "<br/>Saved to Database successfully";
			}else {echo'Failed';}
		 }
	}
}else{
 echo "File Size Limit Crossed 200 KB Use Picture Size less than 200 KB";
}
}

?>
<form action="" method="post" enctype="multipart/form-data">
<?php
	
$res=$db->query($pull);
$pics=$res->fetch_assoc();
echo '<div class="imgLow">';
echo "<img src='uploads/$url' alt='' width='80 height='64'   class='doubleborder'/></div>";
?>
<input type="file" name="file" />
<input type="submit" name="pupload" class="button" value="Change"/>
</form>
<?php
include('includes/footer.html');
?>