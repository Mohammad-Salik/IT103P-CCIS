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
                    <h2>NEW ALBUM</h2>
                <header>
            </section>

            <div class="announcement_menu">
			  <button onclick="window.location.href = 'admin_gallery.php';">BACK</button>
		    </div>

			<!-- MAIN ADD AREA -->
			<section class="wrapper">
                <div class="box-shadow">
                <h1 align="center">ADD ALBUM</h1>
                    <form action='add_gallery_success.php' method='POST'>
                        <p>
                            ALBUM DB CODE :  
                            <input type="text" name="ablum_code" required />
                        </p>
                        <p>
                            ALBUM TITLE :  
                            <input type="text" name="ablum_title" required />
                        </p>
                        <p>
                            ALBUM NAME :  
                            <input type="text" name="ablum_name" required />
                        </p>
                        <input class='button 'type='submit' value='post'></form>";
                    </form>
                </div>
			</section>

			<!-- SCRIPTS -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>