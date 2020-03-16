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
        <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="form.css" type="text/css">
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

            <div class="body-content">
				<div class="box-shadow">
						<?php
							$conn = new mysqli("localhost", "root", "", "db_ccis");
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							$sql = "SELECT email, position FROM accounts_tb";
							$result = $conn->query($sql);
							$authorize = false;
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									if ($row['email'] == $_SESSION['user']){
										if ($row['position'] == 'admin'){
											$authorize = true;
										}
									}
								}
							}	

							if ($authorize == true){
								echo
								'<h1 align="center">ADD ACCOUNT</h1>
								 <form action="admin_register_success.php" method="POST" enctype="multipart/form-data">
								<p>
									ID NUMBER :
									<input type="text" name="postID" required />
								</p>
								<p>
									FIRST NAME :  
									<input type="text" name="fname" required />
								</p>
								<p>
									MIDDLE NAME :  
									<input type="text" name="mname" required />
								</p>
								<p>
									LAST NAME :  
									<input type="text" name="lname" required />
								</p>
								<p>
									MCM EMAIL :  
									<input type="email" name="email" required />
								</p>
								<p>
									PASSWORD :  
									<input type="password" name="pass" required />
								</p>
								<p>
									OCCUPATION :
									<select name="occupation">
										<option name="student" value="student">
											STUDENT
										</option>
										<option name="faculty" value="faculty">
											FACULTY
										</option>
									</select>
								</p>
								<p>
									POSITION :
									<select name="position">
										<option name="admin" value="admin">
											ADMIN
										</option>
										<option name="student" value="student">
											STUDENT
										</option>
									</select>
								</p>
								<p>
									IMAGE: <input type="file" name="image" required />
								</p>';
								echo"<input class='button 'type='submit' value='post'></form>";
							}else{
								echo "<h1 align='center'>YOU ARE NOT AUTHORIZED TO CREATE AN ACCOUNT</h1>
									  <p>Please contact faculty or administrators to register</p>";
							}
						?>
                </div>
            </div>

		    <!---- Scripts --->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>