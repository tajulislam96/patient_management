<?php
$connect=mysqli_connect("localhost","root","","mim");
if(isset($_POST['sign']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $birth_date=$_POST['birth_date'];
    $password=$_POST['password'];
    $con_password=$_POST['con_password'];
    
   if(!empty($name) && !empty($email) && !empty($mobile) && !empty($city) && !empty($gender) && !empty($birth_date) && !empty($password))
     {
        if($password===$con_password){
        $query="INSERT INTO rana(name,email,mobile,city,gender,birth_date,password)
        VALUES('$name','$email','$mobile','$city','$gender','$birth_date','$password')";
        $vv=mysqli_query($connect,$query);
        if($vv)
        {
            header("location:created.php");
        }
        }
        else
        {
        
            echo "<script>alert('Password not match')</script>";
    }
        
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
        
        
</style>
</head>
<body>
   
<div class="container mt-5">
 <div class="row justify-content-center ll">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header vv">
                    <h3 class="text-center hh"><b>Sign Up</b></h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="name" class="form-label"><strong>Name</strong></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                               <div class="valid-feedback">
                                  Looks good!
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="email"><strong>Email address</strong></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                              <div class="valid-feedback">
                                  Looks good!
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile"><strong>Mobile Number</strong></label>
                            <input type="tel" class="form-control" name="mobile" placeholder="Enter your mobile number" required>
                            <div class="valid-feedback">
                                  Looks good!
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="city"><strong>Home Districk</strong></label>
                            <select class="form-control" name="city">
                                <option>Dhaka</option>
                                <option>Rajshahi</option>
                                <option>Rangpur</option>
                                <option>Khulna</option>
                                <option>Mymensingh</option>
                                <option>Sylhet</option>
                                <option>Chattrogram</option>
                                
                            </select>

                        </div>
                        <div>
                        <label for="gender"><strong>Gender</strong></label>
                        <div class="form-check form-check-inline px-3">
                        <input class="form-check-input" type="radio" name="gender" value="male" checked>
                         <label class="form-check-label" for="gender"><strong>
                  Male
                 </label>
                   </div>
                  <div class="form-check form-check-inline px-2">
                    <input class="form-check-input" type="radio" name="gender"  value="female">
                  <label class="form-check-label" for="gender"><strong>
              Female</strong>
                   </label>
                       </div>
                       <div class="form-check form-check-inline px-2">
                    <input class="form-check-input" type="radio" name="gender" value="others">
                  <label class="form-check-label" for="gender"><strong>
                Others</strong>
                   </label>
                       </div>
                        </div>
                         
                        <div class="form-group mt-1">
                            <label for="birth_date"><strong>Date of Birth</strong></label>
                            <input type="date" class="form-control" name="birth_date" placeholder="Enter your year of birth" required>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="password"><strong>Password</strong></label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword"><strong>Confirm Password</strong></label>
                            <input type="password" class="form-control" name="con_password" placeholder="Confirm your password" required>
                        </div>
                        <div class="form-check mb-3">
                           <input class="form-check-input" type="checkbox"  required>
                             <label class="form-check-label">
                                    Agree to terms and conditions
                                 </label>
                            <div class="invalid-feedback mb-3">
                                You must agree before submitting.
                                  </div>
                                  </div>
                        <button type="submit" name="sign" class="btn btn-primary btn-block aa"><strong>Sign Up</strong></button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                   <h5>Already have an account? <a href="Patient_login.php"><strong>Login here<strong></a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
  
     // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>
