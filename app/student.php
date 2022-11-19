<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Menu</title>
</head>
<body>
    <?php include('nav.php') ?>
    <div id="webform">
    <h2>Student Menu</h2>
    </div>
    <?php
    include 'dbconfig.php';

    $sql = "select * from invoice";
    echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">Invoice Number</font> </td> 
            <td> <font face="Arial">Student Number</font> </td>
            <td> <font face="Arial">Payment Due</font> </td> 
        </tr>';

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

    $conn->close();
    ?>
</body>
</html>