<?php
session_start();

/*if(isset($_POST['search-btn'])==null){
    header('Location:index.php');
}*/
require 'app/classes/Validation.php';
$validation=new Validation();
$convertedDATE=$validation->dateConverter();

if(isset($_POST['search-btn']) && $_POST['searchinput']!=null){
    $search=$validation->searchBlog($_POST);
}else{
    header('Location:index.php');
}

header("Cache-Control: no cache");

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
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <?php include 'admin/includes/menu-2.php';?>
    <hr>
    <!-- Page Content -->
    <div class="container">
        <ol class="breadcrumb">
            <h5>"<?php echo $_POST['searchinput'];?>" দিয়ে সার্চ এর ফলাফল</h5>
        </ol>
        
        <?php while ($searchResult=mysqli_fetch_assoc($search)){?>
        <div class="row">
            <div class="col-md-7">
                <img class="img-fluid rounded mb-3 mb-md-0" src="admin/super-admin/<?php echo $searchResult['blogImage']?>" alt="">
            </div>
            <div class="col-md-5">
                <h3><?php echo $searchResult['blogTitle']?></h3>
                <p><?php echo $searchResult['shortDescription']?></p>
                <a class="btn btn-dark" href="details-page.php?id=<?php echo $searchResult['id']?>">আরও পড়ুন &rarr;
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
            <hr>

        <?php }?>
        <hr>



        <!-- /.row -->
    </div>
    <hr>

    <!-- /.container -->

    <?php include 'admin/includes/footer-sticky.php'?>
    <?php //include 'admin/includes/modal.php'?>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
