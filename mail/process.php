<?php
// Assuming you are using MySQLi to connect to your MySQL database
$servername = "localhost";
$username = "zenshell";
$password = "zenshell";
$database = "webvuln";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['User']; // Retrieve the value from the input field

// Vulnerable code: directly concatenating user input into the SQL query
$sql2 = "SELECT * FROM users WHERE User = '" . $name . "'";
$sql = "SELECT username FROM credentials WHERE username = '" . $name . "' ";

// Display the query on the web page
echo "Query: " . $sql . "<br><br>";

$result = $conn->query($sql);

// Display the query result on the web page
if ($result && $result->num_rows > 0) {
    echo "Query Result:<br>";
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["User"] . "<br>";
        // Display other fields you want to show
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
