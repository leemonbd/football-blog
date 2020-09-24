<?php
session_start();
require_once '../app/classes/Auth.php';
$auth=new Auth();

$id=$_SESSION['id'];
$accountInfo=$auth->showSignUpResult($id);
$showAccountInfo=mysqli_fetch_assoc($accountInfo);
$message='';

if (isset($_POST['edit-sign-up-btn'])){
    $auth->editSignUp($_POST);
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
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

<div class="container">
    <div class="row ">
        <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10  col-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post"  id="signUpForm">
                        <div class="form-group">
                            <?php echo $message?>
                            <label class="text-dark">নাম</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $showAccountInfo['name']?>">
                            <input type="hidden" name="id" id="name" class="form-control" value="<?php echo $showAccountInfo['id']?>">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">ইমেইল</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $showAccountInfo['email']?>">
                            <span id="emailError" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">পাসওয়ার্ড</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $showAccountInfo['password']?>">
                            <span id="passwordError" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">পাসওয়ার্ড আবার টাইপ করুন</label>
                            <input type="password" name="reTypePassword" id="reTypePassword" class="form-control" value="<?php echo $showAccountInfo['reTypePassword']?>">
                            <span id="reTypePasswordError" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">মোবাইল নাম্বার</label>
                            <input type="number" name="mobile" id="mobile" class="form-control" value="<?php echo $showAccountInfo['mobile']?>">
                            <span id="mobileError" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">
                                <input type="radio" name="gender" id="gender" value="1" <?php echo $showAccountInfo['gender']==1?'checked':'';?>>পুরুষ
                            </label>
                            <label class="text-dark">
                                <input type="radio" name="gender" id="gender" value="0" <?php echo $showAccountInfo['gender']==0?'checked':'';?>>মহিলা
                            </label>
                            <span id="genderError" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">ঠিকানা</label>
                            <textarea name="address" id="address" class="form-control"><?php echo $showAccountInfo['address']?></textarea>
                            <span id="addressError" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="edit-sign-up-btn" class="btn btn-block btn-success " id="sign-up-btn" value="আপডেট">
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>

</body>

</html>