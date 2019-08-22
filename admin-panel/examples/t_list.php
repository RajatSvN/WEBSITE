<?php
include('../../../mysqli_connect.php');

if(isset($_GET['t_list'])){
	$idr = $_GET['t_list'];
	$query = mysqli_query($dbc,"SELECT * FROM t_register WHERE e_id=$idr ORDER BY date DESC");
	
}



if(isset($_GET['deluser'])){
	if($_GET['deluser']){
		$rid = $_GET['t_list'];
		$id = $_GET['deluser'];
		$del = "UPDATE t_register SET status='Verified' WHERE t_id='$id'";
		if(mysqli_query($dbc,$del)){
	
		header('Location: t_list.php?t_list='.$rid.'&action=verified');
		exit;
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../images/logo.png">
  <link rel="icon" type="image/png" href="../../images/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Technical | Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
	<script language="JavaScript" type="text/javascript">
  function deluser(id, tid)
  {
	  	window.location.href = 't_list.php?t_list='+id+'&deluser=' + tid;
  }
		
	function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('headerTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"event.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
	
  </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white" data-image="../assets/img/sidebar-3.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

            <div class="logo">
        <a href="http://sparsh-svnit.com" class="simple-text logo-normal">
          <img src="../../images/logo.png" style="height: 50px; width: 50px;">
        </a>
      </div>
		  <iframe id="txtArea1" style="display:none"></iframe>
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
          <li class="nav-item active">
            <a class="nav-link" href="./t_events.php">
              <i class="material-icons">event</i>
              <p>Technical</p>
            </a>
          </li>
          <li class="nav-item">
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
                <a class="nav-link" href="#">
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
			  <div class="row">
				  <a href="t_event_add.php"><button class="btn btn-info">Add Event</button></a>
				  <button id="btnExport" onclick="fnExcelReport()" class="btn btn-success">Export</button>
			  </div>
			 <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Users</h4>
                  <p class="card-category"> List of all the registered users.</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="headerTable" class="table">
                      <thead class=" text-primary">
                        <th>
                          User ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
								 <th>
                          Phone
                        </th>
								 <th>
                          Quantity
                        </th>
                        <th>
                          Amount
                        </th>
                        <th>
                          Trans.id
                        </th>
								 <th>
									Timestamp
								 </th>
								 <th>
									 Status
								 </th>
								 <th>
									 Verification
								 </th>
                      </thead>
                      <tbody>
							<?php 
								
							while($data = mysqli_fetch_row($query)){
								
								$query2 = mysqli_query($dbc,"SELECT * FROM users WHERE id=$data[0]");
								$data2 = mysqli_fetch_row($query2);
								
								echo "<tr>";
								echo "<td>";
								echo $data[0];
								echo "</td>";
		
								echo "<td>";
								echo $data2[1];
								echo "</td>";

								echo "<td>";
								echo $data2[2];
								echo "</td>";
								
								echo "<td>";
								echo $data2[3];
								echo "</td>";
								
								echo "<td>";
								echo $data[3];
								echo "</td>";
								
								echo "<td>";
								echo $data[4];
								echo "</td>";
								
								echo "<td>";
								echo $data[5];
								echo "</td>";
								
								echo "<td>";
								echo $data[6];
								echo "</td>";
								
								echo "<td>";
								echo $data[7];
								echo "</td>";
								
								echo "<td>";
								 
								 if($data[8]=="Pending") {?>
							
								<a class="btn btn-success" href="javascript:deluser('<?php echo $data[1];?>','<?php echo $data[5];?>')">Verified</a>
								<?php
									}
								echo "</td>";
								echo "</tr>";
								}?>
							
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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