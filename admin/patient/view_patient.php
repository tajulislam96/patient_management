<!DOCTYPE html>
<html>
<head>
    <title>View Patient Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        .patient-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .patient-info h2 {
            color: #333;
            margin-bottom: 10px;
            width: 100%;
        }

        .patient-info p {
            color: #666;
            margin-bottom: 5px;
            flex: 0 0 33.33%; /* Three columns */
        }

        .medicine-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }

        .medicine-info h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .medicine-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .medicine-info th, .medicine-info td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .medicine-info th {
            background-color: #f2f2f2;
        }

        .medicine-info button {
            margin-right: 5px;
        }

        /* Print button style */
        .print-button {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .print-button:hover {
            background-color: #0056b3;
        }

        /* Logout button style */
        .logout-button {
            margin-top: 20px;
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        .home-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .home-button a {
            padding: 10px 20px;
            background-color:purple;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .home-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
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

    // Check if id parameter is set in the URL
    if (isset($_GET['id'])) {
        // Escape id parameter for security
        $patient_id = $conn->real_escape_string($_GET['id']);

        // Query to retrieve patient information based on patient_id
        $patient_sql = "SELECT * FROM patient_information WHERE id = '$patient_id'";
        $patient_result = $conn->query($patient_sql);

        if ($patient_result->num_rows > 0) {
            // Output patient information
            $patient_row = $patient_result->fetch_assoc();
            echo '<div class="patient-info">';
            echo '<h2>Patient Information</h2>';
            echo '<p>Name: ' . $patient_row['patient_name'] . '</p>';
            echo '<p>Age: ' . $patient_row['age'] . '</p>';
            echo '<p>Sex: ' . $patient_row['sex'] . '</p>';
            echo '<p>Weight: ' . $patient_row['weight'] . '</p>';
            echo '<p>Height: ' . $patient_row['height'] . '</p>';
            echo '<p>BMI: ' . $patient_row['bmi'] . '</p>';
            echo '<p>Blood Group: ' . $patient_row['blood_group'] . '</p>';
            echo '<p>Blood Pressure: ' . $patient_row['blood_pressure'] . '</p>';
            echo '<p>Email: ' . $patient_row['email'] . '</p>';
            echo '</div>';

            // Query to retrieve medicine information based on patient_id
            $medicine_sql = "SELECT * FROM medicine_information WHERE patient_id = '$patient_id'";
            $medicine_result = $conn->query($medicine_sql);

            if ($medicine_result->num_rows > 0) {
                // Output medicine information
                echo '<div class="medicine-info">';
                echo '<h2>Medicine Information</h2>';
                echo '<table>';
                echo '<tr><th>Genetic Name</th><th>Power</th><th>Doses</th><th>Preparation</th><th>Timing</th><th>Route</th><th>Action</th></tr>';
                while ($medicine_row = $medicine_result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $medicine_row['genetic_name'] . '</td>';
                    echo '<td>' . $medicine_row['power'] . '</td>';
                    echo '<td>' . $medicine_row['doses'] . '</td>';
                    echo '<td>' . $medicine_row['preparation'] . '</td>';
                    echo '<td>' . $medicine_row['timing'] . '</td>';
                    echo '<td>' . $medicine_row['route'] . '</td>';
                    echo '<td><button onclick="editMedicine(' . $medicine_row['id'] . ', ' . $patient_id . ')">Edit</button>';
                    echo '<button onclick="removeMedicine(' . $medicine_row['id'] . ', ' . $patient_id . ')">Remove</button></td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            } else {
                echo '<div class="medicine-info">';
                echo '<h2>Medicine Information</h2>';
                echo '<p>No medicine information available for this patient.</p>';
                echo '</div>';
            }
        } else {
            echo 'No patient found with the provided ID.';
        }
    } else {
        echo 'No patient ID provided.';
    }

    // Close connection
    $conn->close();
    ?>
    
    <!-- Print button -->
    <button class="print-button" onclick="printPage()">Print</button>
    
    <!-- Logout button -->
    <button class="logout-button" onclick="logout()">
        <i class="fas fa-sign-out-alt"></i> Logout
    </button>
</div>

<script>
    function printPage() {
        window.print();
    }
    
    function logout() {
        // Redirect to CSE.php
        window.location.href = 'CSE.php';
    }
    
    function editMedicine(id, patientId) {
        // Redirect to edit.php with the medicine ID and patient ID
        window.location.href = 'edit.php?medicine_id=' + id + '&id=' + patientId;
    }

    function removeMedicine(medicineId, patientId) {
        // Send an AJAX request to delete_medicine.php
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_medicine.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page to reflect changes after deletion
                window.location.reload();
            }
        };
        // Send the medicine_id and patient_id as parameters
        xhr.send('medicine_id=' + medicineId + '&patient_id=' + patientId);
    }
</script>
<div class="home-button">
        <a href="http://localhost/patient_management/">Go to Home page</a>
    </div>

</body>
</html>
