<?php

// Database configuration
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to mark attendance for a student
function markAttendance($studentId, $date, $status) {
    global $conn;

    $sql = "INSERT INTO attendance (student_id, date, status)
            VALUES ('$studentId', '$date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Attendance marked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Example usage: Mark attendance for a student
$studentId = 1;           // Replace with the actual student ID
$date = date('Y-m-d');    // Current date
$status = "present";      // Replace with the actual attendance status

markAttendance($studentId, $date, $status);

// Close the database connection
$conn->close();

?>
