<!DOCTYPE HTML>
<html>
	<head>
		<title>Malayan Colleges Mindanao</title>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

			<header id="header">
				<a class="logo" href="index.html">CCIS</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>	
			</header>

			<!-- MENU BAR -->
			<nav id="menu">
				<ul class="links">
					<li><a href="guest_announcements.php">Announcements</a></li>
					<li><a href="guest_gallery.php">Gallery</a></li>
					<li><a href="login_screen.php">Login</a></li>
					<li><a href="guest_about.php">About</a></li>
				</ul>
			</nav>

			<!-- HEADING -->
			<section id="banner">
				<div class="inner">
					<p>Official Computer Department in Malayan Colleges Mindanao</p>
					<h1>GALLERY PAGE</h1>
				</div>
				<video autoplay loop muted playsinline src="images/test.mp4"></video>
			</section>


			<!-- MAIN GALLERY AREA -->
			<section class="wrapper">

				<!-- DATABASE CODE -->
				<?php
					$conn = new mysqli("localhost", "root", "", "db_ccis");
					if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
					$sql = "SELECT title, directory, stat FROM albums_tb";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {

							if ($row['stat'] != 'archived'){
								echo 
								"<div class='box-small'><h1>".$row['title']."</h1><p>";
								
								$Dir = "assets/images/".$row['directory']."/";
								if ($dh = opendir($Dir)){
									while (($CurFile = readdir($dh)) !== false){
										if ((strcmp($CurFile, '.') != 0) && (strcmp($CurFile, '..') != 0))
										echo 
										"<a href='".$Dir."/$CurFile' download='download.jpg'>
										<img class='gallery' src='".$Dir."/$CurFile'><br/>
										</a>";
										}
								closedir($dh);
									}
								echo 
								"</div>";	
							}
							
						}
					}
					$conn->close();
				?>
			</section>

			<!-- FOOTER -->
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

			<!-- SCRIPTS -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>