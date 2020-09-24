<?php
session_start();
if($_SESSION['id']==null){
    header('Location:index.php');
}

require '../../app/classes/Validation.php';
$validation=new Validation();
if(isset($_GET['logout'])){
    $validation->logOut();
}
if(isset($_POST['popularsubcategory-name-btn'])){
    $showPopularSubCategories=$_POST['popularsubcategory-name-btn'];
    $showPopularSubCategory=$validation->showBlogSubCategorywise2($showPopularSubCategories);
    $breadcrumb=$_POST['popularsubcategory-name-btn'];
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
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>
    <?php include '../../admin/includes/menu-5.php';?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <small>বিভাগ অনুযায়ী সংবাদ</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="home.php">প্রচ্ছদ</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $breadcrumb?></li>
        </ol>

        <div class="row">
            <?php while ($popularSubCategory=mysqli_fetch_assoc($showPopularSubCategory)){?>
            <div class="col-lg-4 col-md-6 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="inner">
                        <a><img class="card-img-top img-fluid" src="<?php echo $popularSubCategory['blogImage']?>" alt=""></a>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title ">
                            <a href="details-page.php?id=<?php echo $popularSubCategory['id']?>" class="category text-decoration-none small "><strong><?php echo str_pad(substr($popularSubCategory['blogTitle'],0,200),0,'.') ; ?></strong></a>
                        </h4>
                        <p class="card-text text-justify"><?php echo str_pad(substr($popularSubCategory['shortDescription'],0,700),0,'.')?></p>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
        <hr>
    </div>
    <hr>


    <?php include '../../admin/includes/footer-sticky.php'?>
    <?php //include 'admin/includes/modal.php'?>

    <!-- Bootstrap core JavaScript -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
