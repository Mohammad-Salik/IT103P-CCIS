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
                    <h2>GALLERY PAGE</h2>
                <header>
            </section>

			<div class="announcement_menu">
				<form action="add_gallery.php" method="post"><input type="submit" value="ADD ALBUM"></form>
				<form action="delete_gallery.php" method="post"><input type="submit" value="DELETE ALBUM"></form>
				<form action="archive_albums.php" method="post"><input type="submit" value="ARCHIVES"></form>
			</div>

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
								"<div class='box-small'>
								<h1>".$row['title']."</h1>
								<form align='center' action='add_image.php' method='post' enctype='multipart/form-data'>
								IMAGE TO THIS ALBUM: 
								<input type='file' name='upload_image' required/ >
								<input type='hidden' name='albumdir' value='".$row['directory']."'>
								<input type='submit' value='ADD'>
								</form><p>";
								
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

			<!-- SCRIPTS -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>