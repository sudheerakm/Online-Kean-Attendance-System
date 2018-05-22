<!DOCTYPE html>
<html>
<body>

<?php
$host = "imc.kean.edu";
$user = "geethakd";
$password = "1028263";
$dbname = "2017F_sivaramh";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["Course_id"]. " - Name: ". $row["Cid"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>