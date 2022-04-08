<?php

session_start();

$mysqli=new mysqli('localhost','root','','crud')or die(mysqli_error($mysqli)); 

$id=0;
$update=false;
$pincode='';
$center='';
$location='';
$Covishield='';
$Covaxin='';


if(isset($_POST['save'])){
    $pincode=$_POST['pincode'];
    $center=$_POST['center'];
    $location=$_POST['location'];
    $Covishield=$_POST['Covishield'];
    $Covaxin=$_POST['Covaxin'];
     
    $mysqli->query("INSERT  INTO data (pincode,center,location,Covishield,Covaxin)VALUES('$pincode','$center','$location','$Covishield','$Covaxin')") or die($mysqli->error);
    
    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="success";
    
    header('location: c19database.php');
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
    
    header('location: c19database.php');
    
}

if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if(count(array($result))==1){
        $row=$result->fetch_array();
        $pincode=$row['pincode'];
        $center=$row['center'];
        $location=$row['location'];
        $Covishield=$row['Covishield'];
        $Covaxin=$row['Covaxin'];
    }
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $pincode=$_POST['pincode'];
    $center=$_POST['center'];
    $location=$_POST['location'];
    $Covishield=$_POST['Covishield'];
    $Covaxin=$_POST['Covaxin'];
    
    $mysqli->query("UPDATE data SET pincode='$pincode',center='$center',location='$location',Covishield='$Covishield',Covaxin='$Covaxin' WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";
    
    header('location: c19database.php');
    
}
