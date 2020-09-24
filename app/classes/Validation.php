<?php
include "Database.php";
function valid($data){
    $valid=trim(strip_tags($data));
    return $valid;
}

class Validation
{
    public function addCategories($data){
        $categoryName=valid($data['categoryName']);
        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['categoryImage']['name'];
        $imageTempSource=$_FILES['categoryImage']['tmp_name'];

        $database=new Database();
        $sql="INSERT INTO categories VALUES ('','$categoryName','$imageUrl')";
        move_uploaded_file($imageTempSource,$imageUrl);
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Category added successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showCategoryInMainSite(){
        $database=new Database();
        $sql="SELECT * FROM categories";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showCategoryIdOne(){
        $database=new Database();
        $sql="SELECT * FROM categories WHERE id='1'";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }
    public function showCategoryIdTwo(){
        $database=new Database();
        $sql="SELECT * FROM categories WHERE id='2'";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }
    public function showCategoryIdThree(){
        $database=new Database();
        $sql="SELECT * FROM categories WHERE id='3'";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function viewCategoryById($categoryId){
        $database=new Database();
        $sql="SELECT * FROM categories WHERE id='$categoryId'";
        if(mysqli_query($database->link,$sql)){
            $viewCategoryByIdQueryResult=mysqli_query($database->link,$sql);
            return $viewCategoryByIdQueryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function editCategoryByID($data){
        $categoryName=valid($data['categoryName']);
        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['categoryImage']['name'];
        $imageTempSource=$_FILES['categoryImage']['tmp_name'];

        $database=new Database();

        if($_FILES['categoryImage']['name'] != ""){
            move_uploaded_file($imageTempSource,$imageUrl);
            $sql="UPDATE categories SET categoryName='$categoryName', categoryImage='$imageUrl' WHERE id='$data[id]'";
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-category.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }

        }else{
            $sql="UPDATE categories SET categoryName='$categoryName'  WHERE id='$data[id]'";
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-category.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }
        }


    }

    public function deleteCategoryByID($deleteCategoryByID){
        $database=new Database();
        $sql="DELETE FROM categories WHERE id='$deleteCategoryByID'";
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Category deleted successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }


    public function addSubCategories($data){
        $categoryName=$data['categoryName'];
        $subCategoryName=valid($data['subCategoryName']);
        $database=new Database();
        $sql="INSERT INTO subcategories VALUES ('','$categoryName','$subCategoryName')";
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Sub-category added successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showSubCategoryInMainSite(){
        $database=new Database();
        $sql="SELECT * FROM subcategories";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showInternationalSubCategory(){
        $database=new Database();
        $sql="SELECT subCategoryName FROM subcategories where categoryName='আন্তর্জাতিক ফুটবল'";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showClubSubCategory(){
        $database=new Database();
        $sql="SELECT subCategoryName FROM subcategories where categoryName='ক্লাব ফুটবল'";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showGameSubCategory(){
        $database=new Database();
        $sql="SELECT subCategoryName FROM subcategories where categoryName='ফুটবল ভিডিও গেম'";
        //$sql="SELECT c.*,s.* FROM categories as c,subcategories as s where c.categoryName=s.categoryName";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function viewSubCategoryById($subCategoryId){
        $database=new Database();
        $sql="SELECT * FROM subcategories WHERE id='$subCategoryId'";
        if(mysqli_query($database->link,$sql)){
            $viewSubCategoryByIdQueryResult=mysqli_query($database->link,$sql);
            return $viewSubCategoryByIdQueryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }



    public function editSubCategoriesById($data){
        $subCategoryName=valid($data['subCategoryName']);
        $categoryName=valid($data['categoryName']);
        $database=new Database();
        $sql="UPDATE subcategories SET categoryName='$categoryName',subCategoryName='$subCategoryName' WHERE id='$data[id]'";
        if(mysqli_query($database->link,$sql)){
            header('Location:manage-category.php');
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function deleteSubCategoryByID($deleteSubCategoryByID){
        $database=new Database();
        $sql="DELETE FROM subcategories WHERE id='$deleteSubCategoryByID'";
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Category deleted successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }


    public function addPopularSubCategories($data){
        $popularSubCategoriesName=$data['popularSubCategoriesName'];
        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['popularSubCategoriesImage']['name'];
        $imageTempSource=$_FILES['popularSubCategoriesImage']['tmp_name'];

        $database=new Database();
        $sql="INSERT INTO popular_subcategories VALUES ('','$popularSubCategoriesName','$imageUrl')";
        move_uploaded_file($imageTempSource,$imageUrl);
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Popular subCategory added successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }



    public function showPopularSubCategoriesInMainSite(){
        $database=new Database();
        $sql="SELECT * FROM popular_subcategories";
        if(mysqli_query($database->link,$sql)){
            $showPopularSubCategoryInMainSiteQueryResult=mysqli_query($database->link,$sql);
            return $showPopularSubCategoryInMainSiteQueryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showPopularSubCategoriesById($id){
        $database=new Database();
        $sql="SELECT * FROM popular_subcategories WHERE id='$id' ";
        if(mysqli_query($database->link,$sql)){
            $showPopularSubCategoryByIdQueryResult=mysqli_query($database->link,$sql);
            return $showPopularSubCategoryByIdQueryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function editPopularSubCategories($data){
        $popularSubCategoriesName=valid($data['popularSubCategoriesName']);
        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['popularSubCategoriesImage']['name'];
        $imageTempSource=$_FILES['popularSubCategoriesImage']['tmp_name'];

        $database=new Database();
        if($_FILES['popularSubCategoriesImage']['name'] != ""){
            move_uploaded_file($imageTempSource,$imageUrl);
            $sql="UPDATE popular_subcategories SET popularSubCategoriesName='$popularSubCategoriesName',popularSubCategoriesImage='$imageUrl' WHERE id='$data[id]'";
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-category.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }

        }else{
            move_uploaded_file($imageTempSource,$imageUrl);
            $sql="UPDATE popular_subcategories SET popularSubCategoriesName='$popularSubCategoriesName' WHERE id='$data[id]'";
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-category.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }
        }
    }

    public function addBlog($data){
        $database=new Database();
        $categor=valid($data['category']);
        $blogTitl=valid($data['blogTitle']);
        $shortDescriptio=valid($data['shortDescription']);
        $longDescriptio=valid($data['longDescription']);
        $category=mysqli_real_escape_string($database->link,$categor);
        $blogTitle=mysqli_real_escape_string($database->link,$blogTitl);
        $shortDescription=mysqli_real_escape_string($database->link,$shortDescriptio);
        $longDescription=mysqli_real_escape_string($database->link,$longDescriptio);

        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['blogImage']['name'];
        $imageTempSource=$_FILES['blogImage']['tmp_name'];

        $userId=$_SESSION['id'];
        $sql="INSERT INTO blogs VALUES ('','$category','$blogTitle','$shortDescription','$longDescription', '$imageUrl','Hold','','$userId')";
        move_uploaded_file($imageTempSource,$imageUrl);
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Blog added successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function editBlog($data){
        $database=new Database();
        $categor=valid($data['category']);
        $blogTitl=valid($data['blogTitle']);
        $shortDescriptio=valid($data['shortDescription']);
        $longDescriptio=valid($data['longDescription']);
        $category=mysqli_real_escape_string($database->link,$categor);
        $blogTitle=mysqli_real_escape_string($database->link,$blogTitl);
        $shortDescription=mysqli_real_escape_string($database->link,$shortDescriptio);
        $longDescription=mysqli_real_escape_string($database->link,$longDescriptio);

        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['blogImage']['name'];
        $imageTempSource=$_FILES['blogImage']['tmp_name'];

        $database=new Database();

        if($_FILES['blogImage']['name'] != ""){
            $sql="UPDATE blogs SET category='$category',blogTitle='$blogTitle',shortDescription='$shortDescription',longDescription='$longDescription', blogImage='$imageUrl' WHERE id='$data[id]'";
            move_uploaded_file($imageTempSource,$imageUrl);
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-blog.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }

        }else{
            $sql="UPDATE blogs SET category='$category',blogTitle='$blogTitle',shortDescription='$shortDescription',longDescription='$longDescription' WHERE id='$data[id]'";
            move_uploaded_file($imageTempSource,$imageUrl);
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-blog.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }

        }



    }

    public function showBlogInfoByID($id){
        $database=new Database();
        $sql="SELECT * FROM blogs WHERE id='$id'";
        if(mysqli_query($database->link,$sql)){
            $showBlogInfoByID=mysqli_query($database->link,$sql);
            return $showBlogInfoByID;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }



    public function addFixture($data){
        $database=new Database();
        $gameNam=valid($data['gameName']);
        $gameFixtur=valid($data['gameFixture']);
        $gameTim=valid($data['gameTime']);
        $channel=valid($data['channels']);
        $gameName=mysqli_real_escape_string($database->link,$gameNam);
        $gameFixture=mysqli_real_escape_string($database->link,$gameFixtur);
        $gameTime=mysqli_real_escape_string($database->link,$gameTim);
        $channels=mysqli_real_escape_string($database->link,$channel);

        $sql="INSERT INTO addfixtures VALUES ('','$gameName','$gameFixture','$gameTime','$channels')";
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Fixture deleted successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogInMainSite(){
        $database=new Database();
        $sql="SELECT * FROM blogs WHERE status='Accept' limit 6";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogInMainSites(){
        $database=new Database();
        $sql="SELECT * FROM blogs ORDER BY id DESC";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogInMainSiteDesc(){

        $database=new Database();
        $sql="SELECT * FROM blogs WHERE status='Accept' ORDER BY id DESC LIMIT 6 ";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogInMainSiteAesc(){

        $database=new Database();
        $sql="SELECT * FROM blogs WHERE status='Accept' ORDER BY id  DESC LIMIT 4,3 ";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogInMainSiteDescUser1(){

        $database=new Database();
        $sql="SELECT * FROM blogs WHERE userId='1' AND status='Accept' ORDER BY id DESC LIMIT 1 ";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogInMainSiteDescFour(){

        $database=new Database();
        $sql="SELECT * FROM blogs WHERE status='Accept' ORDER BY id DESC LIMIT 4";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }
    public function showBlogCategory(){
        $database=new Database();
        $sql="SELECT category FROM blogs LIMIT 6";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function addFixtureShow(){
        $database=new Database();
        $sql="SELECT * FROM addfixtures";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function addFixtureShowById($id){
        $database=new Database();
        $sql="SELECT * FROM addfixtures WHERE id=$id";
        if(mysqli_query($database->link,$sql)){
            $addFixtureShow=mysqli_query($database->link,$sql);
            return $addFixtureShow;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function addFixtureEdit($data){
        $database=new Database();
        $gameNam=valid($data['gameName']);
        $gameFixtur=valid($data['gameFixture']);
        $gameTim=valid($data['gameTime']);
        $channel=valid($data['channels']);
        $gameName=mysqli_real_escape_string($database->link,$gameNam);
        $gameFixture=mysqli_real_escape_string($database->link,$gameFixtur);
        $gameTime=mysqli_real_escape_string($database->link,$gameTim);
        $channels=mysqli_real_escape_string($database->link,$channel);
        $database=new Database();
        $sql="UPDATE addfixtures SET gameName='$gameName',gameFixture='$gameFixture',gameTime='$gameTime', channels='$channels' WHERE id='$data[id]'";
        if(mysqli_query($database->link,$sql)){
            header('Location:manage-blog.php');
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function deleteFixtureById($deleteFixtureById){
        $database=new Database();
        $sql="DELETE FROM addfixtures WHERE id='$deleteFixtureById'";
        if(mysqli_query($database->link,$sql)){
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }



    public function connection(){
        $database=new Database();
        $sql="SELECT s.*,c.id FROM subcategories as s,categories as c where s.categoryId=c.id";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }


    public function showBlogInYourBlogDesc(){
        $database=new Database();
        $id=$_SESSION['id'];
        $sql="SELECT * FROM blogs WHERE userId='$id' ORDER BY id DESC " ;
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogInYourBlog(){
        $database=new Database();
        $id=$_SESSION['id'];
        $sql="SELECT * FROM blogs WHERE userId='$id'" ;
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogCategorywise($category){
        $database=new Database();
        $id=$_SESSION['id'];
        $sql="SELECT * FROM blogs WHERE category='$category' AND userId='$id'" ;
        if(mysqli_query($database->link,$sql)){
            $queryResult5=mysqli_query($database->link,$sql);
            return $queryResult5;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogSubCategorywise($category){
        $database=new Database();
        $sql="SELECT * FROM blogs WHERE category='$category' &&  status='Accept'" ;
        if(mysqli_query($database->link,$sql)){
            $queryResult5=mysqli_query($database->link,$sql);
            return $queryResult5;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogSubCategorywise2($showPopularSubCategories){
        $database=new Database();
        $sql="SELECT * FROM blogs WHERE category='$showPopularSubCategories' &&  status='Accept'" ;
        if(mysqli_query($database->link,$sql)){
            $showPopularSubCategory=mysqli_query($database->link,$sql);
            return $showPopularSubCategory;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function deleteBlogById($deleteBlogById){
        $database=new Database();
        $sql="DELETE FROM blogs WHERE id='$deleteBlogById'";
        if(mysqli_query($database->link,$sql)){
            header('Location:dashboard.php');
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }




    public function sendMessage($data){
        $database=new Database();
        $fullNam=valid($data['fullName']);
        $mobil=valid($data['mobile']);
        $emai=valid($data['email']);
        $messag=valid($data['message']);
        $fullName=mysqli_real_escape_string($database->link,$fullNam);
        $mobile=mysqli_real_escape_string($database->link,$mobil);
        $email=mysqli_real_escape_string($database->link,$emai);
        $message=mysqli_real_escape_string($database->link,$messag);
        $sql="INSERT INTO sendmessage VALUES ('','$fullName','$mobile','$email','$message','')";
        if(mysqli_query($database->link,$sql)){
            $message='<h4 class="text-success">আপনার বার্তা পাঠানো সফলভাবে সম্পন্ন হয়েছে</h4>';
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function paginationPageMessage(){
        $database=new Database();
        $sql="SELECT * FROM sendmessage";
        if(mysqli_query($database->link,$sql)){
            $numPerRow=12;
            $queryPagination=mysqli_query($database->link,$sql);
            $totalRecord=mysqli_num_rows($queryPagination);
            $totalPages=ceil($totalRecord/$numPerRow);
            return $totalPages;

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function showMessageById($id){
        $database=new Database();
        $sql="SELECT * FROM sendmessage WHERE id='$id'";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function deleteMessageById($deleteMessageById){
        $database=new Database();
        $sql="DELETE FROM sendmessage WHERE id='$deleteMessageById'";
        if(mysqli_query($database->link,$sql)){
            header('Location:message.php');
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function commentsShow2($data){
        $id=$_SESSION['id'];
        $blogId=valid($data['blogId']);
        $database=new Database();
        //$comment=mysqli_real_escape_string($database->link,$commen);
        $sql="SELECT * FROM comments WHERE userId='$id' AND blogId='$blogId' ORDER BY id DESC";
        if(mysqli_query($database->link,$sql)){
            $queryComment=mysqli_query($database->link,$sql);
            return $queryComment;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function searchBlog($data){
        $database=new Database();
        $searchInpu=valid($data['searchinput']);
        $searchInput=mysqli_real_escape_string($database->link,$searchInpu);
        $sql="SELECT * FROM blogs WHERE status='Accept' AND blogTitle LIKE '%$searchInput%'";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $search=mysqli_query($database->link,$sql);
            return $search;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function searchBlogBySessionId($data){
        $database=new Database();
        $sessionId=$_SESSION['id'];
        $searchInpu=valid($data['searchinput']);
        $searchInput=mysqli_real_escape_string($database->link,$searchInpu);
        $sql="SELECT * FROM blogs WHERE blogTitle LIKE '%$searchInput%' AND userId='$sessionId'";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $search=mysqli_query($database->link,$sql);
            return $search;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function paginationPage(){
        $database=new Database();
        $sql="SELECT * FROM blogs WHERE status='Accept'";
        if(mysqli_query($database->link,$sql)){
            $numPerRow=8;
            $queryPagination=mysqli_query($database->link,$sql);
            $totalRecord=mysqli_num_rows($queryPagination);
            $totalPages=ceil($totalRecord/$numPerRow);
            return $totalPages;


        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function paginationPage2(){
        $id=$_SESSION['id'];
        $database=new Database();
        $sql="SELECT * FROM blogs WHERE userId='$id'";
        if(mysqli_query($database->link,$sql)){
            $numPerRow=4;
            $queryPagination=mysqli_query($database->link,$sql);
            $totalRecord=mysqli_num_rows($queryPagination);
            $totalPages=ceil($totalRecord/$numPerRow);
            return $totalPages;


        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function paginationPage3(){
        $id=$_SESSION['id'];
        $database=new Database();
        $sql="SELECT * FROM blogs";
        if(mysqli_query($database->link,$sql)){
            $numPerRow=10;
            $queryPagination=mysqli_query($database->link,$sql);
            $totalRecord=mysqli_num_rows($queryPagination);
            $totalPages=ceil($totalRecord/$numPerRow);
            return $totalPages;

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function paginationPage4(){
        $database=new Database();
        $sql="SELECT * FROM blogs";
        if(mysqli_query($database->link,$sql)){
            $numPerRow=12;
            $queryPagination=mysqli_query($database->link,$sql);
            $totalRecord=mysqli_num_rows($queryPagination);
            $totalPages=ceil($totalRecord/$numPerRow);
            return $totalPages;

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function mainCategoryButton($data){
        $categoryName=$data['category-name-btn'];
        $database=new Database();
        $sql="SELECT b.*,s.* FROM blogs as b,subcategories as s  where s.categoryName='$categoryName' AND b.category=s.subCategoryName ORDER BY b.id DESC LIMIT 30";;
        if(mysqli_query($database->link,$sql)){
            $showMainCategory=mysqli_query($database->link,$sql);
            return $showMainCategory;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function statusUpdate($data){
        $status=$data['status'];
        $id=$data['id'];
        $database=new Database();
        $sql="UPDATE blogs SET status='$status' WHERE id='$id'";

        if(mysqli_query($database->link,$sql)){
            header('Location:dashboard.php');
        }else{
            die('Query problem'.mysqli_error($database->link));
        }

    }



    public function dateConverter(){
        $currentDate = date("l, F j, Y");
        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
            'May','June','July','August','September','October','November','December','Saturday','Sunday',
            'Monday','Tuesday','Wednesday','Thursday','Friday');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
            'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
             বুধবার','বৃহস্পতিবার','শুক্রবার'
        );
        $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
        return $convertedDATE;
    }

    public function logOut(){
        unset( $_SESSION['id']);
        unset( $_SESSION['name']);
        header('Location:../../index.php');

    }



}