<html>
<head>
    <h1 align="center">DELETE ANNOUNCEMENT PAGE</h1>
</head>
<body>
    <div align="center">
        <form action="success-delete.php" method="post">
            
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ccis";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT title, discussion, imageurl  FROM announcements";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo $row['title'];
                    echo '<p class="identifier">
                            <input type="checkbox" name="'.$row['title'].'">
                            '.$row['title'].'</p>';
                }
            } else {
                echo "no announcements";
            }
            $conn->close();
            ?>
            <input value="delete now" type="submit">
        </form>
        <form action="index.php" method="post">
            <input value="back" type="submit">
        </form>
    </div>
</body>    

</html>