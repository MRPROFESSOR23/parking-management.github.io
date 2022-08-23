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

    <style>
        .box{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 100;
            background: rgba(0, 0, 0, 0.532);
        }
        @font-face {
            font-family: "Rightland";
            src: url(font/Rightland.otf);
        }
        .popup{
            position: fixed;
            background-color: rgb(192, 17, 17);
            width: 70%;
            text-align: center;
            color:white;
            padding: 30px 40px;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
            border-radius: 10px;
            border: 3px solid rgb(192, 17, 17);
            box-shadow: 5px 5px 5px black;
        }
        .popup button{
            display: block;
            margin: -30px 0 10px auto;
            background-color: transparent;
            font-size: 40px;
            color: white;
            border: none;
            outline: none;
            cursor: pointer;
        }
        .popup h1{
            font-family: Rightland;
            word-spacing: 5px;
            letter-spacing: 3px;
            font-weight: bold;
            font-size: 70px;
        }
    </style>
</head>
<body class="mainContainer">
    <!-- navigation bar -->
    <div class="d-flex flex-row-reverse p-1" style="background-color:rgb(192, 17, 17); border-bottom: 3px solid white;">
        <a href="login.php" class="me-4 text-white text-decoration-none">Login</a>
        <span class="mx-3 text-white"> | </span>
        <a href="register.php" class="text-white text-decoration-none">Register</a>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark navbg " >
        <div class="container-fluid">
            <a class="navbar-brand fs-2 logoname" href="#">
                <img src="img/logo.png" alt="Robinson's mall logo" width="50" height="50" class="d-inline-block mx-3">
                Robinson's Place Ilocos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold fs-5" aria-current="page" href="#"><i class="bi bi-house " ></i> HOME </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="parkingarea.php"><i class="bi bi-truck "></i> PARKING AREA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="about.php"><i class="bi bi-info-square "></i> ABOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Back to top button -->
    <button type="button" class="btn btn-floating btn-lg rounded-circle border" id="btn-back-to-top" title="Back to top" style="background-color: rgb(192, 17, 17);">
        <i class="bi bi-arrow-up-circle fs-5 text-white"></i>
    </button>
    <!-- body -->
    <div class="container contents shadow-lg p-3 mt-5">
        <div class="container-fluid mb-5" style="padding: 0 20%;"">
            <h1 class="text-center my-5 fw-bold">Robinson's Place Ilocos</h1>
            <!-- robinson place pictures -->
            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/robinson's place.png" class="robinson-Place d-block w-100" height="30%"  alt="Robinson's Place Ilocos">
                    </div>
                    <div class="carousel-item">
                        <img src="img/robinson's place1.jpg" class="robinson-Place d-block w-100" height="30%"  alt="Robinson's Place Ilocos">
                    </div>
                    <div class="carousel-item">
                        <img src="img/robinson's place2.jpg" class="robinson-Place d-block w-100" height="30%"  alt="Robinson's Place Ilocos">
                    </div>
                    <div class="carousel-item">
                        <img src="img/robinson's place.jpg" class="robinson-Place d-block w-100" height="30%"  alt="Robinson's Place Ilocos">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="container p-3 mb-5" >
            <div class="container-fluid">
                <h3 class="text-center fw-bold mb-5">About Robinson's Ilocos</h3>
                <p class="text-wrap lh-lg" style="text-align:justify; text-indent:3rem;">In a prosperous region where time-honored Filipino heritage continues to hold its ground, Robinsons Ilocos is the place where tradition and modernity meet. Spanning a total floor area of approximately 22,220 square meters, it proudly stands as Robinsons Land Corporation's first foray in the Ilocandia region -- in fact, the first one-stop-shop mall to arise in the province. This two-level modern shopping mall offers delightful dining and shopping choices that suit the taste and preferences of both tourists and the Ilocano community. Since it started its operations in December 2009, Robinsons Ilocos has become the shopping and entertainment destination to over half a million Ilocanos that populate Ilocos Norte and its neighboring towns. Its spacious interiors have provided a place not only for the coming together of families and friends but also in bringing in the Robinsons Mall's brand of world-class malling right at the doorsteps of the Ilocandia region.</p>
            </div>
        </div>

    </div>
    <div class="box">
        <div class="popup">
            <button id="close" title="Close">&times;</button>
            <h1>Welcome to Robinson's Mall Ilocos</h1>
            <h3>Parking Management System</h3>
        </div>
    </div>
    <script src="javascript.js"></script>
    <script>
        //popup
        document.querySelector('#close').addEventListener('click', function(){
        document.querySelector('.popup').style.display = 'none';
        document.querySelector('.box').style.display = 'none';
        })
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