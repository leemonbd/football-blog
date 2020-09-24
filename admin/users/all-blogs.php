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
if(isset($_GET['logout'])){
    $validation->logOut();
}

$convertedDATE=$validation->dateConverter();

/*if(isset($_POST['search-btn'])){
    $search=$validation->searchBlog($_POST);
}else{
    header('Location:index.php');
}*/

$paginationPage=$validation->paginationPage();

if(isset($_GET['page'])){
    $page=$_GET['page'];

}else{
    $page=1;
}

$database=new Database();
$numPerPage=8;
$startFrom=($page-1)*8;
$sql="SELECT * FROM blogs WHERE status='Accept' ORDER BY id DESC limit $startFrom, $numPerPage";
$queryResultShow=mysqli_query($database->link,$sql);





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
            <small>সব খবর</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">প্রচ্ছদ</a>
            </li>
            <li class="breadcrumb-item active">সব খবর</li>
        </ol>

        <div class="row">
            <?php while ($allBlogsResult=mysqli_fetch_assoc($queryResultShow)){?>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="inner">
                        <a><img class="card-img-top img-fluid" src="<?php echo $allBlogsResult['blogImage']?>" alt=""></a>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title ">
                            <a href="details-page.php?id=<?php echo $allBlogsResult['id']?>" class="category text-decoration-none small "><strong><?php echo str_pad(substr($allBlogsResult['blogTitle'],0,200),0,'.') ; ?></strong></a>
                        </h4>
                        <p class="card-text text-justify"><?php echo str_pad(substr($allBlogsResult['shortDescription'],0,500),0,'.')?></p>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>

        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page<=1){echo 'disabled';}else{echo '';} ?>">
                <a class="page-link" href="all-blogs.php?page=<?php echo $page-1?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$paginationPage;$i++){?>
            <li class="page-item <?php if ($i==$page){echo 'active';}else{echo '';} ?>">
                <a class="page-link" href="all-blogs.php?page=<?php echo $i?>"><?php echo $i?></a>
            </li>
            <?php }?>
            <li class="page-item <?php if ($page>=$paginationPage){echo 'disabled';}else{echo '';} ?>">
                <a class="page-link" href="all-blogs.php?page=<?php echo $page+1?>" aria-label="Next">
                    <span >&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

    </div>


    <?php include '../../admin/includes/footer.php'?>
    <?php //include 'admin/includes/modal.php'?>

    <!-- Bootstrap core JavaScript -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
