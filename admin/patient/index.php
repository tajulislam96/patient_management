<?php
session_start();
include_once('config.php');
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Code for Signup
if (isset($_POST['submit'])) {
    // Getting Post values
    $name = $_POST['username'];
    $email = $_POST['email'];
    $cnumber = $_POST['contactnumber'];
    $city=$_POST['city'];
    $birth_date=date('Y-m-d', strtotime($_POST['birth_date']));
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $loginpass = md5($password); 
    $cpassword=$_POST['cpassword'];

    // Check if password and confirm password match
    if ($password !== $cpassword) {
        echo "<script>alert('Password is not match.');</script>";
    } else {
        // Check if the email already exists in the database
        $checkEmailQuery = "SELECT id FROM tblusers WHERE emailId = :uemail";
        $checkEmailStmt = $dbh->prepare($checkEmailQuery);
        $checkEmailStmt->bindParam(':uemail', $email, PDO::PARAM_STR);
        $checkEmailStmt->execute();
        $emailExists = $checkEmailStmt->fetch(PDO::FETCH_ASSOC);

        if ($emailExists) {
            echo "<script>alert('Email already exists. Please use a different email.');</script>";
        } else {
            // Generating 6 Digit Random OTP
            $otp = mt_rand(100000, 999999);

            // Query for Insert user data if email not registered 
            $emailverifiy = 0;

            $sql = "INSERT INTO tblusers(userName,emailId,ContactNumber,city,birth_date,gender,userPassword,emailOtp,isEmailVerify) VALUES(:fname,:emaill,:cnumber,:city,:birth_date,:gender,:hashedpass,:otp,:isactive)";
            $query = $dbh->prepare($sql);
            // Binding Post Values
            $query->bindParam(':fname', $name, PDO::PARAM_STR);
            $query->bindParam(':emaill', $email, PDO::PARAM_STR);
            $query->bindParam(':cnumber', $cnumber, PDO::PARAM_STR);
            $query->bindParam(':city',$city,PDO::PARAM_STR);
            $query->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
            $query->bindParam(':gender', $gender, PDO::PARAM_STR);
            $query->bindParam(':hashedpass', $loginpass, PDO::PARAM_STR);
            $query->bindParam(':otp', $otp, PDO::PARAM_STR);
            $query->bindParam(':isactive', $emailverifiy, PDO::PARAM_STR);

            $query->execute();

            $lastInsertId = $dbh->lastInsertId();

            if ($lastInsertId) {
                $_SESSION['emailid'] = $email;
                // Code for Sending Email
                $subject = "OTP Verification";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: User Signup<iconmedical.hospital@gmail.com>' . "\r\n";

                $ms = "<html></body><div><div>Dear $name,</div></br></br>";
                $ms .= "<div style='padding-top:8px;'>Thank you! for registering at ICON MEDICAL HOSPITAL,Trishal,Mymensingh. Your OTP for Account Verification is $otp</div><div></div></body></html>";

                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host       = 'tls://smtp.gmail.com:587';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'iconmedical.hospital@gmail.com'; // Your Gmail email address
                    $mail->Password   = 'tifp eupd pxnu yned'; // Your Gmail App Password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('iconmedical.hospital@gmail.com', 'User Signup');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = $ms;

                    $mail->send();
                    echo 'Email sent successfully!';
                    echo "<script>window.location.href='verify-otp.php'</script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "<script>alert('Something went wrong. Please try again');</script>";
            }
        }
    }
}
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
<title>User Registration with email otp verification in PHP</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #999;
	background: #e2e2e2;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	min-height: 41px;
	box-shadow: none;
	border-color: #e1e1e1;
}
.form-control:focus {
	border-color: #00cb82;
}	
.form-control, .btn {        
	border-radius: 3px;
}
.form-header {
	margin: -30px -30px 20px;
	padding: 30px 30px 10px;
	text-align: center;
	background: #00cb82;
	border-bottom: 1px solid #eee;
	color: #fff;
}
.form-header h2 {
	font-size: 34px;
	font-weight: bold;
	margin: 0 0 10px;
	font-family: 'Pacifico', sans-serif;
    
}


.form-header p {
	margin: 20px 0 15px;
	font-size: 17px;
	line-height: normal;
	font-family: 'Courgette', sans-serif;
}
.signup-form {
	width: 390px;
	margin: 0 auto;	
	padding: 30px 0;	
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f0f0f0;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}		
.signup-form label {
	font-weight: normal;
	font-size: 14px;
}
.signup-form input[type="checkbox"] {
	position: relative;
	top: 1px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #00cb82;
	border: none;
	min-width: 200px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #00b073 !important;
	outline: none;
}
.signup-form a {
	color: #00cb82;		
}
.signup-form a:hover {
	text-decoration: underline;
}
#cc{
    background-color: purple;
}
#cc:hover{
    background-color: #00b073;
}
</style>

