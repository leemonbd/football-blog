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
$addFixtureShow=$validation->addFixtureShowById($id);
$addFixtureShowResult=mysqli_fetch_assoc($addFixtureShow);

if(isset($_POST['edit-fixture'])){
    $validation->addFixtureEdit($_POST);
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

<div class="container" style="margin-top: 10px;height: 700px">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
               <!-- <div class="card-title">
                    <h5 style="color: #1e7e34"><?php /*echo $fixtureEditmessage;*/?></h5>
                </div>-->
                <div class="card-body">
                    <form action="" method="post" name="editFixtureForm">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Game Name</label>
                            <div class="col-sm-9">
                                <select name="gameName">
                                    <?php while ($showCategory=mysqli_fetch_assoc($queryResult)){?>
                                        <option value="<?php echo $showCategory['subCategoryName']?>"><?php echo $showCategory['subCategoryName']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gamer Fixture</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="gameFixture" value="<?php echo $addFixtureShowResult['gameFixture'];?>">
                                <input type="hidden" class="form-control" name="id" value="<?php  echo $addFixtureShowResult['id']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Game Time</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="gameTime" value="<?php echo $addFixtureShowResult['gameTime']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label ">Channels</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="channels" value="<?php echo $addFixtureShowResult['channels']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label></label>
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success btn-block" name='edit-fixture'>Edit Fixture</button>
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
    document.forms['editFixtureForm'].elements['gameName'].value='<?php echo $addFixtureShowResult['gameName'];?>'
</script>

</body>

</html>
