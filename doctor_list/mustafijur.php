<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <style>
        .doctor-profile {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .doctor-photo {
            border-radius: 50%;
            max-width: 200px;
            margin-bottom: 20px;
        }
        .doctor-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .doctor-specialization {
            font-style: italic;
            color: #666;
            margin-bottom: 20px;
        }
        .doctor-contact {
            font-size: 16px;
        }
    .ll:hover{
       background-color:green;
    }

    </style>
</head>
<body>

<div class="doctor-profile">
    <p><Button class="ll"> <a href="musta.php">View detials</a></Button></p>
    <img src="musta.png" alt="Doctor's Photo" class="doctor-photo">
    <div class="doctor-name">Dr. Mustafizur Rahman</div>
    <div class="doctor-specialization">Cardiologist</div>
    <div class="doctor-contact">
        <p>Email: mustafizur33@example.com</p>
        
        <p>Address:ICON Medical,Trishal,Mymensingh</p>
    </div>
</div>

</body>
</html>
