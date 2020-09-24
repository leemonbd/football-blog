<?php
include "Database.php";
function valid($data){
    $valid=trim(strip_tags($data));
    return $valid;
}


class Auth
{
    public function signUp($data){
        $database=new Database();
        $name=mysqli_real_escape_string($database->link,valid($data['name']));
        $email=valid($data['email']);
        $password=valid($data['password']);
        $reTypePassword=valid($data['reTypePassword']);
        $mobile=valid($data['mobile']);
        $gender=$data['gender'];
        $address=mysqli_real_escape_string($database->link,valid($data['address']));

        $sql="INSERT INTO users VALUES ('','$name','$email','$password','$reTypePassword','$mobile','$gender','$address','2')";
        $duplicateEmailsql="SELECT * FROM users WHERE email='$email'";
        $duplicateEmailResult=mysqli_query($database->link,$duplicateEmailsql);

            if(mysqli_num_rows($duplicateEmailResult)>0) {
                $message = '<p class="text-danger">ডুপ্লিকেট ইমেইল,নতুন ইমেইল দিয়ে আবার সাইন আপ করুন!!</p>';
                return $message;
            }if(mysqli_query($database->link,$sql)){
                $message='<p class="text-success">সাইন আপ সফলভাবে সম্পন্ন হয়েছে,দয়া করে <a href="index.php">সাইন ইন</a> এ ক্লিক করুন</p>';
                return $message;

            }else{
                die('Query Problem'.mysqli_error($database->link));
            }

        }

    public function editSignUp($data){
        $database=new Database();
        $name=mysqli_real_escape_string($database->link,valid($data['name']));
        $email=valid($data['email']);
        $password=valid($data['password']);
        $reTypePassword=valid($data['reTypePassword']);
        $mobile=valid($data['mobile']);
        $gender=$data['gender'];
        $address=mysqli_real_escape_string($database->link,valid($data['address']));

        $sql="UPDATE users SET name='$name',email='$email',password='$password',reTypePassword='$reTypePassword',mobile='$mobile',gender='$gender',address='$address' WHERE id='$data[id]'";
        /*$duplicateEmailsql="SELECT * FROM users WHERE email='$email'";
        $duplicateEmailResult=mysqli_query($database->link,$duplicateEmailsql);

       if(mysqli_num_rows($duplicateEmailResult)>0) {
            $message = '<p class="text-danger">ডুপ্লিকেট ইমেইল,নতুন ইমেইল দিয়ে আবার সাইন আপ করুন!!</p>';
            return $message;
        }*/if(mysqli_query($database->link,$sql)){
            header('Location:../index.php');
            unset( $_SESSION['id']);
            unset( $_SESSION['name']);




        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function showSignUpResult($id){
        $database=new Database();
        $sql="SELECT * FROM users WHERE id='$id'";
        if(mysqli_query($database->link,$sql)){
            $signUpResult=mysqli_query($database->link,$sql);
            return $signUpResult;

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }




    public function signIn($data){
        $email=valid($data['email']);
        $password=valid($data['password']);
        $database=new Database();
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            $user=mysqli_fetch_assoc($queryResult);

            if($user && $user['roleId']==1){
                session_start();
                $_SESSION['id']=$user['id'];
                $_SESSION['name']=$user['name'];
                header('Location:home.php');
            }else if($user && $user['roleId']==2){
                session_start();
                $_SESSION['id']=$user['id'];
                $_SESSION['name']=$user['name'];
                header('Location:users/index.php');
            }
            else{
                $message = "<p class='text-danger'>সঠিক ইমেইল এবং পাসওয়ার্ড টাইপ করুন</p>";
                return $message;
            }

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function superAdminSignIn($data){
        $email=valid($data['email']);
        $password=valid($data['password']);
        $database=new Database();
        $sql="SELECT * FROM superadmin WHERE email='$email' AND password='$password'";
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            $user=mysqli_fetch_assoc($queryResult);

            if($user){
                session_start();
                $_SESSION['id']=$user['id'];
                $_SESSION['name']=$user['name'];
                header('Location:dashboard.php');
            }else{
                $message = "<p class='text-danger'>সঠিক ইমেইল এবং পাসওয়ার্ড টাইপ করুন</p>";
                return $message;
            }

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }



    public function logOut(){
        unset( $_SESSION['id']);
        unset( $_SESSION['name']);
        header('Location:../../index.php');

    }



}