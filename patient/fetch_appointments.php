<?php
// Include database connection
include('../connection.php');

// Get the logged-in patient's ID (you can modify this based on how you handle user authentication)
$patient_id = $_SESSION['patient_id']; // Assuming you store the patient's ID in session

// Fetch the patient's appointments sorted by creation time
$query = "SELECT * FROM appointments WHERE patient_id = '$patient_id' ORDER BY created_at ASC";
$result = mysqli_query($conn, $query);

// Check if any appointments are found
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Your Appointments (FCFS Order)</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "Appointment ID: " . $row['id'] . "<br>";
        echo "Doctor Name: " . $row['doctor_name'] . "<br>";
        echo "Scheduled Time: " . $row['scheduled_time'] . "<br>";
        echo "Created At: " . $row['created_at'] . "<br>";
        echo "<hr>";
        echo "</div>";
    }
} else {
    echo "You have no appointments scheduled.";
}

// Close the database connection
mysqli_close($conn);
?>
