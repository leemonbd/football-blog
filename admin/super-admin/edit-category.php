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


$categoryId=$_GET['id'];
$viewCategoryByIdQueryResult=$validation->viewCategoryById($categoryId);
$viewCategoryResult=mysqli_fetch_assoc($viewCategoryByIdQueryResult);
$subCategoryId=$_GET['id'];
$viewSubCategoryByIdQueryResult=$validation->viewSubCategoryById($subCategoryId);
$viewSubCategoryResult=mysqli_fetch_assoc($viewSubCategoryByIdQueryResult);

if(isset($_POST['edit-category-btn'])){
    $validation->editCategoryByID($_POST);
}

if(isset($_POST['edit-subcategory-btn'])){
    $validation->editSubCategoriesById($_POST);
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

<div class="container" style="margin-top: 10px;">
    <div class="row" style="height: 700px">
        <div class="col-sm-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="addCategoryForm" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <h4 style="color: #1e7e34">Edit Subcategory</h4>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $viewSubCategoryResult['id']?>">
                                <input type="text" class="form-control" name="categoryName" id="categoryName" value="<?php echo $viewSubCategoryResult['categoryName']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sub-Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="subCategoryName" id="subCategoryName" value="<?php echo $viewSubCategoryResult['subCategoryName']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label></label>
                            </div>
                            <div class="col-sm-9">
                                <input type="submit" class="btn btn-success btn-block" name="edit-subcategory-btn" id="edit-subcategory-btn" value="Edit sub-category">
                            </div>
                        </div>
                    </form>


                    <hr>

                    <form action="" method="post" id="addCategoryForm" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <h4 style="color: #1e7e34">Edit Category</h4>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $viewCategoryResult['id']?>">
                                <input type="text" class="form-control" name="categoryName" id="categoryName" value="<?php echo $viewCategoryResult['categoryName']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="categoryImage" id="categoryImage" accept="image/*" value="<?php echo $viewCategoryResult['categoryImage']?>">
                                <img src="<?php echo $viewCategoryResult['categoryImage']?>" class="img-fluid pt-1" height="100px" width="100px">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label></label>
                            </div>
                            <div class="col-sm-9">
                                <input type="submit" class="btn btn-success btn-block" name="edit-category-btn" id="edit-category-btn" value="Edit category">
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
