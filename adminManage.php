<?php 
    session_start();
    include'connect.php';

    if(!isset($_SESSION['Username'])){
        header("Location: login.php");
        die();
    }
    
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
    <!-- --- -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>
    <title>Robinson's mall | Parking Management</title>
</head>
<body class="mainContainer">
<?php 
// employee update button
    if(isset($_POST['Update'])){
        $ID = $_POST['Id'];
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];;
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];;
        $Age = $_POST['Age'];
        $Contact = $_POST['Contact'];;
        $Email = $_POST['Email'];
        $Province = $_POST['Province'];
        $Municipality = $_POST['Municipality'];
        $Barangay = $_POST['Barangay'];
        ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
            <?php
            $update = mysqli_query($conn, "UPDATE employees_account SET Username ='$Username', Password='$Password', firstname='$Firstname', lastname='$Lastname', Age='$Age', Contact_No='$Contact', Email='$Email', Province='$Province', Municipality='$Municipality', Barangay='$Barangay' WHERE Employee_ID='$ID'");?>
        </script>
        <?php
    }
// employee delete button
    if (isset($_POST['Delete'])){
        $id= $_POST['deleteID'];
        ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
            <?php $deletesql = "DELETE from employees_account WHERE Employee_ID='$id'";
            $delresult = mysqli_query($conn, $deletesql);?>
        </script>
        <?php
    }
// employee add button
    if(isset($_POST['Add'])){
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $convertedpass = md5($Password);
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Age = $_POST['Age'];
        $Contact = $_POST['Contact'];
        $Email = $_POST['Email'];
        $Province = $_POST['Province'];
        $Municipality = $_POST['Municipality'];
        $Barangay = $_POST['Barangay'];

        $findemployee = "SELECT * FROM employees_account WHERE Username = '$Username' OR Firstname = '$Firstname'";
        $checkemployee = mysqli_query($conn,$findemployee);
        $employeeexist = mysqli_num_rows($checkemployee);

        if ($employeeexist>0){?>
            <script>
                Swal.fire({
                    icon:'error',
                    title:'The Username or Firstname is already exist.',
                    showConfirmButton:true,
                })
            </script>
            <?php
        }
        else{
            $addemployee ="INSERT INTO employees_account (Username, Password, Firstname, Lastname, Age, Contact_No, Email, Province, Municipality, Barangay) VALUES('$Username', '$convertedpass', '$Firstname', '$Lastname', '$Age', '$Contact', '$Email', '$Province', '$Municipality', '$Barangay')";
            $addemployeeresult = mysqli_query($conn,$addemployee);

            if($addemployeeresult){?>
                <script>
                    Swal.fire({
                        icon:'success',
                        title:'Your data has been saved',
                        showConfirmButton:false,
                        timer:1500
                    })
                </script>
                <?php
            }
            else{
                die(mysqli_error($conn));
            }
        }
    }
// edit user button
    if(isset($_POST['UpdateUSER'])){
        $UserID = $_POST['USERId'];
        $UserUsername = $_POST['USERUsername'];
        $UserPassword = $_POST['USERPassword'];
        $ConvertedUserPassword = md5($UserPassword);
        $UserFirstname = $_POST['USERFirstname'];
        $UserLastname = $_POST['USERLastname'];
        $UserContact = $_POST['USERContact'];
        $UserPlate = $_POST['USERPlate_No'];
        $UserVehicle = $_POST['USERVehicletype'];

        ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
            <?php
            $updateUSER = mysqli_query($conn, "UPDATE users SET Username ='$UserUsername', Password='$ConvertedUserPassword', Firstname='$UserFirstname', Lastname='$UserLastname', Contact_No='$UserContact', Plate_No='$UserPlate', Vehicletype_ID='$UserVehicle' WHERE ID='$UserID'");?>
        </script>
        <?php
    }
// delete user button
    if (isset($_POST['USERDelete'])){
        $USERid= $_POST['USERdeleteID'];
        ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
            <?php $deletesql = "DELETE from users WHERE ID='$USERid'";
            $delresult = mysqli_query($conn, $deletesql);?>
        </script>
        <?php
    }
