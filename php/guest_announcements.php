<!DOCTYPE HTML>
<html>
	<head>
		<title>Malayan Colleges Mindanao</title>
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>#more { display: none;}</style>
	</head>

	<body class="is-preload">

		<!--- READ MORE CODE --->
		<script>
			function myFunction(){
				let dots = document.getElementById("dots");
				let moreText = document.getElementById("more");
				let btnText = document.getElementById("myBtn");
				if (dots.style.display === "none"){
					dots.style.display = "inline";
					btnText.innerHTML = "Read more";
					moreText.style.display = "none";
				}else{
					dots.style.display = "none";
					btnText.innerHTML = "Read less";
					moreText.style.display = "inline";
				}
			}
		</script>

		<header id="header">
			<a class="logo" href="index.html">CCIS</a>
			<nav>
				<a href="#menu">Menu</a>
			</nav>	
		</header>

		<nav id="menu">
			<ul class="links">
				<li><a href="guest_announcements.php">Announcements</a></li>
				<li><a href="guest_gallery.php">Gallery</a></li>
				<li><a href="login_screen.php">Login</a></li>
				<li><a href="guest_about.php">About</a></li>
			</ul>
		</nav>
		
		<section id="banner">
			<div class="inner">
				<h1>College of Computer and Information Science</h1>
				<p>Official Computer Department in Malayan Colleges Mindanao</p>
			</div>
			<video autoplay loop muted playsinline src="images/test.mp4"></video>
		</section>

		<!--- HEADING TITLE --->
		<section class="wrapper2">
			<header class="special">
					<h2>ANNOUNCEMENTS</h2>
			<header>
		</section>

		<!--- MAIN SCREEN OF ANNOUNCEMENTS --->
		<section id="cta" class="wrapper">
			<div class="inner">
				<div class="highlights">

					<!---DATABASE CODE --->
					<?php 
						$conn = new mysqli("localhost", "root", "", "db_ccis");
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql = "SELECT title, topic, imageurl, stat  FROM announcement_tb";
						$result = $conn->query($sql);

						//POSTING PINNED ANNOUNCEMENTS
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if($row['stat'] == 'pinned'){
								echo "<section><div class='content'><h2 align='center'><br>".$row["title"]."<br></h1><p>";
								$string_topic = $row["topic"];
								$string_array = str_split($string_topic);
								$limit = 0;
								foreach ($string_array as $char){
									if ($limit < 130){
										echo $char;
										$limit++;
									}else if ($limit == 130){
										echo $char;
										echo "<span id='dots'>...</span><span id='more'>";
										$limit++;
									}else{
										echo $char;
									}	
								}
								if ($limit > 130){
									echo "</span></p><button onclick='myFunction()' id='myBtn'>Read more</button>";
								}

								if ($row['imageurl'] != 'none'){
									echo"<img class='announce' src='assets/images/announcements/".$row["imageurl"]."'>";
								}
								
								echo "</div></section>";
								}
							}
						} else {
							echo "<h1>NO PINNED ANNOUNCEMENTS</h1>";
						}

						//POSTING ACTIVE ANNOUNCEMENTS
						$sql = "SELECT title, topic, imageurl, stat  FROM announcement_tb";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if($row['stat'] == 'active'){
									echo "<section><div class='content'><h2 align='center'><br>".$row["title"]."<br></h1><p>";
									$string_topic = $row["topic"];
									$string_array = str_split($string_topic);
									$limit = 0;
									foreach ($string_array as $char){
										if ($limit < 130){
											echo $char;
											$limit++;
										}else if ($limit == 130){
											echo $char;
											echo "<span id='dots'>...</span><span id='more'>";
											$limit++;
										}else{
											echo $char;	
										}	
									}
									if ($limit > 130){
										echo "</span></p><button onclick='myFunction()' id='myBtn'>Read more</button>";
									}
									if ($row['imageurl'] != 'none'){
										echo"<img class='announce' src='assets/images/announcements/".$row["imageurl"]."'>";
									}
									echo "</div></section>";
								}
							}
						} else {
							echo "<h1>NO ACTIVE ANNOUNCEMENTS</h1>";
						}
						$conn->close();
					?>

				</div>
			</div>
		</section>

		<!--- FOOTER --->
		<footer id="footer">
			<div class="inner">
				<div class="content">
					<section>
						<h3>Keep in touch with our department</h3>
					</section>
					<section>
						<h4>Follow us on</h4>
						<ul class="plain">
							<li><a href="https://twitter.com/MalayanMindanao?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
							<li><a href="https://www.facebook.com/mcmccis/?hc_ref=ARRrGCjLc1IToVPQt8bLXpx7ktIYRf4ieAAmDuwHv6p8ThsR9PjuFAo_-PAcTJSQZTs&ref=nf_target&__tn__=kC-R"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
						</ul>
					</section>
				</div>
			</div>
		</footer>

		<!--- SCRIPTS --->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>