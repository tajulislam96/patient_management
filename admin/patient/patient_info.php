<!DOCTYPE html>
<html>
<head>
    <title>Show Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container label {
            font-weight: bold;
            margin-right: 10px;
        }

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

        .search-container input[type="text"] {
            width: 200px;
        }

        .search-container button {
            padding: 8px 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .medicine-data td {
            background-color: #e6f7ff;
        }

        .hidden {
            display: none;
        }

        .back-btn {
            padding: 8px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #45a049;
        }

        .back-btn span {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h2>Patient and Medicine Information</h2>

    <!-- Search form -->
    <div class="search-container">
        <form method="POST">
            <label for="field">Search by Email:</label>
            <input type="text" id="search" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

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

    // Initialize variables
    $show_table = false;

    // Handle search query
    if(isset($_POST['search'])) {
        $search_query = $_POST['search'];

        // Search query for patient information based on email
        $patient_sql = "SELECT *
                        FROM patient_information
                        WHERE email LIKE '%$search_query%'";

        $patient_result = $conn->query($patient_sql);

        if ($patient_result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Patient Name</th>";
            echo "<th>Age</th>";
            echo "<th>Sex</th>";
            echo "<th>Weight</th>";
            echo "<th>Height</th>";
            echo "<th>BMI</th>";
            echo "<th>Blood Group</th>";
            echo "<th>Blood Pressure</th>";
            echo "</tr>";

            while($row = $patient_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["patient_name"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["sex"] . "</td>";
                echo "<td>" . $row["weight"] . "</td>";
                echo "<td>" . $row["height"] . "</td>";
                echo "<td>" . $row["bmi"] . "</td>";
                echo "<td>" . $row["blood_group"] . "</td>";
                echo "<td>" . $row["blood_pressure"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";

            // Output medicine information for the found patient(s)
            $medicine_sql = "SELECT *
                             FROM medicine_information
                             WHERE patient_id IN (
                                 SELECT id
                                 FROM patient_information
                                 WHERE email LIKE '%$search_query%'
                             )";

            $medicine_result = $conn->query($medicine_sql);

            if ($medicine_result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Genetic/Brand Name</th>";
                echo "<th>Power</th>";
                echo "<th>Doses</th>";
                echo "<th>Preparation</th>";
                echo "<th>Timing</th>";
                echo "<th>Route</th>";
                echo "</tr>";

                while($row = $medicine_result->fetch_assoc()) {
                    echo "<tr class='medicine-data'>";
                    echo "<td>" . $row["genetic_name"] . "</td>";
                    echo "<td>" . $row["power"] . "</td>";
                    echo "<td>" . $row["doses"] . "</td>";
                    echo "<td>" . $row["preparation"] . "</td>";
                    echo "<td>" . $row["timing"] . "</td>";
                    echo "<td>" . $row["route"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No medicine information found for this patient.</td></tr>";
            }

            echo "</table>";
            $show_table = true;
        } else {
            echo "<p>No results found.</p>";
        }
    }

    // Close connection
    $conn->close();
    ?>

    <!-- Display the table only if search has been performed -->
    <div id="table-container" class="<?php echo $show_table ? '' : 'hidden'; ?>">
        <!-- Table will be displayed here by PHP -->
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <button class="back-btn" onclick="window.location.href = 'patient_login.php';">
            <span>&#8592;</span> Back
        </button>
    </div>

    <script>
        // Hide the table if no search has been performed
        if (!<?php echo $show_table ? 'true' : 'false'; ?>) {
            document.getElementById('table-container').style.display = 'none';
        }
    </script>
</body>
</html>
