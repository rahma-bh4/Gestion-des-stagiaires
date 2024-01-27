<?php
$servername="localhost";
$username="root";
$password="";
$dbname="stage";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("connection failed".mysqli_connect_error());
}
$id=$_GET['id']; 
$sql="DELETE FROM `stagiaire` WHERE id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    header("location:liste.php");
}
else{
    echo "Failed".mysqli_error($conn);
}
?>