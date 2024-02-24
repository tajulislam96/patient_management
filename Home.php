<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>icon</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .tt{
        background-color: #006482;
        
    }
    .ww:hover{
        text-decoration: underline;
        background-color:#4A4A4A;

    }
    .logo{
        height: 100%;
        width: 100px;
        margin-left: 20px;
    }
    .ful{
        background-color: #F9F4F4;
    }
    .foot{
        background-color:#4A4A4A ;
        color: aliceblue;
    }
    .cc{
        font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif
    }
@media all and (min-width: 1200px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
}	

.group{
            position:relative;
            height:40px;
            overflow: hidden;
            color: #fff;
            background-color: #0000008e;
            border-top: 1px solid darkturquoise;
            


        }
        .group .text{
            position: absolute;
            margin: 5px 0;
            padding: 2;
            width:max-content;
            animation: my-animation 10s linear infinite;
           


        }
        .card{
            transition: all 0.35s;
        }
        .carddes:hover{
            transform:scale(1.10);
            box-shadow: 7px 10px 8px white;
        }
       
    .s:hover{
    color: green;
    }
        
  </style>
</head>
  <body>
    
        <div class="container bg-white">
           <header >
            <nav class="navbar navbar-expand-sm tt ">
                <a href="#" class="navbar-brand">
                    <img src="logo.png" alt="Logo" class="logo">
                </a>

                    <h1 class="fs-0 text-danger cc">ICON</h1>
                
                    <h5 class="pt-5 text-danger"><strong>Medical Hospita</strong>l</h5>
                
                        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ms-auto">
                        <li class="nav-item"> <a class="nav-link text-white fs-5 ww " href="#"><i class="fa-solid fa-house-chimney p-2"></i><strong>Home</strong></a></li>
                         <li class="nav-item"><a class="nav-link text-white fs-5 ww " href="#"><i class="fa-solid fa-address-card p-2"></i>About</a></li>
                         <li class="nav-item"> <a class="nav-link text-white fs-5 ww " href="#"><i class="fa-brands fa-servicestack p-2"></i>Services</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fs-5 ww" href="#" data-bs-toggle="dropdown"><i class="fa-solid fa-right-to-bracket p-2"></i> Login</a>
                             <ul class="dropdown-menu bg-success">
                               <li><a class="dropdown-item text-white  ww m-2" href="admin/patient/operator.php"><b>1. Admin Login</b></a></li>
                               <li><a class="dropdown-item text-white  ww m-2" href="#"><b>2. Staff Login</b></a></li>
                               <li><a class="dropdown-item text-white ww m-2" href="admin/patient/patient_login.php"><b>3. Patient Login</b> </a></li>
                             </ul>
                         </li>
                         <li class="nav-item"><a class="nav-link text-white fs-5 ww " href="#"><i class="fa-regular fa-id-card p-2"></i>Contacts</a></li>
                     </ul>
                     
                  </div>
                  
                
                
                
         </nav>
         
           </header>   
           
             <main>
               
            <div class="imag" style="height:500 ;padding-bottom:500px;">

            <div>
                
                  <div class="group">
                      <p class="text">আইকন মেডিকেল সেন্টারে আপনাকে স্বাগতম</p>
                    </div>
                   
                    
            </div>
                    <div class="card mt-3 ms-4 carddes" style="width: 18rem;">
                        <img class="card-img-top" src="doctor.jpg" alt="Card image cap">
                        <div class="card-body bg-success">
                          <p class="card-text">Our Doctors</p>
                          <a class="card-link stretched-link" href="doctor_list/doctor_list.php" target="_blank"></a>
                        </div>
                      </div>
              
            </div>
           </main>
           
        </div><br>
        <footer>
      <div class="row foot">
        <div class="col-lg-3 col-md-6 col-sm-12 ps-3">
          <h5>Contact Us</h5>
          <p>Address: Trishal,Mymensingh,Bangladesh</p>
          <p>Phone: 01853991419</p>
          <p>Email: tajul.cse.jkkniu@gmail.com</p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <h5>About Us</h5>
          <p>We offer the full spectrum of services to help organizations work better. Everything from creating standards of excellence to training your people to work in more effective ways, assessing how you’re doing, and helping you perform even better in future..</p>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <h5>Services</h5>
          <li class="s"><a href="#">Medical Consultation</a></li>
            <li class="s"><a href="#">Diagnostic Tests</a></li>
            <li class="s"><a href="#">Surgery</a></li>
            <li class="s"><a href="#">Emergency Care</a></li>
            <li class="s"><a href="#">Rehabilitation Services</a></li>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <h5>Follow Us</h5>
          <p>Connect with us on social media:</p>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="https://www.facebook.com/home.php" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="https://twitter.com/home" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
        <div>
      <p>Developed by Md. Tajul Islam</p>
          
          <!-- Copyright notice -->
          <p>&copy; ICON Medical. All rights reserved.</p>
      </div>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
 <script>
    var style=document.createElement('style')
         var position='right';
         style.innerHTML=`
         @Keyframes my-animation{
          0%{${position}:-${document.querySelector('.text').offsetWidth+8}px;}
          100%{${position}:100%;}
         }`;
         document.head.append(style);
 </script>

</body>
</html>