<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Menu</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"/>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>
<body>
    <?php include('nav.php') ?>
    <h2>Staff Menu</h2>
    <h4>Current Leases</h4>
    <?php
    include 'dbconfig.php';

    $sql = "select * from lease";
    echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">Lease Number</font> </td> 
            <td> <font face="Arial">Lease Duration</font> </td> 
            <td> <font face="Arial">Date of Entry</font> </td> 
            <td> <font face="Arial">Date of Exit</font> </td> 
        </tr>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $LeaseNumber = $row["lease_number"];
            $LeaseDuration = $row["lease_duration"];
            $DoEntry = $row["date_of_entry"];
            $DoExit = $row["date_of_exit"];

            echo '<tr> 
                    <td>'.$LeaseNumber.'</td> 
                    <td>'.$LeaseDuration.'</td> 
                    <td>'.$DoEntry.'</td> 
                    <td>'.$DoExit.'</td> 
                </tr>';
        }
        $result->free();
    } 
    echo '</table>';
    ?>

    <h4>Current Rooms</h4>
    <?php
    include 'dbconfig.php';

    $sql = "select * from rooms";
    echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">Place Number</font> </td> 
            <td> <font face="Arial">Room Number</font> </td> 
            <td> <font face="Arial">Rent Rate</font> </td> 
        </tr>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $RoomNumber = $row["room_number"];
            $PlaceNumber = $row["place_number"];
            $RentRate = $row["monthly_rent_rate"];

            echo '<tr> 
                    <td>'.$RoomNumber.'</td> 
                    <td>'.$PlaceNumber.'</td> 
                    <td>'.$RentRate.'</td> 
                </tr>';
        }
        $result->free();
    } 
    echo '</table>';

    ?>

    <h4>Flat Inspections</h4>
        <?php
            include 'dbconfig.php';
            
            $sql = "select * from student_flat_inspections";
            
            echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Arial">Inspection Number</font> </td> 
                    <td> <font face="Arial">Staff Number</font> </td> 
                    <td> <font face="Arial">Inspection Date</font> </td> 
                    <td> <font face="Arial">Satisfactory Condition</font> </td> 
                    <td> <font face="Arial">Addication Comments</font> </td> 
                    <td> <font face="Arial">Flat Number</font> </td> 
                </tr>';

            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    $InspectionNumber = $row["inspection_number"];
                    $StaffNumber = $row["staff_number"];
                    $InspectionDate = $row["inspection_date"];
                    $SatisfactoryCondition = $row["satisfactory_condition"];
                    $AdditionalComments = $row["additional_comments"];
                    $FlatNumber = $row["flat_number"];
                    
                    
                    echo '<tr> 
                            <td>'.$InspectionNumber.'</td> 
                            <td>'.$StaffNumber.'</td> 
                            <td>'.$InspectionDate.'</td> 
                            <td>'.$SatisfactoryCondition.'</td> 
                            <td>'.$AdditionalComments.'</td> 
                            <td>'.$FlatNumber.'</td>  
                        </tr>';
                }

                $result->free();
            } 

            echo '</table>';
            
            $conn->close();
        ?>
</body>
</html>