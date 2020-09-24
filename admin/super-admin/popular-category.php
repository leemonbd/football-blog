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
$message='';
if(isset($_POST['save-popularsubcategory-btn'])){
    $message=$validation->addPopularSubCategories($_POST);
    //$category->addSubCategories($_POST);
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
<?php include '../includes/menu-3.php';?>

<div class="container" style="margin-top: 10px;height: 700px">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <?php echo $message;?>
            <span id="mobileErrorr"></span>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="addCategoryForm" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <h4 style="color: #1e7e34"></h4>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" name="id">
                                <select name="popularSubCategoriesName">
                                    <?php while ($showCategory=mysqli_fetch_assoc($queryResult)){?>
                                        <option value="<?php echo $showCategory['subCategoryName']?>"><?php echo $showCategory['subCategoryName']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="popularSubCategoriesImage" id="popularSubCategoriesImage" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label></label>
                            </div>
                            <div class="col-sm-9">
                                <input type="submit" class="btn btn-success btn-block" name="save-popularsubcategory-btn" id="save-popularsubcategory-btn" value="Save popular sub-category">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../includes/footer.php'?>


<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
