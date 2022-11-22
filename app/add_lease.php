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
    <h4>Add Lease</h4>
    <form method="post" action="">
        <input type="text" name="student_number" id="student_number" placeholder="Enter student number">
        <input type="text" name="place_number" id="place_number" placeholder="Enter place number">
        <select name="lease_duration" id="lease_duration">
            <option value="One Semester">One Semester</option>
            <option value="Two Semesters">Two Semesters</option>
            <option value="Three Semesters">Three Semesters</option>
        </select>
        <button type="submit" name="submit" id="submit">Add Lease</button>
    </form>
    <?php
    if(isset($_POST["submit"])){
    include 'dbconfig.php';

    $sql = "insert into lease(lease_duration, student_number, place_number, date_of_entry)
    values ('".$_POST["lease_duration"]."','".$_POST["student_number"]."','".$_POST["place_number"]."', "." date '2022-09-01' ".")";

    if ($conn->query($sql) === TRUE) {
    echo "
        <script type= 'text/javascript'>
            alert('New record created successfully');
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