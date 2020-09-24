<?php
include "Database.php";
function valid($data){
    $valid=trim(strip_tags($data));
    return $valid;
}

class Category
{
    public function addCategories($data){
        $categoryName=valid($data['categoryName']);
        $sc1=valid($data['sc1']);
        $sc2=valid($data['sc2']);
        $sc3=valid($data['sc3']);
        $sc4=valid($data['sc4']);
        $sc5=valid($data['sc5']);
        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['categoryImage']['name'];
        $imageTempSource=$_FILES['categoryImage']['tmp_name'];

        $database=new Database();
        $sql="INSERT INTO categories VALUES ('','$categoryName','$sc1','$sc2', '$sc3', '$sc4', '$sc5','$imageUrl')";
        move_uploaded_file($imageTempSource,$imageUrl);
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Category added successfully</h5>";
            return $message;
        }else{
            die('Query Problem'.mysqli_error($database->link));
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



    public function viewCategoryByID($id){
        $database=new Database();
        $sql="SELECT * FROM categories WHERE id=$id";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function editCategoryByID($data){
        $id=valid($data['id']);
        $categoryName=valid($data['categoryName']);
        $sc1=valid($data['sc1']);
        $sc2=valid($data['sc2']);
        $sc3=valid($data['sc3']);
        $sc4=valid($data['sc4']);
        $sc5=valid($data['sc5']);
        $imageDirectory='../../assets/images/';
        $imageUrl=$imageDirectory.$_FILES['categoryImage']['name'];
        $imageTempSource=$_FILES['categoryImage']['tmp_name'];
        $database=new Database();


        if($_FILES['categoryImage']['name'] != ""){
            move_uploaded_file($imageTempSource,$imageUrl);
            $sql="UPDATE categories SET category='$categoryName', sc1='$sc1', sc2='$sc2', sc3='$sc3', sc4='$sc4', sc5='$sc5', categoryImage='$imageUrl' WHERE id='$id'";
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-category.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }

        }else{
            $sql="UPDATE categories SET category='$categoryName', sc1='$sc1', sc2='$sc2', sc3='$sc3', sc4='$sc4', sc5='$sc5' WHERE id='$id'";
            if(mysqli_query($database->link,$sql)){
                header('Location:manage-category.php');
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }
        }


    }

    public function deleteCategoryByID($id){
        $database=new Database();
        $sql="DELETE FROM categories WHERE id='$id'";
        if(mysqli_query($database->link,$sql)){
            $message="<h5 class='text-success'>Category deleted successfully</h5>";
            return $message;
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
        $sql="SELECT * FROM blogs LIMIT 6";
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


    public function showCategoryInMainSites(){
        $database=new Database();
        $sql="SELECT * FROM subcategories";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }


    public function showCategoryInMainSite(){
        $database=new Database();
        $sql="SELECT * FROM categories";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }






}