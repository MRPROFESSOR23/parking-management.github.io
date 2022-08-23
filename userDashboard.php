<?php 
    session_start();
    include'connect.php';

    if(!isset($_SESSION['Fname'])){
        header("Location: login.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- logo -->
    <link href = "img/logo.png" rel="icon" type="image/png">
    <!-- style -->
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- fontawesome icons link -->
    <script src="https://kit.fontawesome.com/39d40ed88e.js" crossorigin="anonymous"></script>

    <title>Robinson's mall | Parking Management</title>
</head>
<body class="mainContainer">
    <!-- navigation bar -->
    <div class="toplinks">
        <a class="me-4 text-white text-decoration-none" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark navbg ">
        <div class="container-fluid">
            <a class="navbar-brand fs-2 logoname" href="userDashboard.php">
                <img src="img/logo.png" alt="Robinson's mall logo" width="50" height="50" class="d-inline-block mx-3">
                Robinson's Place Ilocos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold fs-5" aria-current="page" href="#"><i class="bi bi-speedometer2"></i> DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bold fs-5" href="userParkingarea.php"><i class="bi bi-truck "></i> PARKING AREA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="findVehicle.php"><i class="bi bi-search"></i> FIND VEHICLE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Back to top button -->
        <button type="button" class="btn btn-floating btn-lg rounded-circle border" id="btn-back-to-top" title="Back to top" style="background-color: rgb(192, 17, 17);">
        <i class="bi bi-arrow-up-circle fs-5 text-white"></i>
    </button>
    <div class="container contents shadow-lg p-5 mt-5">
        <h1 class="text-center fw-bold mb-3">Dashboard</h1><br>
        <div class="container-fluid">
            <h3 class="fw-bold my-5">User's Detail</h3>
            <table class="fs-5">
                <tr>
                    <td class="fw-bold" width='200px'>Username:</td>
                    <td><span class="username"><?php echo $_SESSION['Username'];?></span></td>
                </tr>
                <tr>
                    <td class="fw-bold" width='200px'>Password:</td>
                    <td>
                        <i id="emoj" class="bi bi-eye-slash" title="Show password" aria-hidden="true"></i></button>
                        <input type="password" class="bg-transparent text-dark border-0 ms-2" id="encryptedpassword" value="<?php echo $_SESSION['Password'];?>">
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold" width='200px'>First Name:</td>
                    <td><span class="firstname"><?php echo $_SESSION['Fname'];?></span></td>
                </tr>
                <tr>
                    <td class="fw-bold" width='200px'>Last Name:</td>
                    <td><span class="lastname"><?php echo $_SESSION['Lname'];?></span></td>
                </tr>
                <tr>
                    <td class="fw-bold" width='200px'>Contact Number:</td>
                    <td><span class="contactnumber"><?php echo $_SESSION['Contact'];?></span></td>
                </tr>
                <tr>
                    <td class="fw-bold" width='200px'>Plate Number:</td>
                    <td><span class="platenumber"><?php echo $_SESSION['Plate_No'];?></span></td>
                </tr>
                <tr>
                    <td class="fw-bold" width='200px'>Vehicle Type:</td>
                    <td><span class="vehicletype"><?php echo $_SESSION['Vehicle_Type'];?></span></td>
                </tr>
                <tr>
                    <td class="fw-bold" width='200px'>Slot Number:</td>
                    <td><span class="slotnumber"><?php echo $_SESSION["Slot"];?></span></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="javascript.js"></script>
    <script>

        const togglePassword = document.querySelector("#emoj");
        const password = document.querySelector("#encryptedpassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
    <footer style="width:100%; position:static; background-color: rgb(192, 17, 17); color:white; margin-top:5%;">
        <!-- Grid container -->
        <div class="container p-4">
            <div class="row">
                
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Contact Us</h5>
                    <p style="margin-bottom:px;"><i class="fa-solid fa-location-dot fs-4"></i> Barangay. 1, San Francisco, San Nicolas, Ilocos Norte</p>
                    <p style="margin-bottom:px;"><i class="fa-solid fa-phone fs-4"></i> 8397-1888 local 36201</p>
                    <div style="display: flex; flex-direction: row; flex-wrap:wrap;">
                        <i class="fa-solid fa-envelope fs-4" style="margin-right:8px; margin-top:25px;"></i> 
                        <ul class="list-unstyled mb-0">
                            <li>
                                <span>roldanfiesta03@gmail.com</span>
                            </li>
                            <li>
                                <span>justinramos094@gmail.com</span>
                            </li>
                            <li>
                                <span>johnkennethvocal1202@gmail.com</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">About Us</h5>
                    <p style="text-align:justify;">
                    This web application aims to support Robinson’s Mall Ilocos in achieving a parking management system that organizes all vehicles in the proper location. Also, it aims to give security, safety, and privacy in preventing unauthorized access to the parking lots.
                    </p>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <i class="fa-regular fa-copyright"></i> 2022 Copyright: <strong>RF.JR.JV</strong>
        </div>
    </footer>
</body>
</html>