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
    <h4>Add Inspection</h4>
    <form method="post" action="">
        <input type="text" name="staff_number" id="staff_number" placeholder="Enter staff number">
        <input type="text" name="inspection_date" id="inspection_date" placeholder="Inspection date (YYYY-MM-DD)">
        <select name="satisfactory_condition" id="satisfactory_condition">
            <option value="1">Good</option>
            <option value="0">Poor</option>
        </select>
        <input type="text" name="additional_comments" id="additional_comments" placeholder="Enter additional comments">
        <input type="text" name="flat_number" id="flat_number" placeholder="Enter flat number">
        <button type="submit" name="submit" id="submit">Add Inspection</button>
    </form>
    <?php
    include 'dbconfig.php';
    if(isset($_POST["submit"])){

    $sql = "insert into student_flat_inspections(staff_number, inspection_date, satisfactory_condition, additional_comments, flat_number)
    values ('".$_POST["staff_number"]."','".$_POST["inspection_date"]."','".$_POST["satisfactory_condition"]."','".$_POST["additional_comments"]."','".$_POST["flat_number"]."')";

    echo $sql;

    if ($conn->query($sql) === TRUE) {
    echo "
        <script type= 'text/javascript'>
            alert('Flat inspection added successfully!');
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