<?php
session_start();
include "db.php";

if(isset($_GET['id'])){
	$id = $_GET['id'];
	}else{
		header("Location:manage_account.php");
		}
		
		


$stmt = $conn->prepare("SELECT * FROM contacts WHERE id=:id");
$stmt->bindParam(":id",$id);
$stmt->execute();

$record = $stmt->fetch(PDO::FETCH_BOTH);
if($stmt->rowCount() < 1){
	header("location:manage_account.php");
	exit();
	}


    if(isset($_POST['submit'])){
        $error = array();
    if(empty($_POST['firstname'])){
        $error['firstname'] = "Enter Firstname";
        }
    if(empty($_POST['lastname'])){
        $error['lastname'] = "Enter Lastname";
        }
    if(empty($_POST['username'])){
        $error['username'] = "Enter Username";
        }
    if(empty($_POST['phonenumber'])){
        $error['phonenumber'] = "Enter Phone Number";
        }
    if(empty($_POST['email'])){
        $error['email'] = "Enter Email";
        }
    if(empty($error)){
	$statement = $conn->prepare("UPDATE contacts SET firstname=:fn,lastname=:ln,username=:un,phonenumber=:pn,email=:em WHERE id=:id");
	$statement->bindParam(":fn",$_POST['firstname']);
	$statement->bindParam(":ln",$_POST['lastname']);
	$statement->bindParam(":un",$_POST['username']);
	$statement->bindParam(":pn",$_POST['phonenumber']);
	$statement->bindParam(":em",$_POST['email']);
	$statement->bindParam(":id",$id);
	
	$statement->execute();
 
    header("Location:manage_account.php");
    exit();
    
        }
    }
    
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Content</title>
</head>

<body>
<br/>
<form action="" method="post">
	<input type="text" name="firstname" placeholder="Firstname" value="<?= $record['firstname']?>"/><br/>
    <input type="text" name="lastname" placeholder="Lastname" value="<?= $record['lastname']?>"/><br/>
    <input type="text" name="username" placeholder="Username" value="<?= $record['username']?>"/><br/>
    <input type="text" name="phonenumber" placeholder="Phone Number" value="<?= $record['phonenumber']?>"/><br/>
    <input type="text" name="email" placeholder="Email" value="<?= $record['email']?>"/><br/>
    
    <input type="submit" name="submit" value="Update"/>
</form>
</body>
</html>