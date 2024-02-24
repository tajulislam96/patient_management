<!DOCTYPE html>
<html>
<head>
    <title>Edit Medicine Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .card h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group select {
            width: calc(100% - 20px); /* Adjust the width as needed */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Edit Medicine Information</h2>
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

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $medicine_id = $_POST['medicine_id'];
            $genetic_name = $_POST['genetic_name'];
            $power = $_POST['power'];
            $doses = $_POST['doses'];
            $preparation = $_POST['preparation'];
            $timing = $_POST['timing'];
            $route = $_POST['route'];

            // Update medicine information in the database
            $update_sql = "UPDATE medicine_information SET
                    genetic_name='$genetic_name',
                    power='$power',
                    doses='$doses',
                    preparation='$preparation',
                    timing='$timing',
                    route='$route'
                    WHERE id='$medicine_id'";

            if ($conn->query($update_sql) === TRUE) {
                // Redirect back to the view_patient.php page after successful update
                header("Location: view_patient.php?id=".$_POST['patient_id']);
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Retrieve medicine information based on medicine ID
        if (isset($_GET['medicine_id'])) {
            $medicine_id = $conn->real_escape_string($_GET['medicine_id']);

            $medicine_sql = "SELECT * FROM medicine_information WHERE id = '$medicine_id'";
            $medicine_result = $conn->query($medicine_sql);

            if ($medicine_result->num_rows == 1) {
                $medicine_row = $medicine_result->fetch_assoc();
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="medicine_id" value="<?php echo $medicine_row['id']; ?>">
            <input type="hidden" name="patient_id" value="<?php echo $medicine_row['patient_id']; ?>">
            <div class="form-group">
                <label for="genetic_name">Genetic Name:</label>
                <input type="text" id="genetic_name" name="genetic_name" value="<?php echo $medicine_row['genetic_name']; ?>">
            </div>
            <div class="form-group">
                <label for="power">Power:</label>
                <input type="text" id="power" name="power" value="<?php echo $medicine_row['power']; ?>">
            </div>
            <div class="form-group">
                <label for="doses">Doses:</label>
                <input type="text" id="doses" name="doses" value="<?php echo $medicine_row['doses']; ?>">
            </div>
            <div class="form-group">
                <label for="preparation">Preparation:</label>
                <select id="preparation" name="preparation">
                    <option value="Before meal" <?php if($medicine_row['preparation'] == 'Before meal') echo 'selected'; ?>>Before meal</option>
                    <option value="After meal" <?php if($medicine_row['preparation'] == 'After meal') echo 'selected'; ?>>After meal</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="timing">Timing:</label>
                <select id="timing" name="timing">
                    <option value="1+1+1" <?php if($medicine_row['timing'] == '1+1+1') echo 'selected'; ?>>1+1+1</option>
                    <option value="1+0+1" <?php if($medicine_row['timing'] == '1+0+1') echo 'selected'; ?>>1+0+1</option>
                    <option value="1+1+0" <?php if($medicine_row['timing'] == '1+1+0') echo 'selected'; ?>>1+1+0</option>
                    <option value="0+1+1" <?php if($medicine_row['timing'] == '0+1+1') echo 'selected'; ?>>0+1+1</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="route">Route:</label>
                <select id="route" name="route">
                    <option value="1 day" <?php if($medicine_row['route'] == '1 day') echo 'selected'; ?>>1 day</option>
                    <option value="2 days" <?php if($medicine_row['route'] == '2 days') echo 'selected'; ?>>2 days</option>
                    <option value="3 day" <?php if($medicine_row['route'] == '3 day') echo 'selected'; ?>>3 day</option>
                    <option value="5 days" <?php if($medicine_row['route'] == '5 days') echo 'selected'; ?>>5 days</option>
                    <option value="7 day" <?php if($medicine_row['route'] == '7 day') echo 'selected'; ?>>7 day</option>
                    <option value="10 days" <?php if($medicine_row['route'] == '10 days') echo 'selected'; ?>>10 days</option>
                    <option value="15 day" <?php if($medicine_row['route'] == '15 day') echo 'selected'; ?>>15 day</option>
                    <option value="30 days" <?php if($medicine_row['route'] == '30 days') echo 'selected'; ?>>30 days</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Update">
            </div>
        </form>
        <?php
            } else {
                echo "Medicine not found.";
            }
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
