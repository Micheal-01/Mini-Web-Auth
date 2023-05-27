<?php
session_start();

include"db.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	}else{
		header("Location:manage_account.php");
		}

//if(!isset($_GET['id'])){
	//header("Location:manager.php");
	//exit();
//	}
	
	
$statement = $conn->prepare("DELETE FROM contacts WHERE id=:id");
$statement->bindParam(":id",$id);
$statement->execute();

header("location:manage_account.php");
exit();
?>