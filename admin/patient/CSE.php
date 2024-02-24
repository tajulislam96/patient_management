<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form Fields</title>
    <style>
        /* Reset some default styles */
        body, form {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #84ADEA; /* Set background color to black */
            color: white; /* Set text color to white for better visibility */
        }

        .container {
            width: 85%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: red;
            text-align: center;
            margin-bottom: 20px;
            font-family: Algerian, sans-serif;
        }

        form {
            margin-bottom: 20px;
            background-color: #4A4A4A; /* Set form background color to gray */
            padding: 20px;
            border-radius: 10px;
        }

        .input-row {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .input-column {
            flex: 1;
            margin-right: 10px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-label {
            background-color: #45bc43;
            color: white;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            border: 1px solid #af4c77;
            border-bottom: none;
            text-align: center;
        }

        input[type="text"], input[type="email"], select {
            padding: 10px;
            border: 1px solid #af4c77;
            border-radius: 0 0 5px 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
            outline: none;
            width: 100%;
        }

        input[type="text"]:focus, input[type="email"]:focus, select:focus {
            border-color: #45a049;
        }

        input[type="button"],
        input[type="submit"] {
            background-color: #a04572;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }

        input[type="button"]:hover,
        input[type="submit"]:hover {
            background-color: #368c43;
        }
        
    </style>
    <script>
        // JavaScript function to add new input fields
        function addFields() {
            var container = document.getElementById("medicine-container");

            // Create input fields for medication and dosage in the same row
            var inputRow = document.createElement("div");
            inputRow.className = "input-row";

            // Row 1: Genetic/Brand Name and Power
            var geneticLabel = document.createElement("label");
            geneticLabel.className = "input-label";
            geneticLabel.innerHTML = "Genetic/Brand Name";

            var geneticInput = document.createElement("input");
            geneticInput.type = "text";
            geneticInput.name = "genetic[]";
            geneticInput.placeholder = "Genetic/Brand Name";

            var powerLabel = document.createElement("label");
            powerLabel.className = "input-label";
            powerLabel.innerHTML = "Power";

            var powerInput = document.createElement("input");
            powerInput.type = "text";
            powerInput.name = "power[]";
            powerInput.placeholder = "Power";

            var group1Div = document.createElement("div");
            group1Div.className = "input-group";
            group1Div.appendChild(geneticLabel);
            group1Div.appendChild(geneticInput);
            group1Div.appendChild(powerLabel);
            group1Div.appendChild(powerInput);

            // Row 2: Doses and Preparation
            var dosesLabel = document.createElement("label");
            dosesLabel.className = "input-label";
            dosesLabel.innerHTML = "Doses";

            var dosesInput = document.createElement("input");
            dosesInput.type = "text";
            dosesInput.name = "doses[]";
            dosesInput.placeholder = "Doses";

            var preparationLabel = document.createElement("label");
            preparationLabel.className = "input-label";
            preparationLabel.innerHTML = "Preparation";

            var preparationSelect = document.createElement("select");
            preparationSelect.name = "preparation[]";

            var beforeMealOption = document.createElement("option");
            beforeMealOption.value = "Before meal";
            beforeMealOption.text = "Before meal";

            var afterMealOption = document.createElement("option");
            afterMealOption.value = "After meal";
            afterMealOption.text = "After meal";

            preparationSelect.appendChild(beforeMealOption);
            preparationSelect.appendChild(afterMealOption);

            var group2Div = document.createElement("div");
            group2Div.className = "input-group";
            group2Div.appendChild(dosesLabel);
            group2Div.appendChild(dosesInput);
            group2Div.appendChild(preparationLabel);
            group2Div.appendChild(preparationSelect);

            // Row 3: Timing and Route
            var timingLabel = document.createElement("label");
            timingLabel.className = "input-label";
            timingLabel.innerHTML = "Timing";

            var timingSelect = document.createElement("select");
            timingSelect.name = "timing[]";

            var timingOptions = ["1+1+1", "1+0+1", "1+1+0", "0+1+1", "0+0+1", "1+0+0"];

            timingOptions.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.value = option;
                optionElement.text = option;
                timingSelect.appendChild(optionElement);
            });

            var routeLabel = document.createElement("label");
            routeLabel.className = "input-label";
            routeLabel.innerHTML = "Time Limit";

            var routeSelect = document.createElement("select");
            routeSelect.name = "route[]";

            var dayOptions = ["1 day", "2 days", "3 days", "5 days", "7 days", "10 days", "15 days", "30 days"];

            dayOptions.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.value = option;
                optionElement.text = option;
                routeSelect.appendChild(optionElement);
            });

            var group3Div = document.createElement("div");
            group3Div.className = "input-group";
            group3Div.appendChild(timingLabel);
            group3Div.appendChild(timingSelect);
            group3Div.appendChild(routeLabel);
            group3Div.appendChild(routeSelect);

            // Create remove button
            var removeButton = document.createElement("input");
            removeButton.type = "button";
            removeButton.value = "Remove";
            removeButton.onclick = function() {
                container.removeChild(inputRow);
            };

            var removeDiv = document.createElement("div");
            removeDiv.appendChild(removeButton);

            // Append all created elements to inputRow
            inputRow.appendChild(group1Div);
            inputRow.appendChild(group2Div);
            inputRow.appendChild(group3Div);
            inputRow.appendChild(removeDiv);

            // Append inputRow to container
            container.appendChild(inputRow);
        }

        // Function to validate email format
        function validateEmail() {
            var emailInput = document.getElementsByName("email")[0].value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput)) {
                alert("Please enter a valid email address.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Patient Information</h1>
        <form action="process.php" method="post" onsubmit="return validateEmail()">
            <!-- Patient information fields -->
            <div class="input-row">
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Patient Name</label>
                        <input type="text" name="patient_name" placeholder="Patient Name" required>
                    </div>
                </div>
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Age</label>
                        <input type="text" name="age" placeholder="Age" required>
                    </div>
                </div>
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Sex</label>
                        <select name="sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="input-row">
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Weight</label>
                        <input type="text" name="weight" placeholder="Weight">
                    </div>
                </div>
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Height</label>
                        <input type="text" name="height" placeholder="Height">
                    </div>
                </div>
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">BMI</label>
                        <select name="bmi">
                            <option value="Underweight">Underweight</option>
                            <option value="Normal">Normal</option>
                            <option value="Overweight">Overweight</option>
                            <option value="Obese">Obese</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="input-row">
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Blood Group</label>
                        <select name="blood_group">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Blood Pressure</label>
                        <input type="text" name="blood_pressure" placeholder="Blood Pressure" required>
                    </div>
                </div>
                <div class="input-column">
                    <div class="input-group">
                        <label class="input-label">Email</label>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                </div>
            </div>
            <h1>Medicine</h1>
            <!-- Medicine input fields -->
            <div id="medicine-container">
                <!-- Fields will be added dynamically here -->
            </div>
            <!-- Button to add new medicine fields -->
            <input type="button" value="Add Medicine" onclick="addFields()"><br><br>
            <!-- Submit button -->
            <input type="submit" value="Submit" name="sign">
        </form>
    </div>
</body>
</html>
