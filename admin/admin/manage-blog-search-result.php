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

if(isset($_POST['manage-blog-search-btn']) && $_POST['searchinput']!=null){
    $search=$validation->searchBlogBySessionId($_POST);
}else{
    header('Location:index.php');
}

header("Cache-Control: no cache");

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
<?php include '../includes/menu-4.php';?>

    <div class="container" style="margin-top: 10px">
        <div class="row">
            <div class="col-sm-12 mx-auto">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Sl Id</th>
                        <th scope="col">Category</th>
                        <th scope="col">Blog Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($showSearchResult=mysqli_fetch_assoc($search)){?>
                        <tr>
                            <td><?php echo $showSearchResult['id']?></td>
                            <td><?php echo $showSearchResult['category']?></td>
                            <td><?php echo $showSearchResult['blogTitle']?></td>
                            <td><?php echo $showSearchResult['status']?></td>
                            <td>
                                <a href="edit-blog.php?id=<?php echo $showSearchResult['id']?>">edit</a>
                                <a href="view-blog.php?id=<?php echo $showSearchResult['id']?>"">view</a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>



<?php include '../includes/footer-sticky.php'?>
<?php /*include '../includes/modal.php'*/?>

<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
