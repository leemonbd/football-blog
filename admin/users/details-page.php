<?php
session_start();
if($_SESSION['id']==null){
    header('Location:../index.php');
}

require_once '../../app/classes/Validation.php';
$validation=new Validation();
if(isset($_GET['logout'])){
    $validation->logOut();
}


$convertedDATE=$validation->dateConverter();
$queryResult10=$validation->showBlogInMainSites();
$highlights=$validation->showBlogInMainSiteDesc();
$id=$_GET['id'];
$queryResult6=$validation->showBlogInMainSites();
$queryResult3=$validation->addFixtureShow();
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
<?php include '../../admin/includes/menu-5.php';?>

<!-- Page Content -->
<div class="container">
    <h1 class="mt-4 mb-3">
        <small>বিস্তারিত</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">প্রচ্ছদ</a>
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
                        <pre class="lead"><p class="text-justify"><?php echo $blogDetailsPage['longDescription']?></p></pre>

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
            <div class="card my-5 ">
                <h5 class="card-header">শিরোনাম</h5>
                <div class="card-body category">
                    <?php while ($blogTitle=mysqli_fetch_assoc($highlights)){?>
                        <a href="details-page.php?id=<?php echo $blogTitle['id']?>"class="text-dark text-decoration-none">
                            <strong style="padding: 0;margin: 0">
                                <?php echo $blogTitle['blogTitle']?>
                            </strong>
                        </a><br><br>
                    <?php }?>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-5">
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

<?php include '../../admin/includes/footer.php'?>
<?php /*include 'includes/modal.php'*/?>

<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/script.js"></script>


</body>

</html>
