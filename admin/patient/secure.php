<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Select Patient Type</title>
<style>
.card {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    text-align: center;
}

.card h2 {
    margin-top: 0;
}

.button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.button-container button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.button-container button:hover {
    background-color: #0056b3;
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
    <div class="card">
        <h2>Select Patient Type</h2>
        <div class="button-container">
            <button onclick="location.href='index.php' ">New Patient</button>
            <button onclick="location.href='show.php' ">Old Patient</button>
        </div>
   
    <div class="home-button">
        <a href="http://localhost/patient_management/">Go to Home page</a>
     </div>
    </div>
</body>
</html>
