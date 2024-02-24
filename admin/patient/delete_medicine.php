<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "zia"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if medicine_id and patient_id are received via POST request
if (isset($_POST['medicine_id']) && isset($_POST['patient_id'])) {
    // Escape received parameters for security
    $medicine_id = $conn->real_escape_string($_POST['medicine_id']);
    $patient_id = $conn->real_escape_string($_POST['patient_id']);

    // Query to delete medicine record from the database
    $delete_sql = "DELETE FROM medicine_information WHERE id = '$medicine_id'";

    if ($conn->query($delete_sql) === TRUE) {
        // Redirect back to the view_patient.php page after successful deletion
        header("Location: view_patient.php?id=" . $patient_id);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No medicine ID or patient ID provided.";
}

// Close connection
$conn->close();
?>
