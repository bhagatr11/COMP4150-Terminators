<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Menu</title>
</head>
<body>
    <?php include('nav.php') ?>
    <h2>Staff Menu</h2>
    <h4>Current Leases</h4>
    <?php
    include 'dbconfig.php';

    $sql = "select * from lease";
    echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">Lease Number</font> </td> 
            <td> <font face="Arial">Lease Duration</font> </td> 
        </tr>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $LeaseNumber = $row["lease_number"];
            $LeaseDuration = $row["lease_duration"];

            echo '<tr> 
                    <td>'.$LeaseNumber.'</td> 
                    <td>'.$LeaseDuration.'</td> 
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
    echo '<table border="0" cellspacing="2" cellpadding="2"> 
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

    $conn->close();
    ?>
</body>
</html>