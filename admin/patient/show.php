<!DOCTYPE html>
<html>
<head>
    <title>Show Data</title>
    <style>
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container label {
            font-weight: bold;
            margin-right: 10px;
        }

        .search-container select,
        .search-container input[type="text"],
        .search-container button {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-container button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #45a049;
        }

        .search-container select {
            width: 150px;
        }

        .table-container {
            margin-bottom: 60px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style for the patient information header */
        .patient-info-header th {
            background-color: #4CAF50;
            color: white;
        }

        /* Style for the patient information cells */
        .patient-info-data td {
            background-color: #f2f2f2;
        }

        /* Style for the medicine information header */
        .medicine-header th {
            background-color: #2196F3;
            color: white;
        }

        /* Style for the medicine information cells */
        .medicine-data td {
            background-color: #e6f7ff;
        }
        .mm {
            font-family: Algerian, sans-serif;
            color: purple;
        }

        /* Style for the go to home page button */
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
    <h2 style="text-align: center;" class="mm">Patient and Medicine Information</h2>

    <!-- Search form -->
    <div class="search-container">
        <form method="POST">
            <label for="field">Search by Field:</label>
            <select id="field" name="field">
                <option value="patient_name">Patient Name</option>
                <option value="age">Age</option>
                <option value="sex">Sex</option>
                <option value="weight">Weight</option>
                <option value="height">Height</option>
                <option value="bmi">BMI</option>
                <option value="blood_group">Blood Group</option>
                <option value="blood_pressure">Blood Pressure</option>
                <option value="email">Email</option>
            </select>
            <input type="text" id="search" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

    <?php
    // Database connection parameters
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "zia";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle search query
    if(isset($_POST['field']) && isset($_POST['search'])) {
        $field = $_POST['field'];
        $search_query = $_POST['search'];
        $sql = "SELECT p.*, m.*
                FROM patient_information p
                LEFT JOIN medicine_information m ON p.id = m.patient_id
                WHERE $field LIKE '%$search_query%'
                ORDER BY p.patient_name, p.age, p.sex, p.weight, p.height, p.bmi, p.blood_group, p.blood_pressure";
    } else {
        // SQL query to retrieve all patient and medicine information
        $sql = "SELECT p.*, m.*
                FROM patient_information p
                LEFT JOIN medicine_information m ON p.id = m.patient_id
                ORDER BY p.patient_name, p.age, p.sex, p.weight, p.height, p.bmi, p.blood_group, p.blood_pressure";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $prev_patient_data = null;

        while($row = $result->fetch_assoc()) {
            $current_patient_data = array($row["patient_name"], $row["age"], $row["sex"], $row["weight"], $row["height"], $row["bmi"], $row["blood_group"], $row["blood_pressure"]);

            // Output patient information only if it's different from the previous patient's information
            if ($current_patient_data != $prev_patient_data) {
                // Close previous table if it exists
                if ($prev_patient_data !== null) {
                    echo "</table>";
                    echo "</div>"; // Close the table container div
                }

                // Start a new table for the current patient
                echo "<div class='table-container'>";
                echo "<table>";
                echo "<tr class='patient-info-header'>";
                echo "<th>Patient Name</th>";
                echo "<th>Age</th>";
                echo "<th>Sex</th>";
                echo "<th>Weight</th>";
                echo "<th>Height</th>";
                echo "<th>BMI</th>";
                echo "<th>Blood Group</th>";
                echo "<th>Blood Pressure</th>";
                echo "</tr>";

                // Output patient information
                echo "<tr class='patient-info-data'>";
                echo "<td>" . $row["patient_name"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["sex"] . "</td>";
                echo "<td>" . $row["weight"] . "</td>";
                echo "<td>" . $row["height"] . "</td>";
                echo "<td>" . $row["bmi"] . "</td>";
                echo "<td>" . $row["blood_group"] . "</td>";
                echo "<td>" . $row["blood_pressure"] . "</td>";
                echo "</tr>";

                // Output medicine information header row
                echo "<tr class='medicine-header'>";
                echo "<th>Genetic/Brand Name</th>";
                echo "<th>Power</th>";
                echo "<th>Doses</th>";
                echo "<th>Preparation</th>";
                echo "<th>Timing</th>";
                echo "<th>Route</th>";
                echo "</tr>";
            }

            // Output medicine information
            echo "<tr class='medicine-data'>";
            echo "<td>" . $row["genetic_name"] . "</td>";
            echo "<td>" . $row["power"] . "</td>";
            echo "<td>" . $row["doses"] . "</td>";
            echo "<td>" . $row["preparation"] . "</td>";
            echo "<td>" . $row["timing"] . "</td>";
            echo "<td>" . $row["route"] . "</td>";
            echo "</tr>";

            // Update previous patient data
            $prev_patient_data = $current_patient_data;
        }

        // Close the last table
        echo "</table>";
        echo "</div>"; // Close the table container div
    } else {
        echo "<p>No results found.</p>";
    }
    $conn->close();
    ?>
    <div class="home-button">
        <a href="http://localhost/patient_management/">Go to Home page</a>
    </div>
</body>
</html>
