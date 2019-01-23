<!DOCTYPE html>
<html lang="en">

<head>
	<title>Gallery | Sparsh</title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <style>
	
.flexbox {
  display: -webkit-flex;
  display: inline-flex;
  -webkit-flex-direction: column;
  flex-direction: column;
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
  height: 430vw;
	
}
.flexbox:hover img {
  opacity: 0.28;
}
.flexbox .item {
	padding: 2px;
  position: static;
  width: 33.33%;
}
.flexbox .item img {
  width: 100%;
  display: block;
  transition: all .8s;
}
.flexbox .item .title {
  display: none;
}
.flexbox .item:hover img {
  opacity: 1;
	transform: scale(1.25);
}

@media (max-width: 860px) {
  .flexbox {
    height: 220vw;
  }
  .flexbox .item {
    width: 50%;
  }
}
@media (max-width: 667px) {
  .flexbox {
    height: auto;
  }
  .flexbox .item {
    width: 100%;
  }
}

		 
/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 50%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}
		.video {
			width:100%;
			padding-bottom: 10px;
			height: 250px;
}
	</style>

	

	
   
		<row>
			<div class="col-md-3"></div>
				<div class="col-md-6">
					
					<button type="button" class="tablink" onclick="openPage('photos', this, 'black')" id="defaultOpen" hidden></button>
			</div>
				<div class="col-md-3"></div>
			</row>
			<div id="photos" class="tabcontent">
				<div class="flexbox">
					<div class="item">
					 <img src="images/sparsh/1.jpg" />
					 <p class="title">1st item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/2.jpg" />
					 <p class="title">2nd item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/3.jpg" />
					 <p class="title">3rd item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/4.jpg" />
					 <p class="title">4th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/5.jpg" />
					 <p class="title">5th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/6.jpg" />
					 <p class="title">6th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/7.jpg" />
					 <p class="title">7th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/8.jpg" />
					 <p class="title">8th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/9.jpg" />
					 <p class="title">9th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/10.jpg" />
					 <p class="title">10th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/11.jpg" />
					 <p class="title">11th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/12.jpg" />
					 <p class="title">12th item</p>
				  </div>
				  <div class="item">
					 <img src="images/sparsh/13.jpg" />
					 <p class="title">13th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/14.jpg" />
					 <p class="title">14th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/15.jpg" />
					 <p class="title">15th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/16.jpg" />
					 <p class="title">16th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/17.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/18.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/19.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/20.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/21.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/22.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/23.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/24.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/25.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/26.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/27.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/28.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/29.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/30.jpg" />
					 <p class="title">17th item</p>
				  </div><div class="item">
					 <img src="images/sparsh/31.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/32.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/33.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/34.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/35.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/36.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/37.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/38.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/39.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/40.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/41.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/42.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/43.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/44.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/45.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/46.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/47.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/48.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/49.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/50.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/51.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/52.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/53.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/54.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/55.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/56.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/57.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/58.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/59.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/60.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/61.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/62.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/63.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/64.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/65.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/66.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/67.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/68.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/69.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/70.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/71.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/72.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/73.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/74.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/75.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/76.jpg" />
					 <p class="title">17th item</p>
				  </div>
					<div class="item">
					 <img src="images/sparsh/77.jpg" />
					 <p class="title">17th item</p>
				  </div>
					
				</div>
        </div>





<script>       
         function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
     </script>
     <!-- Resource jQuery -->

</body>


</html>
