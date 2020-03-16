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
		
		<header id="header">
			<a class="logo" href="index.html">CCIS</a>
			<nav>
				<a href="#menu">Menu</a>
			</nav>	
		</header>
		
		<!-- MENU BAR -->
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
            <section class="wrapper2">
                <header class="special">
                    <h2>REGISTRATION PAGE</h2>
                <header>
			</section>
		<section id="banner">
			<div class="inner">
				<h1>College of Computer and Information Science</h1>
				<p>Official Computer Department in Malayan Colleges Mindanao</p>
			</div>
			<video autoplay loop muted playsinline src="images/test.mp4"></video>
		</section>
			<section id="main" class="wrapper">
				<div class="inner">
					<h3>add members of the website like president website manager n stuffs</h3>
				</div>
			</section>

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

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>