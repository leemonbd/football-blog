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


if (isset($_POST['status-update-btn'])){
    $validation->statusUpdate($_POST);

}

$id=$_GET['id'];
$queryResult=$validation->showBlogInfoByID($id);
$showBlogByID=mysqli_fetch_assoc($queryResult);

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
                    <form action="" method="post">
                    <td>
                        <select name="status" class="custom-select">
                            <option>Select Status</option>
                            <option>Accept</option>
                            <option>Hold</option>
                            <option>Cancel</option>
                        </select>
                    </td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $showBlogByID['id']?>">
                        <input type="submit" class="btn btn-success" name="status-update-btn" value="Update Status">
                    </td>
                    </form>
                </tr>

                <tr>
                    <th>Status</th>
                    <td><?php echo $showBlogByID['status']?></td>
                </tr>

                <tr>
                    <th>Blog Id</th>
                    <td><?php echo $showBlogByID['id']?></td>
                </tr>

                <tr>
                    <th>Category</th>
                    <td><?php echo $showBlogByID['category']?></td>
                </tr>

                <tr>
                    <th>Blog Title</th>
                    <td><?php echo $showBlogByID['blogTitle']?></td>
                </tr>

                <tr>
                    <th>Blog Short Description</th>
                    <td><?php echo $showBlogByID['shortDescription']?></td>
                </tr>

                <tr>
                    <th>Blog Long Description</th>
                    <td><?php echo $showBlogByID['longDescription']?></td>
                </tr>

                <tr>
                    <th>Blog Image</th>
                    <td><?php echo $showBlogByID['blogImage']?><br>
                    <img src="<?php echo $showBlogByID['blogImage']?>" style="height: 150px;width: 200px">
                    </td>
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
