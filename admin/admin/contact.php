<?php
session_start();
if($_SESSION['id']==null){
    header('Location:index.php');
}
require '../../app/classes/Validation.php';
$validation=new Validation();
if(isset($_GET['logout'])){
    $validation->logOut();
}


$message='';
if(isset($_POST['send-message-btn'])) {
    $message = $validation->sendMessage($_POST);
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
    <?php include '../../admin/includes/menu-5.php';?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <small>যোগাযোগ</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="home.php">প্রচ্ছদ</a>
            </li>
            <li class="breadcrumb-item active">যোগাযোগ</li>
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map -->
                <iframe style="width: 100%; height: 400px; border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223974903!2d90.2792398547864!3d23.780887453399956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1594105462202!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>যোগাযোগের ঠিকানা</h3>
                <p>
                    ঢাকা,<br>বাংলাদেশ<br>
                </p>
                <p>মোবাইল নাম্বার : ০১৯১৮৮৪৫৪০৪</p>
                <p>
                   ইমেইল :<a> limoninfoo@gmail.com </a>
                </p>
            </div>
        </div>
        <hr>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>আপনার মতামত জানান</h3>
                <hr>
                <?php echo $message; ?>
                <h4 id="contactFormError" class="text-danger"></h4>
                <form name="sendMessage" id="contactForm" novalidate action="" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>পুরো নাম:</label>
                            <input type="text" class="form-control" id="fullName" name="fullName">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>মোবাইল নাম্বার:</label>
                            <input type="number" class="form-control" id="mobile" name="mobile">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <p id="emailErrorMessage" class="text-danger"></p>
                            <label>ইমেইল:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>আপনার বার্তা লিখুন:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary" name="send-message-btn" id="send-message-btn">বার্তা পাঠান</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->




    <?php include '../../admin/includes/footer.php'?>
    <?php //include 'admin/includes/modal.php'?>

    <!-- Bootstrap core JavaScript -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>

</body>

</html>
