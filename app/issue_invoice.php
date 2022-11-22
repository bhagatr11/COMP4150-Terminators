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
    <h4>Issue an Invoice</h4>
    <form method="post" action="">
        Lease number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="lease_number" id="lease_number" placeholder="Enter lease number"><br/>
        Current semester: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="semester_number" id="semester_number">
            <option value="Fall Semester">Fall Semester</option>
            <option value="Winter Semester">Winter Semester</option>
            <option value="Summer Semester">Summer Semester</option>
        </select><br/>
        Money owe: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="payment_due" id="payment_due" placeholder="Enter money owed"><br/>
        Student number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="student_number" id="student_number" placeholder="Enter student number"><br/>
        Place number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="place_number" id="place_number" placeholder="Enter place number"><br/>
        Payment received: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="payment_received" id="payment_received">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select> <br/>
        Payment date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="date_of_payment" id="date_of_payment" placeholder="YYYY-MM-DD"><br/>
        Method of Payment: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="method_of_payment" id="method_of_payment">
            <option value="Cheque">Cheque</option>
            <option value="Cash">Cash</option>
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
            <option value="Other">Other</option>
        </select><br/>
        First reminder date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="first_remainder_date" id="first_remainder_date" placeholder="YYYY-MM-DD   "><br/>
        Second reminder date: &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="second_remainder_date" id="second_remainder_date" placeholder="YYYY-MM-DD"><br/>
        <button type="submit" name="submit" id="submit">Add Invoice</button>
    </form>
    <?php
    include 'dbconfig.php';
    if(isset($_POST["submit"])){

    $first_reminder_date = $_POST["first_remainder_date"];
    $second_remainder_date = $_POST["second_remainder_date"];
    $first_reminder_date = !empty($first_reminder_date) ? "'$first_reminder_date'" : "NULL";
    $second_remainder_date = !empty($second_remainder_date) ? "'$second_remainder_date'" : "NULL";

    $sql = "insert into invoice(lease_number, semester_number, payment_due, student_number, place_number, payment_received, date_of_payment, method_of_payment, first_remainder_date, second_remainder_date)
    values ('".$_POST["lease_number"]."','".$_POST["semester_number"]."','".$_POST["payment_due"]."','".$_POST["student_number"]."','".$_POST["place_number"]."','".$_POST["payment_received"]."','".$_POST["date_of_payment"]."','".$_POST["method_of_payment"]."',$first_reminder_date,$second_remainder_date)";

    // echo $sql;

    if ($conn->query($sql) === TRUE) {
    echo 
        "<script type= 'text/javascript'>
            alert('Flat inspection added successfully!');
        </script>";
    } 
    else {
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