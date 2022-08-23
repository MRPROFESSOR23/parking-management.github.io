<?php 
    include 'connect.php';
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
    <!-- fontawesome icons link -->
    <script src="https://kit.fontawesome.com/39d40ed88e.js" crossorigin="anonymous"></script>
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>

    <title>Robinson's mall | Parking Management</title>
</head>
<style>
    .goBack {
        color:rgb(192, 17, 17);
        font-size:25px; 
        font-weight:bold;
    }
    .goBack:hover {
        color:darkred;
    }
</style>
<body  class="mainContainer py-5">
<?php
    if(isset($_POST['register'])){
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $convertedpass = md5($password);
        $firstname = $_POST['Fname'];
        $lastname = $_POST['Lname'];
        $contactNo = $_POST['Contact'];
        $plateNo = $_POST['PlateNo'];
        $vehicleType = $_POST['Vehicletype'];


        $finduser = "SELECT * FROM users WHERE Username = '$username' OR Firstname = '$firstname' OR Plate_No = '$plateNo'";
        $check = mysqli_query($conn,$finduser);
        $exist = mysqli_num_rows($check);

        if ($exist>0){?>
            <script>
                Swal.fire({
                    icon:'error',
                    title:'The Username or Plate Number is already exist.',
                    showConfirmButton:true,
                })
            </script>
            <?php
        }
        else{
            $sql ="INSERT INTO users (Username, Password, Firstname, Lastname, Contact_No, Plate_No, VehicleType_ID, Slot) VALUES('$username', '$convertedpass', '$firstname', '$lastname', '$contactNo', '$plateNo', '$vehicleType', '')";
            $result = mysqli_query($conn,$sql);

            if($result){?>
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

    <div class="container contents rounded shadow-lg p-5 w-50">
        <a href="index.php" class="goBack" target="_self" title="Go Back to Main Page."><i class="fa-solid fa-arrow-left"></i></a><br>

        <h1 class="text-center mb-5">REGISTER</h1>
        <form method="POST" action="" class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="Username" id="username" placeholder="Username" required>
                    <label for="username"><i class="fa-solid fa-user"></i> Username:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="password" class="form-control" name="Password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <label for="password"><i class="fa-solid fa-key"></i> Password:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="Fname" id="firstname" placeholder="Firstname"  required>
                    <label for="firstname"><i class="fa-solid fa-user-tag"></i> First Name:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="Lname" id="laststname" placeholder="Lastname" required">
                    <label for="laststname"><i class="fa-solid fa-user-tag"></i> Last Name:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="tel" class="form-control" name="Contact" id="contact" placeholder="Contact Number" maxlength="11" required">
                    <label for="contact"><i class="fa-solid fa-mobile-screen"></i> Contact Number:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="PlateNo" id="plateNo" placeholder="Plate Number" required">
                    <label for="plateNo"><i class="fa fa-tachograph-digital"></i> Plate Number:</label>
                </div>
            </div>
            <div class="col-md-12"> 
                <div class="form-floating">
                    <select class="form-select" name="Vehicletype" id="vehicletype" aria-label="Floating label select example" required>
                        <option value="1">Two-Wheeled</option>
                        <option value="2">Four-Wheeled</option>
                    </select>
                    <label for="vehicletype">Vehicle type:</label>
                </div>
            </div>
            <div class="mb-3">Already have an account? <a href="login.php" class="card-link " title="Go to Login Page.">Login</a></div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary" name="register">Register</button>
                <button type="submit" class="btn btn-danger" name="cancel" onclick="history.back(-1)">Cancel</button>
            </div>
        </form>
        <!-- <a href="index.php" target="_self" title="Go Back to Main Page." style="font-size:15px; font-weight:bold; color:rgb(192, 17, 17);">Go to Homepage.</a><br> -->
    </div>

</body>
</html>