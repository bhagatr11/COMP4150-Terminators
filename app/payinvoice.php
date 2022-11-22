<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Lease</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"/>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        require 'dbconfig.php';
        try{
            $conn->autocommit(FALSE);
            $conn->query("update invoice set payment_received = 1, date_of_payment = CURDATE(), method_of_payment = '".$_POST['method']."' where student_number = ".$_POST["id"].";");
            $conn->commit();
            echo "Invoice Paid!";
        }
        catch(Exception $e){
            $conn->rollback();
            echo $e->getMessage();
            exit();
        }
        echo '<form method="POST" action="viewinvoice.php">
                <input type="hidden" name="id" id="id" value='.$_POST["id"].'>
                <button type="submit" name="submit" id="submit">Back</button>
            </form>';        
    ?>
</body>
</html>