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
                    <h2>NEW ANNOUNCEMENT</h2>
                <header>
            </section>
        
            <div class="announcement_menu">
                <button onclick="window.location.href = 'admin_announcements.php';">BACK</button>
		    </div>

			<!-- MAIN AREA FOR ADDING ANNOUNCEMENT -->
			<section class="wrapper">
                <div class="box-shadow">
                    <form action='add_announcements_success.php' method='POST' enctype='multipart/form-data'>
                        <p>
                            POST ID :  
                            <input type="text" name="postID" required />
                        </p>
                        <p>
                            TITLE/SUJBECT :  
                            <input type="text" name="title" required />
                        </p>
                        <p>
                            DESCRIPTION :  
                            <input type="text" name="topic" required />
                        </p>
                        <p>
                            DATE: 
                            <input type="date" name="date" required />
                        </p>
                        <p>
                            IMAGE (OPTIONAL) : <input type='file' name='image'>
                        </p>
                        <p>
                            STATUS
                            <select name="status">
                                <option name="active" value="active">
                                    'ACTIVE'
                                </option>
                                <option name="pinned" value="pinned">
                                    'PINNED'
                                </option>
                                <option name="archived" value='archived'>
                                    'ARCHIVE'
                                </option>
                            </select>
                        </p>
                        <?php
                            echo"<input class='button 'type='submit' value='post'></form>";
                        ?>
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