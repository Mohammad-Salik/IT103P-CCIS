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
                    <h2>ADD IMAGE</h2>
                <header>
            </section>



			<section class="wrapper">
                <div class="box-shadow">
                <?php 
                    $author = $_SESSION['user'];
                    $filesize = $_FILES["upload_image"]["size"];
                    $Dir = $_POST['albumdir'];
                    if (move_uploaded_file($_FILES['upload_image']['tmp_name'], "assets/images/$Dir/".$_FILES['upload_image']['name']."") === FALSE){
                        echo "<p class='logo'>Could not move uploaded file".htmlentities($_FILES['upload_image']['name'])."\"<br />\n</p>";
                    }
                    echo 
                    "<h1> IMAGE HAS BEEN ADDED TO ALBUM</h1>
                    <form action='admin_gallery.php' method='POST'>
                    <p><input type='submit' value='OK'></p>
                    </form>";
                    ?>
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

