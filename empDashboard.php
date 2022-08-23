<?php 
    session_start();
    include'connect.php';

    if(!isset($_SESSION['Username'])){
        header("Location: login.php");
        die();
    }
    // $sql = "SELECT ID, Username, Firstname, Lastname, Contact_No, Plate_No, Vehicletype_ID FROM registered";
    // $result = mysqli_query($conn, $sql);
    $sql = "SELECT R.ID, R.Username, R.Firstname, R.Lastname, R.Contact_No, R.Plate_No, V.Vehicle FROM users AS R INNER JOIN vehicle AS V ON R.vehicletype_ID = V.vehicletype_ID";
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

    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>
    <title>Robinson's mall | Parking Management</title>
</head>
<body class="mainContainer">
<?php
    if (isset($_GET['Yes'])){
        $id= $_GET['popupIn_ID'];
        date_default_timezone_set("Asia/Manila");
        $time = date("h:i:s A");
        $date = date("Y-m-d");

        $view = "SELECT * FROM users WHERE ID = $id";
        $useresult = mysqli_query($conn, $view);

        while($registeredrow = mysqli_fetch_array($useresult)) {
            $Username = $registeredrow['Username'];
            $Password = $registeredrow['Password'];
            $Firstname = $registeredrow['Firstname'];
            $Lastname = $registeredrow['Lastname']; 
            $Contact_No = $registeredrow['Contact_No']; 
            $Plate_No = $registeredrow['Plate_No']; 
            $Vehicletype_ID = $registeredrow['VehicleType_ID'];

            //check the vehicle type(two wheeled vehicles)
            if($Vehicletype_ID == 1){
                $rowcount = "SELECT COUNT(*) AS C FROM firstfloor_users";
                $rowcountresult = mysqli_query($conn, $rowcount);
                $rowresult = mysqli_fetch_assoc($rowcountresult)['C'];
                // check the number of slot in firstfloor
                if($rowresult < 40){
                    $verify = "SELECT * FROM firstfloor_users WHERE Username = '$Username' OR Firstname = '$Firstname'";
                    $verifysql = mysqli_query($conn, $verify);
                    $count = mysqli_num_rows($verifysql);
                    if($count>0){
                        ?> 
                        <script>
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Oops..',
                                text: "You've already made a parking reservation.",
                                showConfirmButton: true,
                            })
                        </script>
                        <?php
                    }else{
                        $sql = "SELECT * FROM parking_area ORDER BY Parking_Slot ASC";
                        $query = $conn->query($sql);
                        while ( $row = $query->fetch_array() ) {
                            if( substr( $row['Parking_Slot'], 0, 1 ) == '1' && $row['Parking_Status'] == true) {
                                $assigned_Parking_Slot = $row['Parking_ID'];
                                break;
                            };
                        };
                        if ($conn->query("UPDATE parking_area SET Parking_Status = false, Parked_Vehicle = '$id' WHERE Parking_ID = $assigned_Parking_Slot") === TRUE) {
                            $viewparkingdata = "SELECT * FROM parking_area WHERE Parking_ID = $assigned_Parking_Slot";
                            $slotdataresult = mysqli_query($conn, $viewparkingdata);
        
                            while($slotdatarow = mysqli_fetch_array($slotdataresult)) {
                                $slot = $slotdatarow['Parking_Slot'];
                                $addinFirstfloor =mysqli_query($conn, "INSERT INTO firstfloor_users (`Username`, `Password`, `Firstname`, `Lastname`, `Contact_Number`, `Plate_Number`, `VehicleType_ID`, `Parking_Slot`,`Status_ID`) VALUES ('$Username', '$Password', '$Firstname','$Lastname',' $Contact_No','$Plate_No','$Vehicletype_ID', '$slot', 1)");
                            };
                            // add in registered users table
                            $add =mysqli_query($conn, "INSERT INTO registered_users (`Username`, `Password`, `Firstname`, `Lastname`, `Contact_No`, `Plate_No`, `VehicleType_ID`, `Parking_Slot`, `Status_ID`,  `Time_In`, `Time_Out`, `Date`) VALUES ('$Username', '$Password', '$Firstname','$Lastname',' $Contact_No','$Plate_No','$Vehicletype_ID', '$slot',  1, '$time', '', '$date')");
                            //update user table
                            $update = mysqli_query($conn, "UPDATE users SET Slot='$slot' WHERE Username = '$Username' OR Firstname = '$Firstname'");
                            ?> 
                                <script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                </script>
                            <?php
                            echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                        }
                        else {
                            echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                        }
                    }
                }else{
                    ?> 
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Oops..',
                            text: "There are no parking spaces available for a two-wheeled vehicle.",
                            showConfirmButton: true,
                        })
                    </script>
                    <?php
                }
            }
            //check the vehicle type(four wheeled vehicles)
            if($Vehicletype_ID == 2){
                // check the number of slot in second & third floor
                $SecThirdrowcount = "SELECT COUNT(*) AS c FROM sec_third_floor";
                $SecThirdrowcountresult = mysqli_query($conn, $SecThirdrowcount);
                $SecThirdrowresult = mysqli_fetch_assoc($SecThirdrowcountresult)['c'];
                // check the number of slot in firstfloor
                if($SecThirdrowresult < 80){
                    $verifyuser = "SELECT * FROM sec_third_floor WHERE Username = '$Username' OR Firstname = '$Firstname'";
                    $verifyusersql = mysqli_query($conn, $verifyuser);
                    $countuser = mysqli_num_rows($verifyusersql);
                    if($countuser>0){
                        ?> 
                        <script>
                            Swal.fire({
                                position: 'center',
                                icon: 'warning',
                                title: 'Oops..',
                                text: "You've already made a parking reservation.",
                                showConfirmButton: true,
                            })
                        </script>
                        <?php
                    }else{
        
                        $sql = "SELECT * FROM parking_area ORDER BY Parking_Slot ASC";
                        $query = $conn->query($sql);
        
                        while ( $row = $query->fetch_array() ) {
                            if( (substr( $row['Parking_Slot'], 0, 1 ) == '2' && $row['Parking_Status'] == true) || (substr( $row['Parking_Slot'], 0, 1 ) == '3' && $row['Parking_Status'] == true)) {
                                $assigned_Parking_Slot = $row['Parking_ID'];
                                break;
                            };
                        };
                        if ($conn->query("UPDATE parking_area SET Parking_Status = false, Parked_Vehicle = '$id' WHERE Parking_ID = $assigned_Parking_Slot") === TRUE) {
                            $viewparkingdata = "SELECT * FROM parking_area WHERE Parking_ID = $assigned_Parking_Slot";
                            $slotdataresult = mysqli_query($conn, $viewparkingdata);
                            while($slotdatarow = mysqli_fetch_array($slotdataresult)) {
                                $parkingslot = $slotdatarow['Parking_Slot'];
                                $addinSecThirdfloor =mysqli_query($conn, "INSERT INTO sec_third_floor (`Username`, `Password`, `Firstname`, `Lastname`, `Contact_Number`, `Plate_Number`, `VehicleType_ID`, `Parking_Slot`,`Status_ID`) VALUES ('$Username', '$Password', '$Firstname','$Lastname',' $Contact_No','$Plate_No','$Vehicletype_ID', '$parkingslot', 1)");
                            };
                            // add in registered users table
                            $add =mysqli_query($conn, "INSERT INTO registered_users (`Username`, `Password`, `Firstname`, `Lastname`, `Contact_No`, `Plate_No`, `VehicleType_ID`, `Parking_Slot`, `Status_ID`, `Time_In`, `Time_Out`, `Date`) VALUES ('$Username', '$Password', '$Firstname','$Lastname',' $Contact_No','$Plate_No','$Vehicletype_ID', '$parkingslot', 1, '$time', '', '$date')");
                            //update user table
                            $update = mysqli_query($conn, "UPDATE users SET Slot='$parkingslot' WHERE Username = '$Username' OR Firstname = '$Firstname'");
                            ?> 
                                <script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                </script>
                            <?php
                            echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                        }
                        else {
                            echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                        }
                    }
                }else{
                    ?> 
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Oops..',
                            text: "There are no parking spaces available for a two-wheeled vehicle.",
                            showConfirmButton: true,
                        })
                    </script>
                    <?php
                }
            }
        }
    }
    //popup OUT
    if (isset($_GET['YesOUT'])){
        $outuserid= $_GET['popupOUT_ID'];

        date_default_timezone_set("Asia/Manila");
        $time = date("h:i:s A");
        $date = date("Y-m-d");

        $viewdata = "SELECT * FROM users WHERE ID = $outuserid";
        $userdataresult = mysqli_query($conn, $viewdata);

        while($datarow = mysqli_fetch_array($userdataresult)) {
            $username = $datarow['Username'];
            $password = $datarow['Password'];
            $firstname = $datarow['Firstname'];
            $lastname = $datarow['Lastname']; 
            $contact_No = $datarow['Contact_No']; 
            $plate_No = $datarow['Plate_No']; 
            $vehicletype_ID = $datarow['VehicleType_ID']; 

            //check the vehicle type(two wheeled vehicles)
            if($vehicletype_ID == 1){
                $rowcountOUT = "SELECT COUNT(*) AS cnt FROM firstfloor_users";
                $rowcountresultOUT = mysqli_query($conn, $rowcountOUT);
                $rowresultOUT = mysqli_fetch_assoc($rowcountresultOUT)['cnt'];

                $OUTverify = "SELECT * FROM firstfloor_users WHERE Username = '$username' OR Firstname = '$firstname'";
                $OUTverifysql = mysqli_query($conn, $OUTverify);
                $OUTcount = mysqli_num_rows($OUTverifysql);
                if($OUTcount>0){
                    $sql = "SELECT * FROM parking_area ORDER BY Parking_Slot ASC";
                    $query = $conn->query($sql);

                    while ( $row = $query->fetch_array() ) {
                        if( substr( $row['Parking_Slot'], 0, 1 ) == '1' && $row['Parked_Vehicle'] == $outuserid) {
                            $assigned_Parking_Slot = $row['Parking_ID'];
                            break;
                        };
                    };
                    if ($conn->query("UPDATE parking_area SET Parking_Status = true, Parked_Vehicle = 'Available' WHERE Parking_ID = $assigned_Parking_Slot") === TRUE) {
                        $viewparkingdata = "SELECT * FROM parking_area WHERE Parking_ID = $assigned_Parking_Slot";
                        $slotdataresult = mysqli_query($conn, $viewparkingdata);
                        while($slotdatarow = mysqli_fetch_array($slotdataresult)) {
                            $parkingslot = $slotdatarow['Parking_Slot'];
                            // update data in registered users table
                            $update = mysqli_query($conn, "UPDATE registered_users SET Username='$username', Password='$password', Firstname='$firstname', Lastname='$lastname', Contact_No='$contact_No', Plate_No='$plate_No', VehicleType_ID='$vehicletype_ID', Parking_Slot='$parkingslot', Status_ID=2, Time_Out='$time', Date='$date' WHERE Username = '$username' OR Firstname = '$firstname'");
                            //update user table
                            $update = mysqli_query($conn, "UPDATE users SET Slot='none' WHERE Username = '$username' OR Firstname = '$firstname'");
                            //remove data in firstfloor table
                            $removeUSER = "DELETE from firstfloor_users WHERE Username = '$username' OR Firstname = '$firstname'";
                            $removeUSERresult = mysqli_query($conn, $removeUSER);
                            if ($removeUSERresult){
                                ?> 
                                <script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                </script>
                                <?php
                            }
                            echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                        };
                    }
                    else {
                        echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                    }
                }else{
                    ?> 
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Oops..',
                            text: "You must first find a parking spot.",
                            showConfirmButton: true,
                        })
                    </script>
                    <?php
                }
            }
            //check the vehicle type(four wheeled vehicles)
            if($vehicletype_ID == 2){
                // check the number of slot in second & third floor
                $OUTSecThirdrowcount = "SELECT COUNT(*) AS Cnt FROM sec_third_floor";
                $OUTSecThirdrowcountresult = mysqli_query($conn, $OUTSecThirdrowcount);
                $OUTSecThirdrowresult = mysqli_fetch_assoc($OUTSecThirdrowcountresult)['Cnt'];

                $OUTverifyuser = "SELECT * FROM sec_third_floor WHERE Username = '$username' OR Firstname = '$firstname'";
                $OUTverifyusersql = mysqli_query($conn, $OUTverifyuser);
                $OUTcountuser = mysqli_num_rows($OUTverifyusersql);
                if($OUTcountuser>0){
                    $sql = "SELECT * FROM parking_area ORDER BY Parking_Slot ASC";
                    $query = $conn->query($sql);

                    while ( $row = $query->fetch_array() ) {
                        if( (substr( $row['Parking_Slot'], 0, 1 ) == '2' && $row['Parked_Vehicle'] == $outuserid) || (substr( $row['Parking_Slot'], 0, 1 ) == '3' && $row['Parked_Vehicle'] == $outuserid)) {
                            $assigned_Parking_Slot = $row['Parking_ID'];
                            break;
                        };
                    };
                    if ($conn->query("UPDATE parking_area SET Parking_Status = true, Parked_Vehicle = 'Available' WHERE Parking_ID = $assigned_Parking_Slot") === TRUE) {
                        $viewparkingdata = "SELECT * FROM parking_area WHERE Parking_ID = $assigned_Parking_Slot";
                        $slotdataresult = mysqli_query($conn, $viewparkingdata);
                        while($slotdatarow = mysqli_fetch_array($slotdataresult)) {
                            $parkingslot = $slotdatarow['Parking_Slot'];
                            // update data in registered users table
                            $update = mysqli_query($conn, "UPDATE registered_users SET Username='$username', Password='$password', Firstname='$firstname', Lastname='$lastname', Contact_No='$contact_No', Plate_No='$plate_No', VehicleType_ID='$vehicletype_ID', Status_ID=2, Time_Out='$time', Date='$date' WHERE Username = '$username' OR Firstname = '$firstname'");
                            //update user table
                            $update = mysqli_query($conn, "UPDATE users SET Slot='none' WHERE Username = '$username' OR Firstname = '$firstname'");
                            //remove data in second&third floor table
                            $removeUSER = "DELETE from sec_third_floor WHERE Username = '$username' OR Firstname = '$firstname'";
                            $removeUSERresult = mysqli_query($conn, $removeUSER);
                            if ($removeUSERresult){
                                ?> 
                                <script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                </script>
                                <?php
                            }
                            echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                        };
                    }
                    else {
                        echo "<meta http-equiv='refresh' content='0;url=empDashboard.php'>";
                    }

                }else{
                    ?> 
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Oops..',
                            text: "You must first find a parking spot.",
                            showConfirmButton: true,
                        })
                    </script>
                    <?php
                }
            }
        }
    }
