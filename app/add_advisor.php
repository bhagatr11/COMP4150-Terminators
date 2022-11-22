<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Menu</title>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"/>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>
<body>
    <?php include('nav.php') ?>
    <h4>Add Inspection</h4>
    <form method="post" action="">
        First name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="first_name" id="first_name" placeholder="Enter first name"><br/>
        Last name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="last_name" id="last_name" placeholder="Enter last name"><br/>
        Position: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="advisor_position" id="advisor_position" placeholder="Enter advisor position"><br/>
        Department: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="department_name" id="department_name" placeholder="Enter department name"><br/>
        Telephone number: &nbsp;&nbsp;&nbsp;<input type="text" name="internal_telephone_number" id="internal_telephone_number" placeholder="Enter telephone number"><br/>
        Room number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="room_number" id="room_number" placeholder="Enter room number"><br/><br/>
        <button type="submit" name="submit" id="submit">Add Inspection</button>
    </form>
    <?php
    include 'dbconfig.php';
    if(isset($_POST["submit"])){

    $sql = "insert into advisor(first_name, last_name, advisor_position, department_name, internal_telephone_number, room_number)
    values ('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["advisor_position"]."','".$_POST["department_name"]."','".$_POST["internal_telephone_number"]."','".$_POST["room_number"]."')";

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