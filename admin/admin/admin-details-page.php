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



$queryResult=$validation->showBlogInYourBlog();
$queryResult2=$validation->showBlogInYourBlog();
$queryResult4=$validation->showBlogInYourBlog();
$queryResult10=$validation->showBlogInYourBlog();
//$categoryName=mysqli_fetch_assoc($queryResult10);

$id=$_GET['id'];
$queryResult6=$validation->showBlogInYourBlog();
$detailsPage=$validation->showBlogInYourBlog($id);
//$blogDetailsPage=mysqli_fetch_assoc($queryResult6);
if($id==''){
    header('Location:index.php');
}

$queryResult3=$validation->addFixtureShow();

if(isset($_POST['comment-btn']) && $_POST['comment']!=''){
    $validation->comments($_POST);
    $queryComment2=$validation->commentsShow2($_POST);
    $queryComment3=$validation->commentsShow2($_POST);
    $commentShow2=mysqli_fetch_assoc($queryComment2);
}
/*$queryComment=$validation->commentsShow();
//$showBlog=mysqli_fetch_assoc($queryResult);
*/?>

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
    <style>
        pre {
            white-space: pre-wrap;
            word-break: break-word;
        }
        textarea {
            resize: none;
        }

    </style>

</head>

<body>
<?php include '../includes/menu-1.php';?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h3 class="mt-4 mb-3">Posted
        <small>by
            <a href="index.php"><?php echo $_SESSION['name']?></a>
        </small>
    </h3>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="my-blog.php">আমার ব্লগ</a>
        </li>
        <li class="breadcrumb-item active">
            <?php while ($categoryName=mysqli_fetch_assoc($queryResult10)){
                if($categoryName['id']==$id){
                    echo $categoryName['category'];

                }

            }

            ?>
        </li>
    </ol>



    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <?php
            while ($blogDetailsPage=mysqli_fetch_assoc($queryResult6)){
                if ($blogDetailsPage['id']==$id){?>

                    <div>
                        <!-- Preview Image -->
                        <h3 class="card-title"><?php echo $blogDetailsPage['blogTitle']?></h3>
                        <img class="img-fluid rounded card-img-top" src="<?php echo $blogDetailsPage['blogImage']?>" alt="">
                        <hr>
                        <!-- Date/Time -->
                        <p>Posted on <?php echo $blogDetailsPage['blogPostTime']?></p>
                        <hr>
                        <!-- Post Content -->
                        <pre class="lead"><p align="justify"><?php echo $blogDetailsPage['longDescription']?></p></pre>

                    </div>
                <?php }}?>




            <!-- Comment with nested comments -->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
           <!-- <div class="card mb-4">
                <h5 class="card-header">অনুসন্ধান</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="ব্লগ অনুসন্ধান...">
                        <span class="input-group-append">
                <input type="submit" class="btn btn-secondary" value="খুঁজুন!">
              </span>
                    </div>
                </div>
            </div>-->


            <!-- Categories Widget -->
            <div class="card my-5">
                <h5 class="card-header">Categories</h5>
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
    <!-- /.row -->

</div>
<!-- /.container -->

<?php include '../includes/footer.php'?>
<?php include '../includes/modal.php'?>

<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/script.js"></script>


</body>

</html>
