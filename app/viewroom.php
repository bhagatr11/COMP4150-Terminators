<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Room</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"/>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    include 'dbconfig.php';
    if(isset($_POST["submit"])){
        $sql = "select * from lease l left join rooms r on r.place_number = l.place_number
        where l.student_number =".$_POST["id"];
        echo '<h4>Current Room</h4>';
        echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2"> 
            <tr> 
                <td> <font face="Arial">Room Number</font> </td> 
                <td> <font face="Arial">Hall Number</font> </td>
                <td> <font face="Arial">Monthly Rent</font> </td> 
            </tr>';
    
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $RoomNumber = $row["room_number"];
                $HallNumber = $row["hall_number"];
                $MonthlyRent = $row["monthly_rent_rate"];

                echo '<tr> 
                        <td>'.$RoomNumber.'</td> 
                        <td>'.$HallNumber.'</td> 
                        <td>'.$MonthlyRent.'</td> 
                    </tr>';
            }
        $result->free();
        }
        echo '</table>';
        
    }
    ?>
    <a href="student.php">Back</a>
</body>
</html>