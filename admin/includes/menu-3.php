<?php

?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #010101">
    <div class="container">

        <a class="navbar-brand font-weight-bold" href="dashboard.php">ফুটবলের খবর</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php" >হোম</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">ব্লগ পরিচালনা</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ক্যাটাগরি তথ্য
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                        <a class="dropdown-item" href="add-category.php">ক্যাটাগরি যুক্তিকরন</a>
                        <a class="dropdown-item" href="add-subcategory.php">সাব-ক্যাটাগরি যুক্তিকরন</a>
                        <a class="dropdown-item" href="popular-category.php">জনপ্রিয় ক্যাটাগরি</a>
                        <a class="dropdown-item" href="manage-category.php">ক্যাটাগরি পরিচালনা</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php">বার্তা সংগ্রহ</a>
                </li>


            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <form class="form-inline my-2 my-lg-0" action="dashboard-blog-search-result.php" method="post">
                    <input class="form-control mr-sm-2" type="search" name="searchinput" placeholder="অনুসন্ধান..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='dashboard-blog-search-btn'>খুঁজুন</button>
                </form>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../../assets/images/logo.jpg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                        <a class="dropdown-item" href="#"><?php echo $_SESSION['name']?></a>
                        <hr>
                        <a class="dropdown-item" href="?logout=true">লগ আউট</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

