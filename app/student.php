<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Menu</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"/>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>
<body>
    <?php include('nav.php') ?>
    <div id="webform">
    <h2>Student Menu</h2>
    <form method="post" action="">
        <input type="text" name="id" id="id" placeholder="Enter student number">
        <button type="submit" name="submit" id="submit">Find</button>
    </form>
    </div>
    <?php
    include 'dbconfig.php';
    if(isset($_POST["submit"])){

    // INVOICES
    $sql = "select * from invoice where student_number =".$_POST["id"]." and payment_received = 0;";
    $student = "select * from student where student_number =".$_POST["id"];

    echo '<h4>Student Info</h4>';
    echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td> <font face="Arial">First Name</font> </td>
            <td> <font face="Arial">Last Name</font> </td>
        </tr>';
    if ($result = $conn->query($student)) {
        while ($row = $result->fetch_assoc()) {
            $FName = $row["first_name"];
            $LName = $row["last_name"];

            echo '<tr> 
                    <td>'.$FName.'</td> 
                    <td>'.$LName.'</td> 
                </tr>';
        }
        $result->free();
    }
    echo '</table>';

    echo '<h4>Invoices</h4>';
    echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td> <font face="Arial">Invoice Number</font> </td>
            <td> <font face="Arial">Student Number</font> </td>
            <td> <font face="Arial">Payment Due</font> </td>
        </tr>
        <form method="post" action="payinvoice.php">
            <input type="hidden" name="id" value='.$_POST["id"].'>
            <input type="radio" id="Debit" name="method" value="Debit">
            <label for="Debit">Debit</label><br>
            <input type="radio" id="Credit" name="method" value="Credit">
            <label for="Credit">Credit</label><br>
            <button type="submit" name="submit" id="submit">Pay Invoice</button>
        </form>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $InvoiceNumber = $row["invoice_number"];
            $StudentNumber = $row["student_number"];
            $PaymentDue = $row["payment_due"];

            echo '<tr> 
                    <td>'.$InvoiceNumber.'</td> 
                    <td>'.$StudentNumber.'</td> 
                    <td>'.$PaymentDue.'</td> 
                </tr>';
        }
        $result->free();
    } 
    echo '</table>';

    // LEASES
    $sql = "select * from lease where student_number =".$_POST["id"];
    echo '<h4>Current Lease</h4>';
    echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">Lease Number</font> </td> 
            <td> <font face="Arial">Student Number</font> </td>
            <td> <font face="Arial">Lease Duration</font> </td> 
        </tr>';
    
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $LeaseNumber = $row["lease_number"];
            $StudentNumber = $row["student_number"];
            $LeaseDuration = $row["lease_duration"];

            echo '<tr> 
                    <td>'.$LeaseNumber.'</td> 
                    <td>'.$StudentNumber.'</td> 
                    <td>'.$LeaseDuration.'</td> 
                </tr>';
        }
        $result->free();
    }
    echo '</table>';

    // ROOM
    $sql = "
    select * from lease l 
    left join rooms r on r.place_number = l.place_number
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

    // Paid Invoices
    $sql = "select * from invoice where student_number =".$_POST["id"]." and payment_received = 1;";
    echo '<h4>Paid Invoices</h4>';
    echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td> <font face="Arial">Invoice Number</font> </td>
            <td> <font face="Arial">Lease Number</font> </td>
            <td> <font face="Arial">Payment Method</font> </td>
            <td> <font face="Arial">Date Of Payment</font> </td>
            <td> <font face="Arial">Amount Paid</font> </td>
        </tr>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $invoice = $row["invoice_number"];
            $lease = $row["lease_number"];
            $method = $row["method_of_payment"];
            $date = $row["date_of_payment"];
            $amount = $row["payment_due"];

            echo '<tr> 
                    <td>'.$invoice.'</td> 
                    <td>'.$lease.'</td> 
                    <td>'.$method.'</td> 
                    <td>'.$date.'</td> 
                    <td>'.$amount.'</td>
                </tr>';
        }
        $result->free();
    } 
    echo '</table>';

    $conn->close();
    }
    ?>
</body>
</html>