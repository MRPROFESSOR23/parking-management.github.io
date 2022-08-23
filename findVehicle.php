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
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>

    <title>Robinson's mall | Parking Management</title>
</head>
<style>
    .status{
    height: 15px;
    width: 15px;
    background-color: white;
    border-radius: 50%;
    display: flex;
    margin-left: 80%;
    border: 1px solid black;
}
</style>
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
                        <a class="nav-link  fw-bold fs-5" aria-current="page" href="userDashboard.php"><i class="bi bi-speedometer2"></i> DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="userParkingarea.php"><i class="bi bi-truck "></i> PARKING AREA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold fs-5" href="findVehicle.php"><i class="bi bi-search"></i> FIND VEHICLE</a>
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
        <h1 class="text-center fw-bold mb-5">Find Vehicle Location</h1>
        <!-- search bar -->
        <form action="" method = "POST" >
            <div class="input-group my-5 w-50 mx-auto"> 
                <input type="text" class="form-control form-control-lg" name="inputtedusername" id="inputtedusername" placeholder="Username/Plate Number" style="border-radius: 50px 0 0 50px;">
                <button type="submit" class="input-group-text" name="search" style="border-radius:0 50px 50px 0;""><i class="bi bi-search me-2"></i> Search</button>
            </div>
        </form><br>
    <!-- parking slots -->
        <h3 class="fw-bold mt-3">1st Floor</h3>
        <div class="row row-cols mb-5 fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1P" ></span>1P</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1p" ></span>1p</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1Q" ></span>1Q</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1q" ></span>1q</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1R" ></span>1R</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1r" ></span>1r</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1S" ></span>1S</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1s" ></span>1s</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1T" ></span>1T</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1t" ></span>1t</div>
        </div>
        <div class="row row-cols fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1K" ></span>1K</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1k" ></span>1k</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1L" ></span>1L</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1l" ></span>1l</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1M" ></span>1M</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1m" ></span>1m</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1N" ></span>1N</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1n" ></span>1n</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1O" ></span>1O</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="1o" ></span>1o</div>
        </div>
        <div class="row row-cols fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1F" ></span>1F</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1f" ></span>1f</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1G" ></span>1G</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1g" ></span>1g</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1H" ></span>1H</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1h" ></span>1h</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1I" ></span>1I</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1i" ></span>1i</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1J" ></span>1J</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="1j" ></span>1j</div>
        </div>
        <div class="row row-cols my-5 fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1A"></span>1A</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1a"></span>1a</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1B"></span>1B</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1b"></span>1b</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1C"></span>1C</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1c"></span>1c</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1D"></span>1D</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1d"></span>1d</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1E"></span>1E</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="1e"></span>1e</div>
        </div>
    <!-- 2nd floor -->
        <h3 class="fw-bold mt-5">2nd Floor</h3>
        <div class="row row-cols mb-5 fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2P"></span> 2P</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2p"></span> 2p</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2Q"></span> 2Q</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2q"></span> 2q</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2R"></span> 2R</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2r"></span> 2r</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2S"></span> 2S</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2s"></span> 2s</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2T"></span> 2T</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2t"></span> 2t</div>
        </div>
        <div class="row row-cols fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2K"></span> 2K</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2k"></span> 2k</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2L"></span> 2L</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2l"></span> 2l</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2M"></span> 2M</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2m"></span> 2m</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2N"></span> 2N</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2n"></span> 2n</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2O"></span> 2O</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2o"></span> 2o</div>
        </div>
        <div class="row row-cols fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2F"></span> 2F</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2f"></span> 2f</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2G"></span> 2G</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2g"></span> 2g</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2H"></span> 2H</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2h"></span> 2h</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2I"></span> 2I</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2i"></span> 2i</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2J"></span> 2J</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="2j"></span> 2j</div>
        </div>
        <div class="row row-cols my-5 fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2A"></span> 2A</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2a"></span> 2a</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2B"></span> 2B</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2b"></span> 2b</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2C"></span> 2C</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2c"></span> 2c</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2D"></span> 2D</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2d"></span> 2d</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2E"></span> 2E</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="2e"></span> 2e</div>
        </div>
    <!-- 3rd floor -->
        <h3 class="fw-bold mt-5">3rd Floor</h3>
        <div class="row row-cols mb-5 fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3P"></span> 3P</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3p"></span> 3p</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3Q"></span> 3Q</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3q"></span> 3q</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3R"></span> 3R</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3r"></span> 3r</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3S"></span> 3S</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3s"></span> 3s</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3T"></span> 3T</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3t"></span> 3t</div>
        </div>
        <div class="row row-cols fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3K"></span> 3K</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3k"></span> 3k</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3L"></span> 3L</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3l"></span> 3l</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3M"></span> 3M</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3m"></span> 3m</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3N"></span> 3N</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3n"></span> 3n</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3O"></span> 3O</div>
            <div class="col p-2 border border-3 border-dark border-top-0"> <span class="status" id="3o"></span> 3o</div>
        </div>
        <div class="row row-cols fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3F"></span> 3F</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3f"></span> 3f</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3G"></span> 3G</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3g"></span> 3g</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3H"></span> 3H</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3h"></span> 3h</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3I"></span> 3I</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3i"></span> 3i</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3J"></span> 3J</div>
            <div class="col p-2 border border-3 border-dark border-bottom-0"><span class="status" id="3j"></span> 3j</div>
        </div>
        <div class="row row-cols my-5 fs-5 d-flex flex-nowrap ">
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3A"></span> 3A</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3a"></span> 3a</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3B"></span> 3B</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3b"></span> 3b</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3C"></span> 3C</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3c"></span> 3c</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3D"></span> 3D</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3d"></span> 3d</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3E"></span> 3E</div>
            <div class="col p-2 border border-3 border-dark border-top-0"><span class="status" id="3e"></span> 3e</div>
        </div>
    </div>
    <?php 
        if(isset($_POST['search'])){
            $inputtedusername = $_POST['inputtedusername'];
            $convertedInputtedUsername = strtoupper($inputtedusername);

            $usernameList = array();
            $plateNoList = array();
            
            $findInputtedUsername = "SELECT Username, Plate_No, Slot FROM users";
            $findresult = mysqli_query($conn, $findInputtedUsername);
            while($viewResult = mysqli_fetch_array($findresult)) {
                array_push($usernameList, strtoupper($viewResult['Username']));
                array_push($plateNoList, strtoupper($viewResult['Plate_No']));
            };
            // check if the inputted value is in the user list
            if(in_array($convertedInputtedUsername, $usernameList) OR in_array($convertedInputtedUsername, $plateNoList)){
                $convertedplate = strtoupper($_SESSION["Plate_No"]);
                $converteduser = strtoupper($_SESSION["Username"]);
                
                if ($convertedInputtedUsername == $convertedplate || $convertedInputtedUsername == $converteduser){
                    $slot = array();
                    $findUsernameSlot = "SELECT Slot FROM users WHERE Username = '$convertedInputtedUsername' OR Plate_No = '$convertedInputtedUsername'";
                    $result = mysqli_query($conn, $findUsernameSlot);
                    while($slotResult = mysqli_fetch_array($result)) {
                        array_push($slot, $slotResult['Slot']);
                    };

                    ?>
                    <script type='text/javascript'>                        
                        const slot = <?php echo json_encode($slot);?>;
                    // first floor
                        const slot_1A = slot.includes('1A');
                        if (slot_1A == true){
                            document.getElementById("1A").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1A.')
                        }else if(slot == 'none'){
                            document.getElementById("1A").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1A").style.backgroundColor = 'white';
                        }
                        const slot_1a = slot.includes('1a');
                        if (slot_1a == true){
                            document.getElementById("1a").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1a.')
                        }else if(slot == 'none'){
                            document.getElementById("1a").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1a").style.backgroundColor = 'white';
                        }
                        const slot_1B = slot.includes('1B');
                        if (slot_1B == true){
                            document.getElementById("1B").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1B.')
                        }else if(slot == 'none'){
                            document.getElementById("1B").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1B").style.backgroundColor = 'white';
                        }
                        const slot_1b = slot.includes('1b');
                        if (slot_1b == true){
                            document.getElementById("1b").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1b.')
                        }else if(slot == 'none'){
                            document.getElementById("1b").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1b").style.backgroundColor = 'white';
                        }
                        const slot_1C = slot.includes('1C');
                        if (slot_1C == true){
                            document.getElementById("1C").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1C.')
                        }else if(slot == 'none'){
                            document.getElementById("1C").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1C").style.backgroundColor = 'white';
                        }
                        const slot_1c = slot.includes('1c');
                        if (slot_1c == true){
                            document.getElementById("1c").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1c.')
                        }else if(slot == 'none'){
                            document.getElementById("1c").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1c").style.backgroundColor = 'white';
                        }
                        const slot_1D = slot.includes('1D');
                        if (slot_1D == true){
                            document.getElementById("1D").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1D.')
                        }else if(slot == 'none'){
                            document.getElementById("1D").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1D").style.backgroundColor = 'white';
                        }
                        const slot_1d = slot.includes('1d');
                        if (slot_1d == true){
                            document.getElementById("1d").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1d.')
                        }else if(slot == 'none'){
                            document.getElementById("1d").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1d").style.backgroundColor = 'white';
                        }
                        const slot_1E = slot.includes('1E');
                        if (slot_1E == true){
                            document.getElementById("1E").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1E.')
                        }else if(slot == 'none'){
                            document.getElementById("1E").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1E").style.backgroundColor = 'white';
                        }
                        const slot_1e = slot.includes('1e');
                        if (slot_1e == true){
                            document.getElementById("1e").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1e.')
                        }else if(slot == 'none'){
                            document.getElementById("1e").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1e").style.backgroundColor = 'white';
                        }
                        const slot_1F = slot.includes('1F');
                        if (slot_1F == true){
                            document.getElementById("1F").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1F.')
                        }else if(slot == 'none'){
                            document.getElementById("1F").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1F").style.backgroundColor = 'white';
                        }
                        const slot_1f = slot.includes('1f');
                        if (slot_1f == true){
                            document.getElementById("1f").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1f.')
                        }else if(slot == 'none'){
                            document.getElementById("1f").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1f").style.backgroundColor = 'white';
                        }
                        const slot_1G = slot.includes('1G');
                        if (slot_1G == true){
                            document.getElementById("1G").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1G.')
                        }else if(slot == 'none'){
                            document.getElementById("1G").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1G").style.backgroundColor = 'white';
                        }
                        const slot_1g = slot.includes('1g');
                        if (slot_1g == true){
                            document.getElementById("1g").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1g.')
                        }else if(slot == 'none'){
                            document.getElementById("1g").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1g").style.backgroundColor = 'white';
                        }
                        const slot_1H = slot.includes('1H');
                        if (slot_1H == true){
                            document.getElementById("1H").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1H.')
                        }else if(slot == 'none'){
                            document.getElementById("1H").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1H").style.backgroundColor = 'white';
                        }
                        const slot_1h = slot.includes('1h');
                        if (slot_1h == true){
                            document.getElementById("1h").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1h.')
                        }else if(slot == 'none'){
                            document.getElementById("1h").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1h").style.backgroundColor = 'white';
                        }
                        const slot_1I = slot.includes('1I');
                        if (slot_1I == true){
                            document.getElementById("1I").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1I.')
                        }else if(slot == 'none'){
                            document.getElementById("1I").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1I").style.backgroundColor = 'white';
                        }
                        const slot_1i = slot.includes('1i');
                        if (slot_1i == true){
                            document.getElementById("1i").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1i.')
                        }else if(slot == 'none'){
                            document.getElementById("1i").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1i").style.backgroundColor = 'white';
                        }
                        const slot_1J = slot.includes('1J');
                        if (slot_1J == true){
                            document.getElementById("1J").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1J.')
                        }else if(slot == 'none'){
                            document.getElementById("1J").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1J").style.backgroundColor = 'white';
                        }
                        const slot_1j = slot.includes('1j');
                        if (slot_1j == true){
                            document.getElementById("1j").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1j.')
                        }else if(slot == 'none'){
                            document.getElementById("1j").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1j").style.backgroundColor = 'white';
                        }
                        const slot_1K = slot.includes('1K');
                        if (slot_1K == true){
                            document.getElementById("1K").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1K.')
                        }else if(slot == 'none'){
                            document.getElementById("1K").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1K").style.backgroundColor = 'white';
                        }
                        const slot_1k = slot.includes('1k');
                        if (slot_1k == true){
                            document.getElementById("1k").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1k.')
                        }else if(slot == 'none'){
                            document.getElementById("1k").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1k").style.backgroundColor = 'white';
                        }
                        const slot_1L = slot.includes('1L');
                        if (slot_1L == true){
                            document.getElementById("1L").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1L.')
                        }else if(slot == 'none'){
                            document.getElementById("1L").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1L").style.backgroundColor = 'white';
                        }
                        const slot_1l = slot.includes('1l');
                        if (slot_1l == true){
                            document.getElementById("1l").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1l.')
                        }else if(slot == 'none'){
                            document.getElementById("1l").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1l").style.backgroundColor = 'white';
                        }
                        const slot_1M = slot.includes('1M');
                        if (slot_1M == true){
                            document.getElementById("1M").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1M.')
                        }else if(slot == 'none'){
                            document.getElementById("1M").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1M").style.backgroundColor = 'white';
                        }
                        const slot_1m = slot.includes('1m');
                        if (slot_1m == true){
                            document.getElementById("1m").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1m.')
                        }else if(slot == 'none'){
                            document.getElementById("1m").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1m").style.backgroundColor = 'white';
                        }
                        const slot_1N = slot.includes('1N');
                        if (slot_1N == true){
                            document.getElementById("1N").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1N.')
                        }else if(slot == 'none'){
                            document.getElementById("1N").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1N").style.backgroundColor = 'white';
                        }
                        const slot_1n = slot.includes('1n');
                        if (slot_1n == true){
                            document.getElementById("1n").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1n.')
                        }else if(slot == 'none'){
                            document.getElementById("1n").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1n").style.backgroundColor = 'white';
                        }
                        const slot_1O = slot.includes('1O');
                        if (slot_1O == true){
                            document.getElementById("1O").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1O.')
                        }else if(slot == 'none'){
                            document.getElementById("1O").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1O").style.backgroundColor = 'white';
                        }
                        const slot_1o = slot.includes('1o');
                        if (slot_1o == true){
                            document.getElementById("1o").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1o.')
                        }else if(slot == 'none'){
                            document.getElementById("1o").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1o").style.backgroundColor = 'white';
                        }
                        const slot_1P = slot.includes('1P');
                        if (slot_1P == true){
                            document.getElementById("1P").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1P.')
                        }else if(slot == 'none'){
                            document.getElementById("1P").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1P").style.backgroundColor = 'white';
                        }
                        const slot_1p = slot.includes('1p');
                        if (slot_1p == true){
                            document.getElementById("1p").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1p.')
                        }else if(slot == 'none'){
                            document.getElementById("1p").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1p").style.backgroundColor = 'white';
                        }
                        const slot_1Q = slot.includes('1Q');
                        if (slot_1Q == true){
                            document.getElementById("1Q").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1Q.')
                        }else if(slot == 'none'){
                            document.getElementById("1Q").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1Q").style.backgroundColor = 'white';
                        }
                        const slot_1q = slot.includes('1q');
                        if (slot_1q == true){
                            document.getElementById("1q").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1q.')
                        }else if(slot == 'none'){
                            document.getElementById("1q").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1q").style.backgroundColor = 'white';
                        }
                        const slot_1R = slot.includes('1R');
                        if (slot_1R == true){
                            document.getElementById("1R").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1R.')
                        }else if(slot == 'none'){
                            document.getElementById("1R").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1R").style.backgroundColor = 'white';
                        }
                        const slot_1r = slot.includes('1r');
                        if (slot_1r == true){
                            document.getElementById("1r").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1r.')
                        }else if(slot == 'none'){
                            document.getElementById("1r").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1r").style.backgroundColor = 'white';
                        }
                        const slot_1S = slot.includes('1S');
                        if (slot_1S == true){
                            document.getElementById("1S").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1S.')
                        }else if(slot == 'none'){
                            document.getElementById("1S").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1S").style.backgroundColor = 'white';
                        }
                        const slot_1s = slot.includes('1s');
                        if (slot_1s == true){
                            document.getElementById("1s").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1s.')
                        }else if(slot == 'none'){
                            document.getElementById("1s").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1s").style.backgroundColor = 'white';
                        }
                        const slot_1T = slot.includes('1T');
                        if (slot_1T == true){
                            document.getElementById("1T").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1T.')
                        }else if(slot == 'none'){
                            document.getElementById("1T").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1T").style.backgroundColor = 'white';
                        }
                        const slot_1t = slot.includes('1t');
                        if (slot_1t == true){
                            document.getElementById("1t").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 1t.')
                        }else if(slot == 'none'){
                            document.getElementById("1t").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("1t").style.backgroundColor = 'white';
                        }
                    
                    // second floor
                        const slot_2A = slot.includes('2A');
                        if (slot_2A == true){
                            document.getElementById("2A").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2A.')
                        }else if(slot == 'none'){
                            document.getElementById("2A").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2A").style.backgroundColor = 'white';
                        }
                        const slot_2a = slot.includes('2a');
                        if (slot_2a == true){
                            document.getElementById("2a").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2a.')
                        }else if(slot == 'none'){
                            document.getElementById("2a").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2a").style.backgroundColor = 'white';
                        }
                        const slot_2B = slot.includes('2B');
                        if (slot_2B == true){
                            document.getElementById("2B").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2B.')
                        }else if(slot == 'none'){
                            document.getElementById("2B").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2B").style.backgroundColor = 'white';
                        }
                        const slot_2b = slot.includes('2b');
                        if (slot_2b == true){
                            document.getElementById("2b").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2b.')
                        }else if(slot == 'none'){
                            document.getElementById("2b").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2b").style.backgroundColor = 'white';
                        }
                        const slot_2C = slot.includes('2C');
                        if (slot_2C == true){
                            document.getElementById("2C").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2C.')
                        }else if(slot == 'none'){
                            document.getElementById("2C").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2C").style.backgroundColor = 'white';
                        }
                        const slot_2c = slot.includes('2c');
                        if (slot_2c == true){
                            document.getElementById("2c").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2c.')
                        }else if(slot == 'none'){
                            document.getElementById("2c").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2c").style.backgroundColor = 'white';
                        }
                        const slot_2D = slot.includes('2D');
                        if (slot_2D == true){
                            document.getElementById("2D").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2D.')
                        }else if(slot == 'none'){
                            document.getElementById("2D").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2D").style.backgroundColor = 'white';
                        }
                        const slot_2d = slot.includes('2d');
                        if (slot_2d == true){
                            document.getElementById("2d").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2d.')
                        }else if(slot == 'none'){
                            document.getElementById("2d").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2d").style.backgroundColor = 'white';
                        }
                        const slot_2E = slot.includes('2E');
                        if (slot_2E == true){
                            document.getElementById("2E").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2E.')
                        }else if(slot == 'none'){
                            document.getElementById("2E").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2E").style.backgroundColor = 'white';
                        }
                        const slot_2e = slot.includes('2e');
                        if (slot_2e == true){
                            document.getElementById("2e").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2e.')
                        }else if(slot == 'none'){
                            document.getElementById("2e").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2e").style.backgroundColor = 'white';
                        }
                        const slot_2F = slot.includes('2F');
                        if (slot_2F == true){
                            document.getElementById("2F").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2F.')
                        }else if(slot == 'none'){
                            document.getElementById("2F").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2F").style.backgroundColor = 'white';
                        }
                        const slot_2f = slot.includes('2f');
                        if (slot_2f == true){
                            document.getElementById("2f").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2f.')
                        }else if(slot == 'none'){
                            document.getElementById("2f").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2f").style.backgroundColor = 'white';
                        }
                        const slot_2G = slot.includes('2G');
                        if (slot_2G == true){
                            document.getElementById("2G").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2G.')
                        }else if(slot == 'none'){
                            document.getElementById("2G").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2G").style.backgroundColor = 'white';
                        }
                        const slot_2g = slot.includes('2g');
                        if (slot_2g == true){
                            document.getElementById("2g").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2g.')
                        }else if(slot == 'none'){
                            document.getElementById("2g").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2g").style.backgroundColor = 'white';
                        }
                        const slot_2H = slot.includes('2H');
                        if (slot_2H == true){
                            document.getElementById("2H").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2H.')
                        }else if(slot == 'none'){
                            document.getElementById("2H").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2H").style.backgroundColor = 'white';
                        }
                        const slot_2h = slot.includes('2h');
                        if (slot_2h == true){
                            document.getElementById("2h").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2h.')
                        }else if(slot == 'none'){
                            document.getElementById("2h").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2h").style.backgroundColor = 'white';
                        }
                        const slot_2I = slot.includes('2I');
                        if (slot_2I == true){
                            document.getElementById("2I").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2I.')
                        }else if(slot == 'none'){
                            document.getElementById("2I").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2I").style.backgroundColor = 'white';
                        }
                        const slot_2i = slot.includes('2i');
                        if (slot_2i == true){
                            document.getElementById("2i").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2i.')
                        }else if(slot == 'none'){
                            document.getElementById("2i").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2i").style.backgroundColor = 'white';
                        }
                        const slot_2J = slot.includes('2J');
                        if (slot_2J == true){
                            document.getElementById("2J").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2J.')
                        }else if(slot == 'none'){
                            document.getElementById("2J").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2J").style.backgroundColor = 'white';
                        }
                        const slot_2j = slot.includes('2j');
                        if (slot_2j == true){
                            document.getElementById("2j").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2j.')
                        }else if(slot == 'none'){
                            document.getElementById("2j").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2j").style.backgroundColor = 'white';
                        }
                        const slot_2K = slot.includes('2K');
                        if (slot_2K == true){
                            document.getElementById("2K").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2K.')
                        }else if(slot == 'none'){
                            document.getElementById("2K").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2K").style.backgroundColor = 'white';
                        }
                        const slot_2k = slot.includes('2k');
                        if (slot_2k == true){
                            document.getElementById("2k").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2k.')
                        }else if(slot == 'none'){
                            document.getElementById("2k").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2k").style.backgroundColor = 'white';
                        }
                        const slot_2L = slot.includes('2L');
                        if (slot_2L == true){
                            document.getElementById("2L").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2L.')
                        }else if(slot == 'none'){
                            document.getElementById("2L").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2L").style.backgroundColor = 'white';
                        }
                        const slot_2l = slot.includes('2l');
                        if (slot_2l == true){
                            document.getElementById("2l").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2l.')
                        }else if(slot == 'none'){
                            document.getElementById("2l").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2l").style.backgroundColor = 'white';
                        }
                        const slot_2M = slot.includes('2M');
                        if (slot_2M == true){
                            document.getElementById("2M").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2M.')
                        }else if(slot == 'none'){
                            document.getElementById("2M").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2M").style.backgroundColor = 'white';
                        }
                        const slot_2m = slot.includes('2m');
                        if (slot_2m == true){
                            document.getElementById("2m").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2m.')
                        }else if(slot == 'none'){
                            document.getElementById("2m").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2m").style.backgroundColor = 'white';
                        }
                        const slot_2N = slot.includes('2N');
                        if (slot_2N == true){
                            document.getElementById("2N").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2N.')
                        }else if(slot == 'none'){
                            document.getElementById("2N").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2N").style.backgroundColor = 'white';
                        }
                        const slot_2n = slot.includes('2n');
                        if (slot_2n == true){
                            document.getElementById("2n").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2n.')
                        }else if(slot == 'none'){
                            document.getElementById("2n").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2n").style.backgroundColor = 'white';
                        }
                        const slot_2O = slot.includes('2O');
                        if (slot_2O == true){
                            document.getElementById("2O").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2O.')
                        }else if(slot == 'none'){
                            document.getElementById("2O").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2O").style.backgroundColor = 'white';
                        }
                        const slot_2o = slot.includes('2o');
                        if (slot_2o == true){
                            document.getElementById("2o").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2o.')
                        }else if(slot == 'none'){
                            document.getElementById("2o").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2o").style.backgroundColor = 'white';
                        }
                        const slot_2P = slot.includes('2P');
                        if (slot_2P == true){
                            document.getElementById("2P").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2P.')
                        }else if(slot == 'none'){
                            document.getElementById("2P").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2P").style.backgroundColor = 'white';
                        }
                        const slot_2p = slot.includes('2p');
                        if (slot_2p == true){
                            document.getElementById("2p").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2p.')
                        }else if(slot == 'none'){
                            document.getElementById("2p").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2p").style.backgroundColor = 'white';
                        }
                        const slot_2Q = slot.includes('2Q');
                        if (slot_2Q == true){
                            document.getElementById("2Q").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2Q.')
                        }else if(slot == 'none'){
                            document.getElementById("2Q").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2Q").style.backgroundColor = 'white';
                        }
                        const slot_2q = slot.includes('2q');
                        if (slot_2q == true){
                            document.getElementById("2q").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2q.')
                        }else if(slot == 'none'){
                            document.getElementById("2q").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2q").style.backgroundColor = 'white';
                        }
                        const slot_2R = slot.includes('2R');
                        if (slot_2R == true){
                            document.getElementById("2R").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2R.')
                        }else if(slot == 'none'){
                            document.getElementById("2R").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2R").style.backgroundColor = 'white';
                        }
                        const slot_2r = slot.includes('2r');
                        if (slot_2r == true){
                            document.getElementById("2r").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2r.')
                        }else if(slot == 'none'){
                            document.getElementById("2r").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2r").style.backgroundColor = 'white';
                        }
                        const slot_2S = slot.includes('2S');
                        if (slot_2S == true){
                            document.getElementById("2S").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2S.')
                        }else if(slot == 'none'){
                            document.getElementById("2S").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2S").style.backgroundColor = 'white';
                        }
                        const slot_2s = slot.includes('2s');
                        if (slot_2s == true){
                            document.getElementById("2s").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2s.')
                        }else if(slot == 'none'){
                            document.getElementById("2s").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2s").style.backgroundColor = 'white';
                        }
                        const slot_2T = slot.includes('2T');
                        if (slot_2T == true){
                            document.getElementById("2T").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2T.')
                        }else if(slot == 'none'){
                            document.getElementById("2T").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2T").style.backgroundColor = 'white';
                        }
                        const slot_2t = slot.includes('2t');
                        if (slot_2t == true){
                            document.getElementById("2t").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 2t.')
                        }else if(slot == 'none'){
                            document.getElementById("2t").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{ 
                            document.getElementById("2t").style.backgroundColor = 'white';
                        }
                    // third floor
                        const slot_3A = slot.includes('3A');
                        if (slot_3A == true){
                            document.getElementById("3A").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3A.')
                        }else if(slot == 'none'){
                            document.getElementById("3A").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3A").style.backgroundColor = 'white';
                        }
                        const slot_3a = slot.includes('3a');
                        if (slot_3a == true){
                            document.getElementById("3a").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3a.')
                        }else if(slot == 'none'){
                            document.getElementById("3a").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3a").style.backgroundColor = 'white';
                        }
                        const slot_3B = slot.includes('3B');
                        if (slot_3B == true){
                            document.getElementById("3B").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3B.')
                        }else if(slot == 'none'){
                            document.getElementById("3B").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3B").style.backgroundColor = 'white';
                        }
                        const slot_3b = slot.includes('3b');
                        if (slot_3b == true){
                            document.getElementById("3b").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3b.')
                        }else if(slot == 'none'){
                            document.getElementById("3b").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3b").style.backgroundColor = 'white';
                        }
                        const slot_3C = slot.includes('3C');
                        if (slot_3C == true){
                            document.getElementById("3C").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3C.')
                        }else if(slot == 'none'){
                            document.getElementById("3C").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3C").style.backgroundColor = 'white';
                        }
                        const slot_3c = slot.includes('3c');
                        if (slot_3c == true){
                            document.getElementById("3c").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3c.')
                        }else if(slot == 'none'){
                            document.getElementById("3c").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3c").style.backgroundColor = 'white';
                        }
                        const slot_3D = slot.includes('3D');
                        if (slot_3D == true){
                            document.getElementById("3D").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3D.')
                        }else if(slot == 'none'){
                            document.getElementById("3D").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3D").style.backgroundColor = 'white';
                        }
                        const slot_3d = slot.includes('3d');
                        if (slot_3d == true){
                            document.getElementById("3d").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3d.')
                        }else if(slot == 'none'){
                            document.getElementById("3d").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3d").style.backgroundColor = 'white';
                        }
                        const slot_3E = slot.includes('3E');
                        if (slot_3E == true){
                            document.getElementById("3E").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3E.')
                        }else if(slot == 'none'){
                            document.getElementById("3E").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3E").style.backgroundColor = 'white';
                        }
                        const slot_3e = slot.includes('3e');
                        if (slot_3e == true){
                            document.getElementById("3e").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3e.')
                        }else if(slot == 'none'){
                            document.getElementById("3e").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3e").style.backgroundColor = 'white';
                        }
                        const slot_3F = slot.includes('3F');
                        if (slot_3F == true){
                            document.getElementById("3F").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3F.')
                        }else if(slot == 'none'){
                            document.getElementById("3F").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3F").style.backgroundColor = 'white';
                        }
                        const slot_3f = slot.includes('3f');
                        if (slot_3f == true){
                            document.getElementById("3f").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3f.')
                        }else if(slot == 'none'){
                            document.getElementById("3f").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3f").style.backgroundColor = 'white';
                        }
                        const slot_3G = slot.includes('3G');
                        if (slot_3G == true){
                            document.getElementById("3G").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3G.')
                        }else if(slot == 'none'){
                            document.getElementById("3G").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3G").style.backgroundColor = 'white';
                        }
                        const slot_3g = slot.includes('3g');
                        if (slot_3g == true){
                            document.getElementById("3g").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3g.')
                        }else if(slot == 'none'){
                            document.getElementById("3g").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3g").style.backgroundColor = 'white';
                        }
                        const slot_3H = slot.includes('3H');
                        if (slot_3H == true){
                            document.getElementById("3H").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3H.')
                        }else if(slot == 'none'){
                            document.getElementById("3H").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3H").style.backgroundColor = 'white';
                        }
                        const slot_3h = slot.includes('3h');
                        if (slot_3h == true){
                            document.getElementById("3h").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3h.')
                        }else if(slot == 'none'){
                            document.getElementById("3h").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3h").style.backgroundColor = 'white';
                        }
                        const slot_3I = slot.includes('3I');
                        if (slot_3I == true){
                            document.getElementById("3I").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3I.')
                        }else if(slot == 'none'){
                            document.getElementById("3I").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3I").style.backgroundColor = 'white';
                        }
                        const slot_3i = slot.includes('3i');
                        if (slot_3i == true){
                            document.getElementById("3i").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3i.')
                        }else if(slot == 'none'){
                            document.getElementById("3i").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3i").style.backgroundColor = 'white';
                        }
                        const slot_3J = slot.includes('3J');
                        if (slot_3J == true){
                            document.getElementById("3J").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3J.')
                        }else if(slot == 'none'){
                            document.getElementById("3J").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3J").style.backgroundColor = 'white';
                        }
                        const slot_3j = slot.includes('3j');
                        if (slot_3j == true){
                            document.getElementById("3j").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3j.')
                        }else if(slot == 'none'){
                            document.getElementById("3j").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3j").style.backgroundColor = 'white';
                        }
                        const slot_3K = slot.includes('3K');
                        if (slot_3K == true){
                            document.getElementById("3K").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3K.')
                        }else if(slot == 'none'){
                            document.getElementById("3K").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3K").style.backgroundColor = 'white';
                        }
                        const slot_3k = slot.includes('3k');
                        if (slot_3k == true){
                            document.getElementById("3k").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3k.')
                        }else if(slot == 'none'){
                            document.getElementById("3k").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3k").style.backgroundColor = 'white';
                        }
                        const slot_3L = slot.includes('3L');
                        if (slot_3L == true){
                            document.getElementById("3L").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3L.')
                        }else if(slot == 'none'){
                            document.getElementById("3L").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3L").style.backgroundColor = 'white';
                        }
                        const slot_3l = slot.includes('3l');
                        if (slot_3l == true){
                            document.getElementById("3l").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3l.')
                        }else if(slot == 'none'){
                            document.getElementById("3l").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3l").style.backgroundColor = 'white';
                        }
                        const slot_3M = slot.includes('3M');
                        if (slot_3M == true){
                            document.getElementById("3M").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3M.')
                        }else if(slot == 'none'){
                            document.getElementById("3M").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3M").style.backgroundColor = 'white';
                        }
                        const slot_3m = slot.includes('3m');
                        if (slot_3m == true){
                            document.getElementById("3m").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3m.')
                        }else if(slot == 'none'){
                            document.getElementById("3m").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3m").style.backgroundColor = 'white';
                        }
                        const slot_3N = slot.includes('3N');
                        if (slot_3N == true){
                            document.getElementById("3N").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3N.')
                        }else if(slot == 'none'){
                            document.getElementById("3N").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3N").style.backgroundColor = 'white';
                        }
                        const slot_3n = slot.includes('3n');
                        if (slot_3n == true){
                            document.getElementById("3n").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3n.')
                        }else if(slot == 'none'){
                            document.getElementById("3n").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3n").style.backgroundColor = 'white';
                        }
                        const slot_3O = slot.includes('3O');
                        if (slot_3O == true){
                            document.getElementById("3O").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3O.')
                        }else if(slot == 'none'){
                            document.getElementById("3O").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3O").style.backgroundColor = 'white';
                        }
                        const slot_3o = slot.includes('3o');
                        if (slot_3o == true){
                            document.getElementById("3o").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3o.')
                        }else if(slot == 'none'){
                            document.getElementById("3o").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3o").style.backgroundColor = 'white';
                        }
                        const slot_3P = slot.includes('3P');
                        if (slot_3P == true){
                            document.getElementById("3P").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3P.')
                        }else if(slot == 'none'){
                            document.getElementById("3P").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3P").style.backgroundColor = 'white';
                        }
                        const slot_3p = slot.includes('3p');
                        if (slot_3p == true){
                            document.getElementById("3p").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3p.')
                        }else if(slot == 'none'){
                            document.getElementById("3p").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3p").style.backgroundColor = 'white';
                        }
                        const slot_3Q = slot.includes('3Q');
                        if (slot_3Q == true){
                            document.getElementById("3Q").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3Q.')
                        }else if(slot == 'none'){
                            document.getElementById("3Q").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3Q").style.backgroundColor = 'white';
                        }
                        const slot_3q = slot.includes('3q');
                        if (slot_3q == true){
                            document.getElementById("3q").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3q.')
                        }else if(slot == 'none'){
                            document.getElementById("3q").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3q").style.backgroundColor = 'white';
                        }
                        const slot_3R = slot.includes('3R');
                        if (slot_3R == true){
                            document.getElementById("3R").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3R.')
                        }else if(slot == 'none'){
                            document.getElementById("3R").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3R").style.backgroundColor = 'white';
                        }
                        const slot_3r = slot.includes('3r');
                        if (slot_3r == true){
                            document.getElementById("3r").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3r.')
                        }else if(slot == 'none'){
                            document.getElementById("3r").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3r").style.backgroundColor = 'white';
                        }
                        const slot_3S = slot.includes('3S');
                        if (slot_3S == true){
                            document.getElementById("3S").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3S.')
                        }else if(slot == 'none'){
                            document.getElementById("3S").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3S").style.backgroundColor = 'white';
                        }
                        const slot_3s = slot.includes('3s');
                        if (slot_3s == true){
                            document.getElementById("3s").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3s.')
                        }else if(slot == 'none'){
                            document.getElementById("3s").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3s").style.backgroundColor = 'white';
                        }
                        const slot_3T = slot.includes('3T');
                        if (slot_3T == true){
                            document.getElementById("3T").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3T.')
                        }else if(slot == 'none'){
                            document.getElementById("3T").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3T").style.backgroundColor = 'white';
                        }
                        const slot_3t = slot.includes('3t');
                        if (slot_3t == true){
                            document.getElementById("3t").style.backgroundColor = 'rgb(192, 17, 17)';
                            Swal.fire('Your vehicle is in slot 3t.')
                        }else if(slot == 'none'){
                            document.getElementById("3t").style.backgroundColor = 'white';
                            Swal.fire({
                            icon:'info',
                            title:"You don't have yet a parking number.",
                            showConfirmButton:true,
                            })
                        }else{
                            document.getElementById("3t").style.backgroundColor = 'white';
                        }
                    </script>
                <?php
                }else{?>
                    <script>
                        Swal.fire({
                        icon:'error',
                        title:'You dont have the permission to search another Username/Plate number.',
                        showConfirmButton:true,
                        })
                    </script>
                <?php
                }
            }else{?>
                <script>
                    Swal.fire({
                        icon:'warning',
                        title:'Username/Plate Number doesnt exsist in the Parking Slot.',
                        showConfirmButton:true,
                    })
                </script><?php
            }
        }
    ?>
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