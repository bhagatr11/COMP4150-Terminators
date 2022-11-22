<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP 4150: Main Menu</title>
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
    <h4>Add Room</h4>
    <form method="post" action="">
        <input type="text" name="room_number" id="room_number" placeholder="Enter room number">
        <input type="text" name="monthly_rent_rate" id="monthly_rent_rate" placeholder="Enter monthly rent rate">
        <select name="room_type" id="room_type">
            <option value="Student Flat">Student Flat</option>
            <option value="Hall of Residence">Hall of Residence</option>
        </select>
        <input type="text" name="hall_flat_number" id="hall_flat_number" placeholder="Enter hall or flat number">
        <button type="submit" name="submit" id="submit">Add Room</button>
    </form>
    <?php
    if(isset($_POST["submit"])){
    include 'dbconfig.php';

    $room_type = $_POST["room_type"] === "Student Flat" ? "hall_number" : "flat_number";
    $sql = "insert into rooms(room_number, monthly_rent_rate, ".$room_type.") values ('".$_POST["room_number"]."','".$_POST["monthly_rent_rate"]."','".$_POST["hall_flat_number"]."')";

    if ($conn->query($sql) === TRUE) {
    echo "
        <script type= 'text/javascript'>
            alert('New room created successfully');
        </script>";
    } 
    else 
    {
        echo 
        "<script type= 'text/javascript'>
            alert('Error: " . $sql . "<br>" . $conn->error."');
        </script>";
    }

    $conn->close();
    }
    ?>
</body>
</html>