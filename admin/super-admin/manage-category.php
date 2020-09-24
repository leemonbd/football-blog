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
    $deleteCategoryByID=$_GET['id'];
    $validation->deleteCategoryByID($deleteCategoryByID);
}

if(isset($_GET['delete'])){
    $deleteSubCategoryByID=$_GET['id'];
    $validation->deleteSubCategoryByID($deleteSubCategoryByID);
}
$showSubCategoryInMainSiteQueryResult=$validation->showSubCategoryInMainSite();
$showCategoryInMainSiteQueryResult=$validation->showCategoryInMainSite();
$showPopularSubCategoryInMainSiteQueryResult=$validation->showPopularSubCategoriesInMainSite();


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
        <div class="col-sm-12 mx-auto">
            <table class="table table-dark">
                <h5 class="text-dark">Sub-Categories Table</h5>
                <thead>
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php while ($showSubCategories=mysqli_fetch_assoc($showSubCategoryInMainSiteQueryResult)){?>
                <tr>
                    <td><?php echo $showSubCategories['id']?></td>
                    <td><?php echo $showSubCategories['categoryName']?></td>
                    <td>
                        <?php echo $showSubCategories['subCategoryName']?>
                    </td>
                    <td>
                        <a href="edit-category.php?id=<?php echo $showSubCategories['id']?>">Edit</a>
                        <a href="?delete=true&subCategoryId=<?php echo $showSubCategories['id']?>">Delete</a>
                    </td>
                </tr>
                <?php }?>
                </tbody>

            </table>

            <table class="table table-dark">
                <h5 class="text-dark">Popular Sub-Categories Table</h5>
                <thead>
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Popular Sub-Category Name</th>
                    <th scope="col">Popular Sub-Category Image</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php while ($showPopularSubCategories=mysqli_fetch_assoc($showPopularSubCategoryInMainSiteQueryResult)){?>
                    <tr>
                        <td><?php echo $showPopularSubCategories['id']?></td>
                        <td><?php echo $showPopularSubCategories['popularSubCategoriesName']?></td>
                        <td>
                            <img src="<?php echo $showPopularSubCategories['popularSubCategoriesImage']?>" alt="" class="img-fluid" height="200px" width="200px">
                            <br>
                            <?php echo $showPopularSubCategories['popularSubCategoriesImage']?>
                        </td>
                        <td>
                            <a href="edit-popular-category.php?id=<?php echo $showPopularSubCategories['id']?>">Edit</a>
                            <a href="delete=true&id=<?php echo $showPopularSubCategories['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>

            </table>

            <table class="table table-dark">
                <h5 class="text-dark">Categories Table</h5>
                <thead>
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php while ($showCategories=mysqli_fetch_assoc($showCategoryInMainSiteQueryResult)){?>
                    <tr>
                        <td><?php echo $showCategories['id']?></td>
                        <td><?php echo $showCategories['categoryName']?></td>
                        <td>
                            <img src="<?php echo $showCategories['categoryImage']?>" alt="" class="img-fluid" height="200px" width="200px">
                            <br>
                            <?php echo $showCategories['categoryImage']?>
                        </td>
                        <td>
                            <a href="edit-category.php?id=<?php echo $showCategories['id']?>">Edit</a>
                            <a href="?delete=true&id=<?php echo $showCategories['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>

            </table>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'?>


<!-- Bootstrap core JavaScript -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
