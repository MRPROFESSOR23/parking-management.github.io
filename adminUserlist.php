<?php 
    session_start();
    include'connect.php';
    
    if(!isset($_SESSION['Username'])){
        header("Location: login.php");
        die();
    }
    
    $sql = "SELECT R.ID, R.Username, R.Firstname, R.Lastname, R.Contact_No, R.Plate_No, V.Vehicle, R.Parking_Slot, S.status, R.Time_In, R.Time_Out, R.Date FROM registered_users AS R INNER JOIN vehicle AS V ON R.VehicleType_ID = V.VehicleType_ID INNER JOIN status AS S ON S.Status_ID = R.Status_ID";
    $result = mysqli_query($conn, $sql);
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
    <!-- table link -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" >


    <title>Robinson's mall | Parking Management</title>
</head>
<body class="mainContainer">
    <!-- navigation bar -->
    <div class="toplinks">
        <a class="me-4 text-white text-decoration-none" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark navbg ">
        <div class="container-fluid">
            <a class="navbar-brand fs-2 logoname" href="adminDashboard.php">
                <img src="img/logo.png" alt="Robinson's mall logo" width="50" height="50" class="d-inline-block mx-3">
                Robinson's Place Ilocos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link  fw-bold fs-5" aria-current="page" href="adminDashboard.php"><i class="bi bi-speedometer2"></i> DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="adminManage.php"><i class="fa-solid fa-pen-to-square"></i> MANAGE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold fs-5" href="adminUserlist.php"><i class="fa-regular fa-rectangle-list"></i> USER LIST</a>
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
        <h1 class="text-center fw-bold mb-5">History Information</h1>
        <div class="container mt-5 mb-2">
            <table id="list" class="display" style="width:100%"> 
            <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Plate Number</th>
                        <th>Vehicle Type</th>
                        <th>Parking Slot</th>
                        <th>Status</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- get all records in the database     -->
                    <?php
                        while($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['Username']; ?></td>
                                <td><?php echo $row['Firstname']; ?></td>
                                <td><?php echo $row['Lastname']; ?></td>
                                <td><?php echo $row['Contact_No']; ?></td>
                                <td><?php echo $row['Plate_No']; ?></td>
                                <td><?php echo $row['Vehicle']; ?></td>
                                <td><?php echo $row['Parking_Slot']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['Time_In']; ?></td>
                                <td><?php echo $row['Time_Out']; ?></td>
                                <td><?php echo $row['Date']; ?></td>
                            </tr> 
                        <?php
                        }
                    ?>  
                </tbody>
            </table>
            <form method="post" action="export.php">
                <input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
            </form>
        </div>
    </div>

    <script src="javascript.js"></script>

    <script>
        $(document).ready(function() {
            $('#list').DataTable( {
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                search: {
                    return: false
                },
                "scrollX": true
            } );
        } );
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