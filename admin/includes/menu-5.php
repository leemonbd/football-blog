<?php
require_once '../../app/classes/Validation.php';
$validation=new Validation();

$showCategoryIdOne=$validation->showCategoryIdOne();
$categoryIdOne=mysqli_fetch_assoc($showCategoryIdOne);
$showCategoryIdTwo=$validation->showCategoryIdTwo();
$categoryIdTwo=mysqli_fetch_assoc($showCategoryIdTwo);
$showCategoryIdThree=$validation->showCategoryIdThree();
$categoryIdThree=mysqli_fetch_assoc($showCategoryIdThree);
$showInternationalSubCategory=$validation->showInternationalSubCategory();
$showClubSubCategory=$validation->showClubSubCategory();
$showClubSubCategory2=$validation->showClubSubCategory();
$a=mysqli_fetch_assoc($showClubSubCategory2);
$showGameSubCategory=$validation->showGameSubCategory();

?>



<nav class="navbar fixed-top navbar-expand-lg navbar-dark  fixed-top" style="background-color: #010101">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="index.php">ফুটবলের খবর</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="my-blog.php">আমার ব্লগ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all-blogs.php">সব খবর</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo  $categoryIdOne['categoryName']?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <?php while ($internationalSubCategory=mysqli_fetch_assoc($showInternationalSubCategory)){?>
                            <a class="dropdown-item" href="subcategorywise-blogs.php?category=<?php echo $internationalSubCategory['subCategoryName']?>"><?php echo $internationalSubCategory['subCategoryName']?></a>
                        <?php }?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo  $categoryIdTwo['categoryName']?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <?php while ($clubSubCategory=mysqli_fetch_assoc($showClubSubCategory)){?>
                            <a class="dropdown-item" href="subcategorywise-blogs.php?category=<?php echo $clubSubCategory['subCategoryName']?>"><?php echo $clubSubCategory['subCategoryName']?></a>
                        <?php }?>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo  $categoryIdThree['categoryName']?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <?php while ($gameSubCategory=mysqli_fetch_assoc($showGameSubCategory)){?>
                            <a class="dropdown-item" href="subcategorywise-blogs.php?category=<?php echo $gameSubCategory['subCategoryName']?>"><?php echo $gameSubCategory['subCategoryName']?></a>
                        <?php }?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">যোগাযোগ</a>
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
                </li>

            </ul>
        </div>
    </div>
</nav>







