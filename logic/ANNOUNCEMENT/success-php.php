<!DOCTYPE HTML>
<?php
	session_start();
	if (!isset($_SESSION['user'])){
		header('Location: login_screen.php');
	}
?>


<html>
<head>
</head>
<body>
    <div>
    <div>
        <?php 
        $title = $_POST["title"];
        $discussion = $_POST["discussion"];
        $imageurl = "$title.jpg";

        if ($_FILES['image']['size'] == 0){
            echo "no image";
        }else{
            echo "olrayt";
        }
{
    // cover_image is empty (and not an error)
}
        // if (move_uploaded_file($_FILES['image']['tmp_name'], "images/$imageurl") === FALSE){
        //     echo "<p class='logo'>Could not move uploaded file to \"$Dir".htmlentities($_FILES['picture_file']['name'])."\"<br />\n</p>";
        // }
        // else{
        //     echo "<p class='logo'> Successfully uploaded\n</p>";
        // }

        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "ccis";
        // $tablename = "announcements";


        // $conn = new mysqli($servername, $username, $password, $dbname);
        // // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }

        // $sql = "INSERT INTO $tablename (title, discussion, imageurl)
        // VALUES ('$title', '$discussion','$imageurl')";

        // if ($conn->query($sql) === TRUE) {
        //     echo "<p class='details'>ANNOUNCEMENT UPLOADED</p>";
        // } else {
        //     echo "Error: ".$sql."<br>".$conn->error;
        // }
        
        // $conn->close();

  
        ?>
    </form>
    </div>
</body>    

</html>