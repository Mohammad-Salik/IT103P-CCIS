<html>
<head>
    <h1 align="center">CHATROOM</h1>
</head>
<body>
    <div>
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
        $sql = "SELECT id, messages  FROM salik_batenga";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($row["id"] == "salik"){
                    echo "<h1 align='right'><br>". $row["id"]. ": ". $row["messages"]."<br></h1>";
                }else{
                    echo "<h1 align='left'><br>". $row["id"]. ": ". $row["messages"]."<br></h1>";
                }
                
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    <form action="messagesent.php" method="post">
        <p>
            MESSAGE : <input type="text" name="message" required />
            <input type="submit" value="send">
        </p>
    </form>
    </div>
</body>    

</html>