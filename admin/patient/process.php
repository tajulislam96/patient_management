<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        .card {
            background-color: purple;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            margin-bottom: 20px;
            text-align: center;
        }

        .card:hover {
            background-color: green;
        }

        button {
            font-size: 20px;
            padding: 10px 20px;
            background-color:Green;
            color: white;
            border: none;
            cursor: pointer;
            margin: 10px;
        }

        button:hover {
            background-color: purple;
        }

        .congrats {
            color: white;
            font-family: Algerian, sans-serif;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
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
                // Escape user inputs for security
                $patient_name = $conn->real_escape_string($_POST['patient_name']);
                $age = $conn->real_escape_string($_POST['age']);
                $sex = $conn->real_escape_string($_POST['sex']);
                $weight = $conn->real_escape_string($_POST['weight']);
                $height = $conn->real_escape_string($_POST['height']);
                $bmi = $conn->real_escape_string($_POST['bmi']);
                $blood_group = $conn->real_escape_string($_POST['blood_group']);
                $blood_pressure = $conn->real_escape_string($_POST['blood_pressure']);
                $email = $conn->real_escape_string($_POST['email']);

                // Insert patient information into database
                $sql_patient = "INSERT INTO patient_information (patient_name, age, sex, weight, height, bmi, blood_group, blood_pressure, email)
                                VALUES ('$patient_name', '$age', '$sex', '$weight', '$height', '$bmi', '$blood_group', '$blood_pressure', '$email')";

                if ($conn->query($sql_patient) === TRUE) {
                    $last_patient_id = $conn->insert_id; // Get the ID of the last inserted patient
                    echo '<div class="congrats">Congratulations!!</div><br>';
                } else {
                    echo "Error: " . $sql_patient . "<br>" . $conn->error;
                }

                // Insert medicine information into database
                if (isset($_POST['genetic']) && is_array($_POST['genetic'])) {
                    foreach ($_POST['genetic'] as $key => $genetic) {
                        $genetic = $conn->real_escape_string($genetic);
                        $power = $conn->real_escape_string($_POST['power'][$key]);
                        $doses = $conn->real_escape_string($_POST['doses'][$key]);
                        $preparation = $conn->real_escape_string($_POST['preparation'][$key]);
                        $timing = $conn->real_escape_string($_POST['timing'][$key]);
                        $route = $conn->real_escape_string($_POST['route'][$key]);

                        // Insert medicine information, linking it to the patient via patient_id
                        $sql_medicine = "INSERT INTO medicine_information (patient_id, genetic_name, power, doses, preparation, timing, route)
                                        VALUES ('$last_patient_id', '$genetic', '$power', '$doses', '$preparation', '$timing', '$route')";

                        if ($conn->query($sql_medicine) !== TRUE) {
                            echo "Error: " . $sql_medicine . "<br>" . $conn->error;
                        }
                    }
                } else {
                    echo "No medicine information provided.";
                }
            }

            // Close connection
            $conn->close();
            ?>
            <button onclick="window.history.back()">Back</button>
            <button onclick="window.location.href = 'view_patient.php?id=<?php echo $last_patient_id; ?>'">View</button>
        </div>
    </div>
</body>
</html>
