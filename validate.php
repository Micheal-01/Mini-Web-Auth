<?php
session_start();
include 'db.php';

// include_once('connection.php');

// function test_input($data) {

// $data = trim($data);
// $data = stripslashes($data);
// $data = htmlspecialchars($data);
// return $data;

// }

// if ($_SERVER["REQUEST_METHOD"]== "POST") {

//     $adminname = test_input($_POST["adminname"]);
//     $password = test_input($_POST["password"]);
//     $stmt = $conn->prepare("SELECT * FROM adminlogin");
//     $stmt->execute();
//     $users = $stmt->fetchAll();

//     foreach($users as $user) {
//         if(($user['adminname'] == $adminname) && ($user['password'] == $password)) {
//             header("Location: dashboard.php");
//         }
//         else{
//             echo "<script language='javascript'>";
//             echo "alert('WRONG INFORMATION')";
//             echo "</script";
//             die();
//         }
//     }
// }

if(isset($_POST['submit'])){
    $error = array();
 



    if(empty($_POST['email'])){
        $error = "Please Enter Email";
    }
    if(empty($_POST['password'])){
        $error = "Enter Your Password";
    
		}
    if(empty($error)){
		$stmt = $conn->prepare("SELECT * FROM adminlogin WHERE email=:em");
		$stmt->bindParam(":em",$_POST['email']);
	
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_BOTH);

        if( $stmt->rowCount() > 0 && $_POST['password'] == $row['password'] ){
			
			$_SESSION['email'] = $record['email'];
			$_SESSION['password'] = $record['password'];
			
			header("Location:dashboard.php");
			exit();
			
			}else{
				header("Location:login.php?error=either email or password incorrect");
				}
		}
        
      
    
}


?>