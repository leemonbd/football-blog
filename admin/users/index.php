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

$convertedDATE=$validation->dateConverter();

$queryResult=$validation->showPopularSubCategoriesInMainSite();
$queryResult1=$validation->showBlogInMainSite();
$queryResult3=$validation->showBlogInMainSite();


$highlights=$validation->showBlogInMainSiteDesc();

$showBlog=$validation->showBlogInMainSiteDescUser1();
//$showSingleBlog=mysqli_fetch_assoc($showBlog);

$showBlog2=$validation->showBlogInMainSiteDescFour();

$showBlog3=$validation->showBlogInMainSiteAesc();

$queryResult2=$validation->addFixtureShow();
/*$fixtures1=mysqli_fetch_assoc($queryResult2);
$fixtures2=mysqli_fetch_assoc($queryResult2);*/





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
    <!-- Portfolio Section -->
    <hr>
    <h5><?php echo $convertedDATE?></h5>
    <hr>
    <h3>এইমাত্র পাওয়া</h3>
    <div class="row">
        <!-- Blog Entries Column -->
        <?php while ($showSingleBlog=mysqli_fetch_assoc($showBlog)){?>
        <div class="col-md-8">
            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="<?php echo $showSingleBlog['blogImage']?>" alt="Card image cap" >
                <div class="card-body">
                    <h3 class="card-title text-justify"><?php echo str_pad(substr($showSingleBlog['blogTitle'],0,200),0,'.') ; ?></h3>
                    <p class="card-text text-justify"><?php echo str_pad(substr($showSingleBlog['shortDescription'],0,500),0,'.')?></p>
                    <a href="details-page.php?id=<?php echo $showSingleBlog['id']?>" class="btn btn-dark">আরও পড়ুন &rarr;</a>
                </div>
            </div>
        </div>
        <?php }?>
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card mb-4">

                <h5 class="card-header">অনুসন্ধান</h5>
                <form action="search-result.php" method="post">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" name="searchinput" placeholder="ব্লগ অনুসন্ধান......">
                        <button class="btn btn-secondary" type=submit name='search-btn'>খুঁজুন!</button>
                    </div>
                </div>
                </form>

            </div>
            <div class="card my-4 ">
                <h5 class="card-header">শিরোনাম</h5>
                <div class="card-body category">
                    <?php while ($blogTitle=mysqli_fetch_assoc($highlights)){?>
                    <a href="details-page.php?id=<?php echo $blogTitle['id']?>" class="text-dark text-decoration-none">
                        <strong style="padding: 0;margin: 0">
                            <?php echo $blogTitle['blogTitle']?>
                        </strong>
                    </a><br><br>
                    <?php }?>
            </div>
            </div>
        </div>
    </div>
    <hr>
    <h3>আরও খবর</h3>
    <div class="row">
        <?php while ($showBlogDesc4=mysqli_fetch_assoc($showBlog2)){?>
        <div class="col-lg-3 col-sm-6 portfolio-item category">
            <div class="card h-100 border-0 inner">
                <div class="inner">
                    <a><img class="card-img-top" src="<?php echo $showBlogDesc4['blogImage']?>" alt="Card image cap"></a>
                </div>

                <div class="card-title">
                    <h4 class="card-title ">
                        <a href="details-page.php?id=<?php echo $showBlogDesc4['id']?>" class="text-dark small  text-decoration-none" style="margin: 0;padding: 0"><strong ><?php echo str_pad(substr($showBlogDesc4['blogTitle'],0,200),0,'.') ; ?></strong></a>
                    </h4>
                </div>
            </div>
        </div>
        <?php }?>

    </div>
    <hr>
   <h2>জনপ্রিয় ক্যাটাগরি</h2>
    <div class="row">
        <?php while ($showPopularSubCategory = mysqli_fetch_assoc($queryResult)){?>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100 rounded-circle">
                <div class="card ">
                    <div class="card-img-top  text-center">
                        <form action="categorywise-blogs.php" method="post">
                            <div class="inner">
                                <a><img src="<?php echo  $showPopularSubCategory['popularSubCategoriesImage']?>" alt="" class="img-fluid inner"></a>
                            </div>
                            <input type="submit" name="popularsubcategory-name-btn" class="btn btn-light btn-block text-dark" value="<?php echo $showPopularSubCategory['popularSubCategoriesName']?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>



    </div>
    <hr>
    <h3>পুরনো </h3>
    <div class="row">
        <?php while ($showBlogAesc3=mysqli_fetch_assoc($showBlog3)){?>
            <div class="col-lg-3 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <img class="card-img-top" src="<?php echo $showBlogAesc3['blogImage']?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title category">
                            <a href="details-page.php?id=<?php echo $showBlogAesc3['id']?>" class="text-dark small text-decoration-none" style="margin: 0;padding: 0"><strong><?php echo str_pad(substr($showBlogAesc3['blogTitle'],0,250),0,'.') ; ?></strong></a>
                        </h4>
                        <p class="card-text text-justify"><?php echo str_pad(substr($showBlogAesc3['shortDescription'],0,500),0,'.')?></p>
                    </div>
                    <div class="card-footer">
                        <a href="details-page.php?id=<?php echo $showBlogAesc3['id']?>" class="btn btn-dark">আরও পড়ুন</a>
                    </div>
                </div>
            </div>
        <?php }?>


        <div class="col-lg-3 col-sm-6">
            <!-- Categories Widget -->
            <div class="card my-0">
                <h5 class="card-header">সর্বশেষ ক্যাটাগরি</h5>
                <div class="card-body">
                    <div class="row">
                        <?php
                      /* $d=mysqli_fetch_assoc($queryResult3);
                        if(isset($d)==""){
                            echo '';
                        }else{
                            $categoryList=[];*/
                            while ($d=mysqli_fetch_assoc($queryResult1)){
                            /*   $categoryList[]=$d['category'];
                            }
                            $uniqueCategory=array_unique($categoryList);*/
                            ?>
                           <!-- --><?php /*for ($i=0;$i<count($uniqueCategory);$i++) {*/?>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="subcategorywise-blogs.php?category=<?php echo $d['category'];?>" class="text-justify text-decoration-none"><?php echo $d['category'];?></a>
                                        </li>
                                    </ul>
                                </div>
                            <?php }/*}*/?>

                    </div>

                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">আজকের খেলা</h5>
                <div class="card-body">
                    <?php while ($fixtures1=mysqli_fetch_assoc($queryResult2)){?>
                    <p>
                        <strong><?php echo $fixtures1['gameName']?></strong> <br>
                        <?php echo $fixtures1['gameFixture']?> <br>
                        <?php echo $fixtures1['gameTime']?> <br>
                        <?php echo $fixtures1['channels'] ?>
                    </p>
                    <?php }?>
                   <!-- <p>
                        <strong><?php /*echo $fixtures2['gameName']*/?></strong> <br>
                        <?php /*echo $fixtures2['gameFixture']*/?> <br>
                        <?php /*echo $fixtures2['gameTime']*/?> <br>
                        <?php /*echo $fixtures2['channels'] */?>
                    </p>-->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <hr>
</div>

<!-- /.container -->
<?php include '../../admin/includes/footer.php'?>
<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
