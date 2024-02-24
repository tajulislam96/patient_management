<?php

session_start();
$connect=mysqli_connect("localhost","root","","mim");

if(isset($_POST['sent']))
{
    $email=$_POST['email'];
   $password=$_POST['password'];
   $qq="SELECT * from rana where email='$email' AND password='$password' ";
   $query=mysqli_query($connect,$qq);
   
   if(mysqli_num_rows($query)>0)
   {
    $rr=mysqli_fetch_array($query);
    $name=$rr['name'];
    $email=$rr['email'];
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;

    header("location:insert.php");
   }
   else
   {
    echo "<script>alert('Wrong Information')</script>";
   }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .vv{
            background-color:#009270 ;
        }
        .hh{
            color: white;
        }
        .aa:hover{
       background-color: green;
       
        }
        .mm{
            background-color:dimgray;
            color: white;
        }
        
        </style>

</head>
<body>
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header vv">
                    <h3 class="text-center hh"><b>Login</b></h3>
                </div>
                <div class="card-body mm">
                    <form method="POST">
                    <div class="form-group">
                            <label for="email"><strong>Email address</strong></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><strong>Password</strong></label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" name="sent" class="btn btn-primary btn-block aa"><strong>Login</strong></button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                   <h5>Not Have Account? <a href="Patient_signup.php"><strong>Sign_up here<strong></a></h5>
                </div>
             </div>
        </div>
    </div>
</div>
    

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
