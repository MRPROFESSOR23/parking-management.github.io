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
        <a href="login.php" class="me-4 text-white text-decoration-none">Login</a>
        <span class="mx-3 text-white"> | </span>
        <a href="register.php" class="text-white text-decoration-none">Register</a>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark navbg ">
        <div class="container-fluid">
            <a class="navbar-brand fs-2 logoname" href="index.php">
                <img src="img/logo.png" alt="Robinson's mall logo" width="50" height="50" class="d-inline-block mx-3">
                Robinson's Place Ilocos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" aria-current="page" href="index.php"><i class="bi bi-house "></i> HOME </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="parkingarea.php"><i class="bi bi-truck "></i> PARKING AREA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold fs-5" href="about.php"><i class="bi bi-info-square "></i> ABOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Back to top button -->
        <button type="button" class="btn btn-floating btn-lg rounded-circle border" id="btn-back-to-top" title="Back to top" style="background-color: rgb(192, 17, 17);">
        <i class="bi bi-arrow-up-circle fs-5 text-white"></i>
    </button>
    <div class="container contents shadow-lg p-2 mt-5">
        <div class="container-fluid my-5">
                <h1 class="text-center fw-bold mb-5">Mall Hours</h1>
            <div class="d-flex flex-wrap justify-content-center my-5">
                <div class="card mx-3 mb-4 text-center" >
                    <h5 class="card-header tw-bold text-white" style="background-color: rgb(192, 17, 17);"><i class="fa-solid fa-bag-shopping"></i> Mall</h5>
                    <div class="card-body">
                        <h4 class="card-text">Monday - Sunday</h4>
                        <p>10:00 AM - 09:00 PM</p>
                    </div>
                </div> <br>
                <div class="card mb-4 mx-3 text-center" >
                    <h5 class="card-header tw-bold text-white" style="background-color: rgb(192, 17, 17);"><i class="fa-solid fa-cart-shopping"></i> Supermarket</h5>
                    <div class="card-body">
                        <h4 class="card-text">Monday - Sunday</h4>
                        <p>08:00 AM - 09:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-center my-5 fw-bold">Location</h1>
        <div class="container-fluid loc mb-5">
            <!-- <img src="img/map.png" alt="robinson's place ilocos" width="50%"> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3790.670737124662!2d120.5909653!3d18.1790757!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x338ec719770faf47%3A0x7511ca9341daa918!2sRobinsons%20Place%20Ilocos!5e0!3m2!1sen!2sph!4v1652719438070!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container-fluid mb-5 ms-5 fw-bold">
            <a><i class="bi bi-geo-alt fs-4"></i> Barangay 1 San Francisco, San Nicolas, Ilocos Norte</a><br>
            <a><i class="bi bi-telephone fs-4"></i> 8397-1888 local 36201</a>
        </div>

        <!-- instructions -->
        <div class="container p-5" style="width:75%; ">
            <h1 class="text-center my-5 fw-bold">How to Park in Robinson's Mall</h1><br>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 1</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Go to the Registration page.</div>
            </div>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 2</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Create an Account.</div>
            </div>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 3</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Login your Account.</div>
            </div>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 4</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Go to the Parking Entrance.</div>
            </div>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 5</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Give your Username\Plate Number to the Employee Incharge.</div>
            </div>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 6</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Check your Account to see your Slot Number.</div>
            </div>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 7</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Go to your designated Parking Slot.</div>
            </div>
            <div class="d-flex mb-4 w-100 border border-2"">
                <div class="p-3 w-25" style="background-color: rgb(192, 17, 17); color:white; text-align: center;">STEP 8</div>
                <div class="p-3 flex-grow-1" style="background-color: white; color:rgb(192, 17, 17);">Park your Vehicle.</div>
            </div>
        </div>
    </div>
    <script src="javascript.js"></script>
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