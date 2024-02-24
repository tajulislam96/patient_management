<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color:gray;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    .card {
        width: 300px;
        padding: 20px;
        background-color: purple; /* Purple color */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #fff;
    }
    
    .card h2 {
        margin-top: 0;
        
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: none;
    }
    
    .form-group button {
        padding: 10px 20px;
        background-color: #fff;
        color: #8a2be2;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .form-group button:hover {
        background-color: #ddd;
    }
</style>
<script>
function checkPassword() {
    var password = document.getElementById("password").value;
    if (password === "tajul") { // Change "adminpassword" to your desired password
        window.location.href = "secure.php"; // Redirect to secured page
    } else {
        alert("Incorrect password!");
    }
}
</script>
</head>
<body>
    <div class="card">
        <h2 style="text-align: center;">Password Page</h2>
        <h4>Only Operator can access this page</h4>
        <form>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" required>
            </div>
            <div class="form-group">
                <button type="button" onclick="checkPassword()">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