// add user button
    if(isset($_POST['AddUSER'])){
        $ADDUSERUsername = $_POST['AddUSERUsername'];
        $ADDUSERPassword = $_POST['AddUSERPassword'];
        $ADDUSERconvertedpass = md5($ADDUSERPassword);
        $ADDUSERFirstname = $_POST['AddUSERFirstname'];
        $ADDUSERLastname = $_POST['AddUSERLastname'];
        $ADDUSERContact = $_POST['AddUSERContact'];
        $ADDUSERPlate = $_POST['AddUSERPlate_No'];
        $ADDUSERVehicletype = $_POST['AddUSERVehicletype'];

        $findUSER = "SELECT * FROM users WHERE Username = '$ADDUSERUsername' OR Firstname = '$ADDUSERFirstname'";
        $checkusers = mysqli_query($conn,$findUSER);
        $userexist = mysqli_num_rows($checkusers);

        if ($userexist>0){?>
            <script>
                Swal.fire({
                    icon:'error',
                    title:'The Username or Firstname is already exist.',
                    showConfirmButton:true,
                })
            </script>
            <?php
        }
        else{
            $adduser ="INSERT INTO users (Username, Password, Firstname, Lastname, Contact_No, Plate_No, Vehicletype_ID) VALUES('$ADDUSERUsername', '$ADDUSERconvertedpass', '$ADDUSERFirstname', '$ADDUSERLastname', '$ADDUSERContact', '$ADDUSERPlate', '$ADDUSERVehicletype')";
            $adduserresult = mysqli_query($conn,$adduser);

            if($adduserresult){?>
                <script>
                    Swal.fire({
                        icon:'success',
                        title:'Your data has been saved',
                        showConfirmButton:false,
                        timer:1500
                    })
                </script>
                <?php
            }
            else{
                die(mysqli_error($conn));
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
                        <a class="nav-link active fw-bold fs-5" href="adminManage.php"><i class="fa-solid fa-pen-to-square"></i> MANAGE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fw-bold fs-5" href="adminUserlist.php"><i class="fa-regular fa-rectangle-list"></i> USER LIST</a>
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
        <div class="container mb-2">
            <!-- manage employees -->
            <h1 class="text-center fw-bold mb-5">Manage Employees</h1>
            <table id="employeelist" class="display" style="width:100%"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Province</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- get all records in the database     -->
                    <?php
                    $viewemployee= "SELECT * FROM employees_account";
                    $employeeresult = mysqli_query($conn, $viewemployee);
                    while($employeerow = mysqli_fetch_array($employeeresult)) { 
                        ?>
                        <tr>
                            <td><?php echo $employeerow['Employee_ID']; ?></td>
                            <td><?php echo $employeerow['Username']; ?></td>
                            <td><?php echo $employeerow['Password']; ?></td>
                            <td><?php echo $employeerow['Firstname']; ?></td>
                            <td><?php echo $employeerow['Lastname']; ?></td>
                            <td><?php echo $employeerow['Age']; ?></td>
                            <td><?php echo $employeerow['Contact_No']; ?></td>
                            <td><?php echo $employeerow['Email']; ?></td>
                            <td><?php echo $employeerow['Province']; ?></td>
                            <td><?php echo $employeerow['Municipality']; ?></td>
                            <td><?php echo $employeerow['Barangay']; ?></td>
                            <td><button type="button" value="<?php echo $employeerow['Employee_ID'];?>" class="btn btn-success Edit" ><i class="fa-solid fa-pen"></i></button></td>
                            <td><button type="button" value="<?php echo $employeerow['Employee_ID'];?>" class="btn btn-danger Delete" ><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr> 
                    <?php
                    }
                    ?>  
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee" ><i class="fa-solid fa-plus"></i> Add Employee</button>
            <br>
            <!-- manage users -->
            <h1 class="text-center fw-bold my-5">Manage Users</h1>
            <table id="list" class="display p-2" style="width:100%"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Plate Number</th>
                        <th>Vehicle Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- get all records in the database     -->
                    <?php
                    $viewusers= "SELECT U.ID, U.Username, U.Password, U.Firstname, U.Lastname, U.Contact_No, U.Plate_No, V.Vehicle FROM users AS U INNER JOIN vehicle AS V ON V.Vehicletype_ID = U.VehicleType_ID";
                    $usersresult = mysqli_query($conn, $viewusers);
                    while($usersrow = mysqli_fetch_array($usersresult)) { 
                        ?>
                        <tr>
                            <td><?php echo $usersrow['ID']; ?></td>
                            <td><?php echo $usersrow['Username']; ?></td>
                            <td><?php echo $usersrow['Password']; ?></td>
                            <td><?php echo $usersrow['Firstname']; ?></td>
                            <td><?php echo $usersrow['Lastname']; ?></td>
                            <td><?php echo $usersrow['Contact_No']; ?></td>
                            <td><?php echo $usersrow['Plate_No']; ?></td>
                            <td><?php echo $usersrow['Vehicle']; ?></td>
                            <td><button type="button" value="<?php echo $usersrow['ID'];?>" class="btn btn-success Edituser" ><i class="fa-solid fa-pen"></i></button></td>
                            <td><button type="button" value="<?php echo $usersrow['ID'];?>" class="btn btn-danger Deleteuser" ><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr> 
                    <?php
                    }
                    ?>  
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser" ><i class="fa-solid fa-plus"></i> Add User</button>
            <br>
        </div>
    </div>

<!-- Modal EDIT EMPLOYEE -->
    <div class="modal" id="edit" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Employee Information</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <!--Update Information-->
                        <input type="hidden" name="Id" id="update_empID">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="Username" id="update_username" class="form-control" value="<?php echo $employeerow['Username']; ?>" placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="Password" id="update_password" class="form-control" value="<?php echo $employeerow['Password']; ?>" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="Firstname" id="update_fname" class="form-control" value="<?php echo $employeerow['Firstname']; ?>" placeholder="First Name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="Lastname" id="update_lname" class="form-control" value="<?php echo $employeerow['Lastname']; ?>" placeholder="Last Name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="text" name="Age" id="update_age" class="form-control" value="<?php echo $employeerow['Age']; ?>" placeholder="Age" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="number" name="Contact" id="update_contact" class="form-control" value="<?php echo $employeerow['Contact_No']; ?>" placeholder="Contact Number" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="Email" id="update_email" class="form-control" value="<?php echo $employeerow['Email']; ?>" placeholder="sample@email.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Province</label>
                            <input type="text" name="Province" id="update_province" class="form-control" value="<?php echo $employeerow['Province']; ?>" placeholder="Province" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Municipality</label>
                            <input type="text" name="Municipality" id="update_municipality" class="form-control" value="<?php echo $employeerow['Municipality']; ?>" placeholder="Municipality" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Barangay</label>
                            <input type="text" name="Barangay" id="update_barangay" class="form-control" value="<?php echo $employeerow['Barangay']; ?>" placeholder="Barangay" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Update" >Update</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a>Cancel</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal DELETE EMPLOYEE -->
    <div class="modal" id="del" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Delete</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="deleteID" class="delete_ID">
                            <h5>Are you sure you want to delete?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Delete" >Yes</button></a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Modal ADD EMPLOYEE -->
    <div class="modal" id="addEmployee" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Employee</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <!--Add Employee-->
                        <div class="row g-2 mb-4 mt-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="Username" class="form-control" id="username"  placeholder="Username" required>
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" name="Password" class="form-control" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="Firstname" class="form-control" id="firstname" placeholder="First Name" required>
                                    <label for="firstname">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="Lastname" class="form-control" id="lastname" placeholder="Last Name" required>
                                    <label for="lastname">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="Age" class="form-control" id="age" placeholder="Age" required>
                                    <label for="age">Age</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" name="Contact" class="form-control" id="contact" placeholder="Contact Number"  min="11" max="11" required>
                                    <label for="contact">Contact Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="Email" class="form-control" id="email" placeholder="sample@email.com" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="Province" class="form-control" id="province" placeholder="Province" required>
                                    <label for="province">Province</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="Municipality" class="form-control" id="municipality" placeholder="Municipality" required>
                                    <label for="municipality">Municipality</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="Barangay" class="form-control" id="barangay" placeholder="Barangay" required>
                                    <label for="barangay">Barangay</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Add" >Add</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a>Cancel</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- Modal EDIT USER -->
    <div class="modal" id="edituser" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit User Information</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body row g-3 mb-4 mt-2">
                        <!--Update Information-->
                        <input type="hidden" name="USERId" id="update_USERID">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="USERUsername" id="update_USERusername" class="form-control" value="<?php echo $usersrow['Username']; ?>" placeholder="Username" required>
                                <label for="update_USERusername">Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" name="USERPassword" id="update_USERpassword" class="form-control" value="<?php echo $usersrow['Password']; ?>" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                <label for="update_USERpassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="USERFirstname" id="update_USERfname" class="form-control" value="<?php echo $usersrow['Firstname']; ?>" placeholder="First Name" required>
                                <label for="update_USERfname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="USERLastname" id="update_USERlname" class="form-control" value="<?php echo $usersrow['Lastname']; ?>" placeholder="Last Name" required>
                                <label for="update_USERlname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" name="USERContact" id="update_USERcontact" class="form-control" value="<?php echo $usersrow['Contact_No']; ?>" placeholder="Contact Number" required>
                                <label for="update_USERcontact">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="USERPlate_No" id="update_USERplate" class="form-control" value="<?php echo $usersrow['Plate_No']; ?>" placeholder="Plate Number" required>
                                <label for="update_USERplate">Plate Number</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <select class="form-select" name="USERVehicletype" id="update_USERvehicle" aria-label="Floating label select example" required>
                                    <option selected>Choose...</option>
                                    <option value="1">Two-Wheeled</option>
                                    <option value="2">Four-Wheeled</option>
                                </select>
                                <label for="update_USERvehicle">Vehicle type</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="UpdateUSER" >Update</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a>Cancel</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal EDELETE USER -->
    <div class="modal" id="delUSER" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Delete User</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="USERdeleteID" class="deleteuser_ID">
                        <h5>Are you sure you want to delete?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="USERDelete" >Yes</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal ADD USER -->
    <div class="modal" id="addUser" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add User</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <!--Add User-->
                        <div class="row g-2 mb-4 mt-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="AddUSERUsername" id="add_USERusername" class="form-control"  placeholder="Username" required>
                                    <label for="add_USERusername">Username</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" name="AddUSERPassword" id="add_USERpassword" class="form-control"  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <label for="add_USERpassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="AddUSERFirstname" id="add_USERfname" class="form-control"  placeholder="First Name" required>
                                    <label for="add_USERfname">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="AddUSERLastname" id="add_USERlname" class="form-control" placeholder="Last Name" required>
                                    <label for="add_USERlname">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" name="AddUSERContact" id="add_USERcontact" class="form-control"  placeholder="Contact Number" required>
                                    <label for="add_USERcontact">Contact Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="AddUSERPlate_No" id="add_USERplate" class="form-control"  placeholder="Plate Number" required>
                                    <label for="add_USERplate">Plate Number</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="AddUSERVehicletype" id="add_USERvehicle" aria-label="Floating label select example" required>
                                        <option value="1">Two-Wheeled</option>
                                        <option value="2">Four-Wheeled</option>
                                    </select>
                                    <label for="add_USERvehicle">Vehicle type</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="AddUSER" >Add</button></a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a>Cancel</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="javascript.js"></script>

<!-- javascript -->
    <script>
        $(document).ready(function() {
            $('#employeelist').DataTable( {
                "lengthMenu": [[25, 50, 75, 100, -1], [25, 50, 75, 100, "All"]],
                search: {
                    return: false
                },
                "scrollX": true
            } );
            $('#list').DataTable( {
                scrollY: '500px',
                scrollCollapse: true,
                paging: false,
                search: {
                    return: false
                },
            } );
        } );
        //update button
        $(document).ready(function() {
            $('.Edit').click(function() {

                $('#edit').modal('show');
                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_empID').val(data[0]);
                    $('#update_username').val(data[1]);
                    $('#update_password').val(data[2]);
                    $('#update_fname').val(data[3]);
                    $('#update_lname').val(data[4]);
                    $('#update_age').val(data[5]);
                    $('#update_contact').val(data[6]);
                    $('#update_email').val(data[7]);
                    $('#update_province').val(data[8]);
                    $('#update_municipality').val(data[9]);
                    $('#update_barangay').val(data[10]);
            });
        } );
        //delete Button
        $(document).ready(function() {
            $('.Delete').click(function(e) {
                e.preventDefault();

                var EmpID = $(this).val();
                $('.delete_ID').val(EmpID);
                $('#del').modal('show');
            });
        });
        //user edit button
        $(document).ready(function() {
            $('.Edituser').click(function() {

                $('#edituser').modal('show');
                    $Usertr = $(this).closest('tr');

                    var Userdata = $Usertr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(Userdata);

                    $('#update_USERID').val(Userdata[0]);
                    $('#update_USERusername').val(Userdata[1]);
                    $('#update_USERpassword').val(Userdata[2]);
                    $('#update_USERfname').val(Userdata[3]);
                    $('#update_USERlname').val(Userdata[4]);
                    $('#update_USERcontact').val(Userdata[5]);
                    $('#update_USERplate').val(Userdata[6]);
                    $('#update_USERvehicle').val(Userdata[7]);
            });
        } );
        //delete Button
        $(document).ready(function() {
            $('.Deleteuser').click(function(d) {
                d.preventDefault();

                var UserID = $(this).val();
                $('.deleteuser_ID').val(UserID);
                $('#delUSER').modal('show');
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