<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:users/index.php');
}
require_once '../app/classes/Auth.php';
$auth=new Auth();
$message='';
if (isset($_POST['sign-in-btn'])){
    $message=$auth->signIn($_POST);
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
            <div class="row"  style="margin-top: 200px;">
                <div class="col-xl-5 col-lg-5 col-md-8 col-sm-10  col-10 mx-auto">
                    <?php echo $message;?>
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" id="myForm">
                                <div class="form-group" >
                                    <label class="text-dark">ইমেইল</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>

                                <div class="form-group" >
                                    <label class="text-dark">পাসওয়ার্ড</label>
                                    <input type="password" name="password" class="form-control text-dark" id="password">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="sign-in-btn" class="btn btn-block btn-success" value="সাইন ইন" id="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <p>অ্যাকাউন্ট না থাকলে, এখানে <a href="sign-up-page.php">ক্লিক</a> করুন</p>
                    </div>

                </div>

            </div>


        </div>



        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>