<!-- Add this script block at the end of your HTML body -->
<script>
  // Function to validate all fields
  function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var contactNumber = document.getElementById("contactnumber").value;
    var city = document.getElementById("city").value;
    var birthDate = document.getElementById("birth_date").value;
    var gender = document.querySelector('input[name="gender"]:checked');
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;

    // Check if any field is empty
    if (username === '' || email === '' || contactNumber === '' || city === '' || birthDate === '' || !gender || password === '' || confirmPassword === '') {
      alert("All fields are required");
      return false;
    }

    // Validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert("Invalid email address");
      return false;
    }

    // Validate contact number (assuming it should be numeric and have a length of 11)
    if (isNaN(contactNumber) || contactNumber.length !== 11) {
      alert("Invalid contact number (must be 11 digits)");
      return false;
    }

    // Validate username length
    if (username.length < 3) {
      alert("Username must be at least 3 characters");
      return false;
    }

    // Validate birthdate (you might need a more specific validation)
    if (!isValidDate(birthDate)) {
      alert("Invalid birthdate");
      return false;
    }

    // Validate password length
    if (password.length < 6) {
      alert("Password must be at least 6 characters");
      return false;
    }

    // Validate password and confirm password
    if (password !== confirmPassword) {
      alert("Password and confirm password do not match");
      return false;
    }

    // Add more custom validations as needed

    return true;
  }

  // Function to validate date format (YYYY-MM-DD)
  function isValidDate(dateString) {
    var regex = /^\d{4}-\d{2}-\d{2}$/;
    return regex.test(dateString);
  }

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity() || !validateForm()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add('was-validated');
        }, false);
      });
  })();
</script>

  

</head>
<body>
<div class="signup-form">
    <form  onsubmit="return validateForm()" method="post" class="needs-validation" novalidate>
		<div class="form-header">
			<h2>Sign Up</h2>
			<p>Fill out this form for registration</p>
		</div>
        <div class="form-group">
			<label>Full Name</label>
        	<input type="text" class="form-control" name="username" required="required" value="<?php if(isset($_POST['submit'])) echo $name ;?>">
                 <div class="valid-feedback">
                                  Done!
                 </div>
                 
        </div>
          
        <div class="form-group">
			<label>Email Address</label>
        	<input type="email" class="form-control" name="email" required="required"value="<?php if(isset($_POST['submit'])) echo $email ;?>">
            <div class="valid-feedback">
                     Done!
                 </div>
        </div>
		<div class="form-group">
			<label>Contact Number</label>
            <input type="text" class="form-control" name="contactnumber" required="required" value="<?php if(isset($_POST['submit'])) echo $cnumber ;?>">
            <div class="valid-feedback">
                                  Done!
                 </div>
                   </div>
              <div class="form-group">
                <label for="city"><strong>Home Division *</strong></label>
                <select class="form-control" name="city" id="city" required>
                    <option value="" selected disabled>Select Home Division</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Chattrogram">Chattrogram</option>
                </select>
                
            </div>
          <div class="form-group">
              <label for="birth_date"><strong>Date of Birth</strong></label>
              <input type="date" class="form-control" name="birth_date" placeholder="Enter your year of birth"value="<?php if(isset($_POST['submit'])) echo $birth_date ;?>" required>
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
		<div class="form-group">
			<label> Password</label>
            <input type="password" class="form-control" name="password"value="<?php if(isset($_POST['submit'])) echo $password ;?>" required>
        </div>        
		<div class="form-group">
			<label> Confirm Password</label>
            <input type="password" class="form-control" name="cpassword"value="<?php if(isset($_POST['submit'])) echo $cpassword ;?>" required>
        </div>        
        <!-- <div class="form-group">
			<label class="form-check-label"><a href="resend-otp.php">Resend OTP</a></label>
		</div> -->
            <div class="form-check mb-3">
                           <input class="form-check-input" type="checkbox"  required>
                             <label class="form-check-label">
                                    Agree to terms and conditions
                                 </label>
                            <div class="invalid-feedback mb-3">
                                You must agree before submitting.
                                  </div>
                                  </div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" id="cc" name="submit">Sign Up</button>
		</div>	
    </form>
	<div class="text-center small">Already have an account? <a href="login.php">Login here</a></div>
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




</div>
</body>
</html>