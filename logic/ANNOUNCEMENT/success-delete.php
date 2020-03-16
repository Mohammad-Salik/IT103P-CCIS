<html>
<head>
</head>
<body>
    <div>
    <div>
        <?php 


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ccis";
        $tablename = "announcements";


        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT title, discussion, imageurl  FROM announcements";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if (isset($_POST[$row['title']])){
                    echo"must delete ".$row['title']."now <br>";
                }
            }
        }

        $conn->close();

        ?>
    </form>
    </div>
</body>    

</html>