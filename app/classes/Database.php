<?php


class Database
{
    public $link;
    public function __construct()
    {
        $hostName='localhost';
        $userName='root';
        $password='';
        $dbName='football-blog';
        $this->link=mysqli_connect($hostName,$userName,$password,$dbName);
    }


}