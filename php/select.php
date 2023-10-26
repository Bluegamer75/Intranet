<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Unicenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SELECT query
$query = "SELECT * FROM users";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . ", username: " . $row["username"] . ", password: " . $row["password"] . ", company: " . $row["company"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>

