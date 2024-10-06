<?php
include("connection.php");

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="DELETE FROM emp WHERE id=$id";
    mysqli_query($con, $sql);
}

header("location: index.php");


?>