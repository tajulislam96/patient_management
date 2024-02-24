<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .backgroun{
        background-color: #006482;

    }
    .card{
            transition: all 0.35s;
        }
        
        
        .carddes:hover{
            transform:scale(1.03);
            box-shadow: 5
        }
        .heigh{
            height: 40px;
        }
        .bb{
            background-color:purple;
            color: white;
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
      <div class="container backgroun">
        <div>
            <p  style="text-align: center;"><button>Doctor List</button></p>
        </div>
               <div class="card  ms-1 carddes" style="width:100%;">
                      <header>
                         <img src="doctor.jpg" style="height: 130px; width:130px";>
                       </header>
                       
                        <div class="card-body bb heigh">
                          <p class="card-text">
                         <strong>Dr. Mostafizur Rahman</strong></p>
                          <a class="card-link stretched-link" href="mustafijur.php"></a>
                        </div>

                        
                      </div>
                      <div class="card  ms-1 mt-4 carddes" style="width:100%;">
                      <header>
                         <img src="doctor.jpg" style="height: 130px; width:130px";>
                       </header>
                       
                        <div class="card-body bb heigh">
                          <p class="card-text mb-2">
                         <strong >Dr. Gobindo Dev Paul</strong></p>
                          <a class="card-link stretched-link" href="gobindo.php"></a>
                        </div>

                        
                      </div>
              
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
 
<div class="home-button">
        <a href="http://localhost/patient_management/">Go to Home page</a>
    </div> 
</body>
</html>