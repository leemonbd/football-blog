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

$queryResult=$validation->showSubCategoryInMainSite();

$id=$_GET['id'];
$showBlogInfoByID=$validation->showBlogInfoByID($id);
$showBlogInfoByIDResult=mysqli_fetch_assoc($showBlogInfoByID);

if(isset($_POST['edit-blog-btn'])){
    $validation->editBlog($_POST);
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
<?php include '../includes/menu-4.php';?>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <!--<div class="card-title">
                    <h5 style="color: #1e7e34"><?php /*echo $message;*/?></h5>
                </div>-->
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" name="editBlogForm">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sub Category</label>
                            <div class="col-sm-9">
                                <select name="category">
                                    <?php while ($showCategory=mysqli_fetch_assoc($queryResult)){?>
                                        <option value="<?php echo $showCategory['subCategoryName']?>"><?php echo $showCategory['subCategoryName']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="blogTitle" value="<?php echo $showBlogInfoByIDResult['blogTitle']?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $showBlogInfoByIDResult['id']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="shortDescription"><?php echo $showBlogInfoByIDResult['shortDescription']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control textarea" name="longDescription" rows="11"><?php echo $showBlogInfoByIDResult['longDescription']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="blogImage" accept="image/*" value="<?php echo $showBlogInfoByIDResult['blogImage']?>">
                                <img src="<?php echo $showBlogInfoByIDResult['blogImage']?>" height="100px" width="100px" class="img-fluid pt-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label></label>
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success btn-block" name='edit-blog-btn'>Edit Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'?>
<?php include '../includes/modal.php'?>

<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'.textarea'});</script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    document.forms['editBlogForm'].elements['category'].value='<?php echo $showBlogInfoByIDResult['category'];?>'
</script>
</body>

</html>
