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


if(isset($_GET['delete'])){
    $deleteBlogById=$_GET['id'];
    $validation->deleteBlogById($deleteBlogById);
}

$queryResult=$validation->showBlogInMainSites();

$paginationPage=$validation->paginationPage4();
if(isset($_GET['page'])){
    $page=$_GET['page'];

}else{
    $page=1;
}

$database=new Database();
$numPerPage=12;
$startFrom=($page-1)*12;
$sql="SELECT * FROM blogs ORDER BY id DESC limit $startFrom, $numPerPage";
$queryResultShow=mysqli_query($database->link,$sql);

//$showBlog=mysqli_fetch_assoc($queryResult);


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
        <div class="col-sm-12 mx-auto" style="height: 700px">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Sl No.</th>
                    <th scope="col">Category</th>
                    <th scope="col">Blog Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($showBlog=mysqli_fetch_assoc($queryResultShow)){?>
                    <tr>
                        <td><?php echo $showBlog['id']?></td>
                        <td><?php echo $showBlog['category']?></td>
                        <td><?php echo $showBlog['blogTitle']?></td>
                        <td><?php echo $showBlog['status']?></td>
                        <td>
                            <a href="manage-blog.php?id=<?php echo $showBlog['id']?>">View</a>
                            <a href="?delete=true&id=<?php echo $showBlog['id']?>" onclick="return confirm('আপনি কি নিশ্চিত!!! ব্লগ টি মুছে ফেলতে চাচ্ছেন?')">Delete</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>

            </table>

            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($page<=1){echo 'disabled';}else{echo '';} ?>">
                    <a class="page-link" href="dashboard.php?page=<?php echo $page-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php for($i=1;$i<=$paginationPage;$i++){?>
                    <li class="page-item <?php if ($i==$page){echo 'active';}else{echo '';} ?>">
                        <a class="page-link" href="dashboard.php?page=<?php echo $i?>"><?php echo $i?></a>
                    </li>
                <?php }?>
                <li class="page-item <?php if ($page>=$paginationPage){echo 'disabled';}else{echo '';} ?>">
                    <a class="page-link" href="dashboard.php?page=<?php echo $page+1?>" aria-label="Next">
                        <span >&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>



<?php include '../includes/footer.php'?>


<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
