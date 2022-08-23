<?php 
    session_start();
    include'connect.php';
    $output = '';
    if(isset($_POST["export"])){
        $query = "SELECT R.ID, R.Username, R.Firstname, R.Lastname, R.Contact_No, R.Plate_No, V.Vehicle, R.Parking_Slot, S.status, R.Time_In, R.Time_Out, R.Date FROM registered_users AS R INNER JOIN vehicle AS V ON R.VehicleType_ID = V.VehicleType_ID INNER JOIN status AS S ON S.Status_ID = R.Status_ID";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $output .= '
            <table class="table" bordered="1">
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
                </tr>';
            while($row = mysqli_fetch_array($result)){
                $output .= '
                <tr>
                    <td>'.$row["Username"].'</td>
                    <td>'.$row["Firstname"].'</td>
                    <td>'.$row["Lastname"].'</td>
                    <td>'.$row["Contact_No"].'</td>
                    <td>'.$row["Plate_No"].'</td>
                    <td>'.$row["Vehicle"].'</td>
                    <td>'.$row["Parking_Slot"].'</td>
                    <td>'.$row["status"].'</td>
                    <td>'.$row["Time_In"].'</td>
                    <td>'.$row["Time_Out"].'</td>
                    <td>'.$row["Date"].'</td>
                </tr>';
            }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=Parking_Management_History.xls');
            echo $output;
        }
    }
?>