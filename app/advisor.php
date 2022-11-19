<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Menu</title>
</head>
<body>
    <?php include('nav.php') ?>
    <h2>Advisor Menu</h2>
    <?php
    include 'dbconfig.php';

    $sql = "select * from student";
    echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">First Name</font> </td> 
            <td> <font face="Arial">Last Name</font> </td> 
        </tr>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $StudentFirstName = $row["first_name"];
            $StudentLastName = $row["last_name"];

            echo '<tr> 
                    <td>'.$StudentFirstName.'</td> 
                    <td>'.$StudentLastName.'</td> 
                </tr>';
        }
        $result->free();
    } 
    echo '</table>';

    $conn->close();
    ?>
</body>
</html>