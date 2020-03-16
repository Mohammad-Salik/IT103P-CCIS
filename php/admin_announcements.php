<!DOCTYPE HTML>
<?php
	session_start();
	if (!isset($_SESSION['user'])){
		header('Location: login_screen.php');
	}
?>

<html>

	<head>
		<title>Malayan Colleges Mindanao</title>
		<link rel="stylesheet" href="assets/css/main.css" />
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
				<li><a href="community.php">Community</a></li>
				<li><a href="admin_announcements.php">Announcements</a></li>
				<li><a href="admin_gallery.php">Gallery</a></li>
				<li><a href="admin_register.php">Register</a></li>
				<li><a href="admin_about.php">About</a></li>
				<li><a href="admin_logout.php">Logout</a></li>
			</ul>
		</nav>

		<!--- HEADING --->
		<section class="wrapper2">
			<header class="special">
				<h2>ANNOUNCEMENTS</h2>
			<header>
		</section>

		<!--- MAIN AREA FOR ANNOUNCEMENTS --->
		<div class="announcement_menu">
				<form action="add_announcements.php" method="post"><input type="submit" value="NEW ANNOUNCEMENT"></form>
				<form action="delete_announcements.php" method="post"><input type="submit" value="DELETE ANNOUNCEMENT"></form>
				<form action="archive_announcements.php" method="post"><input type="submit" value="RESTORE ARCHIVED"></form>
		</div>

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

		<!--- SCRIPTS --->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>