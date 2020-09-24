<?php
include "Database.php";


class Blog
{

    function valid($data){
        $valid=trim(strip_tags($data));
        return $valid;
    }

    public function showBlogInMainSite(){
        $database=new Database();
        $sql="SELECT * FROM blogs";
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
        $sql="SELECT * FROM blogs WHERE userId='$id' ORDER BY id DESC" ;
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showBlogCategorywise($category){
        $database=new Database();
        $sql="SELECT * FROM blogs WHERE category='$category'" ;
        if(mysqli_query($database->link,$sql)){
            $queryResult5=mysqli_query($database->link,$sql);
            return $queryResult5;
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


    public function singleCategoryShow($data){
        $id=valid($data['id']);
        $category=valid($data['category']);
        $database=new Database();
        $sql="UPDATE blog_post SET status='$category' WHERE id='$id'";

        if(mysqli_query($database->link,$sql)){
            header('Location:admin.php');
        }else{
            die('Query problem'.mysqli_error($database->link));
        }

    }

}