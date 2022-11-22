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
    <h2>Advisor Menu</h2>
    <a href="add_advisor.php">Add advisor</a><br/>
    <form method="post" action="">
        <input type="text" name="id" id="id" placeholder="Enter advisor number">
        <button type="submit" name="submit" id="submit">Find</button>
    </form>

    <?php
    include 'dbconfig.php';
    if(isset($_POST["submit"])){

    $sql = "select * from student where advisor_number=".$_POST["id"];
    echo '<table class="table table-striped" border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">First Name</font> </td> 
            <td> <font face="Arial">Last Name</font> </td> 
            <td> <font face="Arial">Student Category</font> </td> 
            <td> <font face="Arial">Course</font> </td> 
        </tr>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $StudentFirstName = $row["first_name"];
            $StudentLastName = $row["last_name"];
            $Category = $row["student_category"];
            $Course = $row["course"];

            echo '<tr> 
                    <td>'.$StudentFirstName.'</td> 
                    <td>'.$StudentLastName.'</td> 
                    <td>'.$Category.'</td> 
                    <td>'.$Course.'</td> 
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