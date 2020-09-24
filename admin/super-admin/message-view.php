<?php
session_start();
if($_SESSION['id']==null){
    header('Location:index.php');
}

require_once '../../app/classes/Validation.php';
$validation=new Validation();
if(isset($_GET['logout'])){
    $validation->logOut();
}


$id=$_GET['id'];
$queryResult=$validation->showMessageById($id);
$showMessageByID=mysqli_fetch_assoc($queryResult);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Football Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>
<?php include '../includes/menu-3.php';?>

<div class="container" style="margin-top: 10px">

    <div class="row">
        <div class="col-sm-12 mx-auto">

            <table class="table table-dark">

                <tr>
                    <th>Sl No.</th>
                    <td><?php echo $showMessageByID['id']?></td>
                </tr>

                <tr>
                    <th>Full Name</th>
                    <td><?php echo $showMessageByID['fullName']?></td>
                </tr>

                <tr>
                    <th>Mobile No.</th>
                    <td><?php echo $showMessageByID['mobile']?></td>
                </tr>

                <tr>
                    <th>email</th>
                    <td><?php echo $showMessageByID['email']?></td>
                </tr>

                <tr>
                    <th>Message</th>
                    <td><?php echo $showMessageByID['message']?></td>
                </tr>

                <tr>
                    <th>Time</th>
                    <td><?php echo $showMessageByID['createdAt']?></td>
                </tr>
            </table>

        </div>
    </div>
</div>

<?php include '../includes/footer-sticky.php'?>


<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
