<?php
session_start();
if($_SESSION['id']==null){
    header('Location:../index.php');
}

require '../../app/classes/Validation.php';
$validation=new Validation();
if(isset($_GET['logout'])){
    $validation->logOut();
}

$category=$_GET['category'];
$queryResult5=$validation->showBlogCategorywise($category);
$queryResultBread=$validation->showBlogCategorywise($category);
$categoryBread=mysqli_fetch_assoc($queryResultBread);
$queryResult=$validation->showBlogInYourBlog();
$queryResult2=$validation->showBlogInYourBlog();
$queryResult4=$validation->showBlogInYourBlog();
$queryResult3=$validation->addFixtureShow();
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
<?php include '../includes/menu-1.php';?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h2 class="mt-4 mb-3">আমার ব্লগ
    </h2>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="my-blog.php">আমার ব্লগ</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $categoryBread['category'];?></li>
    </ol>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Blog Post -->
            <?php while ($showBlog=mysqli_fetch_assoc($queryResult5)){?>
            <div class="card mb-4">
                <img class="card-img-top" src="<?php echo $showBlog['blogImage']?>" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title"><?php echo str_pad(substr($showBlog['blogTitle'],0,200),0,'.') ; ?></h3>
                    <p class="card-text"><?php echo str_pad(substr($showBlog['shortDescription'],0,700),0,'.')?></p>
                    <a href="user-details-page.php?id=<?php echo $showBlog['id']?>" class="btn btn-primary">Read More &rarr;</a>
                </div>

                <div class="card-footer text-muted">
                    <?php echo $showBlog['blogPostTime']?> by
                    <a href="#"><?php echo $_SESSION['name']?></a>
                </div>
            </div>
            <?php }?>



            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card mb-4">
                <h5 class="card-header">অনুসন্ধান</h5>
                <form action="user-search-result.php" method="post">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchinput" placeholder="ব্লগ অনুসন্ধান......">
                            <button class="btn btn-secondary" type=submit name='user-search-btn'>খুঁজুন!</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">আপনার ক্যাটাগরি</h5>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $d=mysqli_fetch_assoc($queryResult4);
                        if(isset($d)==""){
                            echo '';
                        }else{
                            $categoryList=[];
                            while ($d=mysqli_fetch_assoc($queryResult2)){
                                $categoryList[]=$d['category'];
                            }
                            $uniqueCategory=array_unique($categoryList);
                            ?>
                            <?php for ($i=0;$i<count($uniqueCategory);$i++) {?>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="categorywise-blog.php?category=<?php echo $uniqueCategory[$i];?>"><?php echo $uniqueCategory[$i];?></a>
                                        </li>
                                    </ul>
                                </div>
                            <?php }}?>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">আজকের খেলা</h5>
                <div class="card-body">
                    <?php while ($fixtures=mysqli_fetch_assoc($queryResult3)){?>
                        <p>
                            <strong><?php echo $fixtures['gameName']?></strong><br>
                            <?php echo $fixtures['gameFixture']?><br>
                            <?php echo $fixtures['gameTime']?><br>
                            <?php echo $fixtures['channels']?><br>
                        </p>
                    <?php }?>
                </div>
            </div>


        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php include '../includes/footer.php'?>
<?php include '../includes/modal.php'?>

<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