?>

<!-- navigation bar -->
    <div class="toplinks">
        <a class="me-4 text-white text-decoration-none" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark navbg ">
        <div class="container-fluid">
            <a class="navbar-brand fs-2 logoname" href="empDashboard.php">
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
                        <a class="nav-link fw-bold fs-5" href="empFindvehicle.php"><i class="bi bi-search"></i> FIND VEHICLE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bold fs-5" href="userlist.php"><i class="fa-regular fa-rectangle-list"></i> USER LIST</a>
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
        <h1 class="text-center fw-bold mb-5">Find User</h1>
        <div class="container mt-5 mb-2">
            <div id="demo_info" class="box"></div>
            <table id="list" class="display" style="width:100%"> 
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Plate Number</th>
                        <th>Vehicle Type</th>
                        <th>Action</th> 
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
                                <td>
                                    <button type="button" id="in" value="<?php echo $row['ID'];?>" class="btn btn-success In" name="In">In</button>
                                    <button type="button" id="out" value="<?php echo $row['ID'];?>" class="btn btn-danger Out" name="Out">Out</button>
                                </td>
                            </tr> 
                        <?php
                        }
                    ?>  
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal IN -->
    <div class="modal" id="popupIN" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Parking</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" name="popupIn_ID" class="popupIn">
                        <h5>Are you sure you want to park?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Yes" >Yes</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal OUT -->
    <div class="modal" id="popupOUT" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Parking</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" name="popupOUT_ID" class="popupOut">
                        <h5>Are you sure you want to Out?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="YesOUT" >Yes</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="javascript.js"></script>

    <script>
        $(document).ready(function() {
            $('#list').DataTable( {
                scrollY: '500px',
                scrollCollapse: true,
                paging: false,
                search: {
                    return: false
                },
                "scrollX": true
            } );
        } );
        $(document).ready(function() {
            $('.In').click(function(e) {
                e.preventDefault();

                var userID = $(this).val();
                $('.popupIn').val(userID);
                $('#popupIN').modal('show');
            });
            $('.Out').click(function(o) {
                o.preventDefault();

                var getuserID = $(this).val();
                $('.popupOut').val(getuserID);
                $('#popupOUT').modal('show');
            });
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