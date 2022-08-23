<?php 
    session_start();
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
    <!-- icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
<body  class="mainContainer">
<?php 
    if (isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $convertedpassword = md5($pass);

        // admin
        $findadmin = "SELECT * FROM admin_account WHERE Username = '$user' AND Password = '$convertedpassword';";
        $checkadmin = mysqli_query($conn,$findadmin);
        $validateAdmin = mysqli_num_rows($checkadmin);
        // employee
        $findemployee = "SELECT * FROM employees_account WHERE Username = '$user' AND Password = '$convertedpassword';";
        $checkemployee = mysqli_query($conn,$findemployee);
        $validateEmployee = mysqli_num_rows($checkemployee);
        // user
        $finduser = "SELECT U.Username, U.Password, U.Firstname, U.Lastname, U.Contact_No, U.Plate_No, V.Vehicle, U.Slot FROM users AS U INNER JOIN vehicle AS V ON U.VehicleType_ID = V.VehicleType_ID WHERE U.Username = '$user' AND U.Password = '$convertedpassword'";
        $check = mysqli_query($conn,$finduser);
        $validateUser = mysqli_num_rows($check);

        if($validateAdmin >0){
            $sqlRowADMN = mysqli_fetch_assoc($checkadmin);
            $_SESSION["Username"] = $sqlRowADMN['Username'];
            header("Location: adminDashboard.php");
        }
        elseif($validateEmployee >0){
            $sqlRowEMP = mysqli_fetch_assoc($checkemployee);
            $_SESSION["Username"] = $sqlRowEMP['Username'];
            header("Location: empDashboard.php");
        }
        elseif ($validateUser >0){
            $sqlRow = mysqli_fetch_assoc($check);
            $_SESSION["Username"] = $sqlRow['Username'];
            $_SESSION["Password"] = $pass;
            $_SESSION["Fname"] = $sqlRow['Firstname'];
            $_SESSION["Lname"] = $sqlRow['Lastname'];
            $_SESSION["Contact"] = $sqlRow['Contact_No'];
            $_SESSION["Plate_No"] = $sqlRow['Plate_No'];
            $_SESSION["Vehicle_Type"] = $sqlRow['Vehicle'];
            $_SESSION["Slot"] = $sqlRow['Slot'];

            header("Location: userDashboard.php");
        }
        else{?>
            <script>
                Swal.fire({
                    icon:'error',
                    title:'Incorrect Username or Password.',
                    showConfirmButton:true,
                })
            </script>
        <?php
        }
    }
?>

    <div class="container contents rounded shadow-lg my-5 p-5 w-50">
        <a href="index.php" class="goBack" target="_self" title="Go Back to Main Page."><i class="fa-solid fa-arrow-left"></i></a><br>

        <h1 class="text-center mb-5">LOGIN</h1>
        <form method="POST" action="" class="row g-4">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    <label for="username"><i class="fa-solid fa-user"></i> Username:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password"><i class="fa-solid fa-key"></i> Password:</label>
                </div>
            </div>
            <div class="mb-3">Create an account? <a href="register.php" class="card-link" title="Go to Register Page."> Register</a></div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary" name="login">Log in</button>
                <button type="submit" class="btn btn-danger" name="cancel" onclick="history.back(-1)">Cancel</button>
            </div>
        </form>
    </div>

</body>
</html>