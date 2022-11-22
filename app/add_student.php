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
    <h4>Add Student</h4>
    <form method="post" action="">
        <input type="text" name="first_name" id="first_name" placeholder="Enter student's first name">
        <input type="text" name="last_name" id="last_name" placeholder="Enter student's last name">
        <input type="text" name="street" id="street" placeholder="Enter student's street">
        <input type="text" name="city" id="city" placeholder="Enter student's city">
        <input type="text" name="postal_code" id="postal_code" placeholder="Enter student's postal code">
        <input type="text" name="date_of_birth" id="date_of_birth" placeholder="Enter student's date of birth">
        <select name="gender" id="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">Other</option>
        </select>
        <select name="student_category" id="student_category">
            <option value="First Year Undergraduate">First Year Undergraduate</option>
            <option value="Second Year Undergraduate">Second Year Undergraduate</option>
            <option value="Third Year Undergraduate">Third Year Undergraduate</option>
            <option value="Fourth Year Undergraduate">Fourth Year Undergraduate</option>
            <option value="Fifth Year Undergraduate">Fifth Year Undergraduate</option>
            <option value="First Year Graduate">First Year Graduate</option>
            <option value="Second Year Graduate">Second Year Graduate</option>
            <option value="Third Year Graduate">Third Year Graduate</option>
            <option value="First Year Postgraduate">First Year Postgraduate</option>
            <option value="Second Year Postgraduate">Second Year Postgraduate</option>
            <option value="Third Year Postgraduate">Third Year Postgraduate</option>
        </select>
        <input type="text" name="nationality" id="nationality" placeholder="Enter student's nationality">
        <input type="checkbox" name="special_needs" id="special_needs">
        <input type="text" name="course" id="course" placeholder="Enter student's course">
        <input type="text" name="advisor_number" id="advisor_number" placeholder="Enter student's advisor">
        <button type="submit" name="submit" id="submit">Add Lease</button>
    </form>
    <?php
    if(isset($_POST["submit"])){
    include 'dbconfig.php';

    $sql = "insert into student(first_name, last_name, street, city, postal_code, date_of_birth, gender, student_category, nationality, current_status, course, advisor_number)
    values ('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["street"]."','".$_POST["city"]."','".$_POST["postal_code"]."','".$_POST["date_of_birth"]."','".$_POST["gender"]."','"
    .$_POST["student_category"]."','".$_POST["nationality"]."', '0','".$_POST["course"]."','".$_POST["advisor_number"]."')";

    echo $sql;

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