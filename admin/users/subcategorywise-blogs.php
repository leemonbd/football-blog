<?php
session_start();
if($_SESSION['id']==null){
    header('Location:../index.php');
}

/*if(isset($_POST['search-btn'])==null){
    header('Location:index.php');
}*/
require '../../app/classes/Validation.php';
$validation=new Validation();


$convertedDATE=$validation->dateConverter();




/*if(isset($_POST['search-btn'])){
    $search=$validation->searchBlog($_POST);
}else{

}*/



if(isset($_GET['category'])){
    $categoryName=$_GET['category'];
    $showSubCategory=$validation->showBlogSubCategorywise($categoryName);
}

else{
    header('Location:index.php');
}



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
    <?php include '../../admin/includes/menu-6.php';?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <small>বিভাগ অনুযায়ী সংবাদ</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">প্রচ্ছদ</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $categoryName?></li>
        </ol>

        <div class="row">
            <?php while ($subCategory=mysqli_fetch_assoc($showSubCategory)){?>
            <div class="col-lg-4 col-md-6 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="inner">
                        <a><img class="card-img-top img-fluid" src="<?php echo $subCategory['blogImage']?>" alt=""></a>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title ">
                            <a href="details-page.php?id=<?php echo $subCategory['id']?>" class="category text-decoration-none small "><strong><?php echo str_pad(substr($subCategory['blogTitle'],0,200),0,'.') ; ?></strong></a>
                        </h4>
                        <p class="card-text text-justify"><?php echo str_pad(substr($subCategory['shortDescription'],0,700),0,'.')?></p>
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
