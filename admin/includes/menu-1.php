<?php

?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #010101">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="index.php">ফুটবলের খবর</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" >হোম</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my-blog.php">আমার ব্লগ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="write-blog.php">ব্লগ লিখুন</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../../assets/images/logo.jpg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                        <a class="dropdown-item" href="#"><?php echo $_SESSION['name']?></a>
                        <hr>
                        <a class="dropdown-item" href="../edit-sign-up-page.php">অ্যাকাউন্টের তথ্য</a>
                        <a class="dropdown-item" href="?logout=true">লগ আউট</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

