<html>
<head>
    <h1 align="center">ANNOUNCEMENT PAGE</h1>
</head>
<body>
    <div align="center">
        <?php 


        $conn = new mysqli("localhost", "root", "", "db_ccis");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT title, discussion, imageurl  FROM announcement_tb";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<h1><br>".$row["title"]."<br></h1>";
                echo "<p><br>".$row["discussion"]."<br></p>";
                echo "<img src='images/".$row["imageurl"]."'>";
            }
        } else {
            echo "no announcements";
        }
        $conn->close();
        ?>
        <form action="update_announcement.php" method="post">
            <input value="add" type="submit">
        </form>
        <form action="delete_announcement.php" method="post">
            <input value="delete" type="submit">
        </form>
    </div>
</body>    

</html>