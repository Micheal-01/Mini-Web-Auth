<?php

include'db.php';
if(isset($_POST['submit'])){
	$error = array();
if(empty($_POST['firstname'])){
	$error['name'] = "Enter Firstname";
	}
if(empty($_POST['lastname'])){
	$error['name'] = "Enter Lastname";
	}
if(empty($_POST['username'])){
	$error['name'] = "Enter Username";
	}
if(empty($_POST['phone_number'])){
	$error['phone_number'] = "Please Enter Phone Number";
	}else{
		if(!is_numeric($_POST['phone_number'])){
			$error['phone_number'] = "Please Enter a Numeric Value";
			}
if(empty($_POST['email'])){
	$error['email'] = "Enter Email";
	}
		}

	if(empty($error)){
		$stmt = $conn->prepare("INSERT INTO contacts VALUES(NULL,:fn,:ln,:un,:pn,:em)");
		$data = array(
			":fn"=>$_POST['firstname'],
			":ln"=>$_POST['lastname'],
			":un"=>$_POST['username'],
			":pn"=>$_POST['phone_number'],
			":em"=>$_POST['email']
		);
		$stmt->execute($data);
		header("Location:manage_account.php");
		exit();
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
    

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHP Auth Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/php-auth-admin.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('side-nav.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-12" style="text-align: center;padding-top: 10%;">
                           
                     <!--   <body class="bg-gradient-primary">-->

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg " style="margin-top: -4em; ">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form class="user" action="" method="post">
                                
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="inputFirstName" class="form-label">First Name</label>
                                        <input type="text" name="firstname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
</div>
<div class="col-sm-6">

<label for="inputLastName" class="form-label">Last Name</label>
                                        <input type="text" name="lastname" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">

</div>
                                    </div>
                                 
                               
                                <div class="form-group">
                                    <label for="inputUsername" class="form-label">Username</label>
                                    <input type="Username" name="username" class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
								<div class="form-group">
                                    <label for="inputEmailAddress" class="form-label">Phone number</label>
                                    <input type="tel" class="form-control form-control-user" name="phone_number" id="exampleInputEmail"
                                        placeholder="Phone Number">
                                </div>
                             
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-user btn-block"/>
                             
                              
                            </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/php-auth-admin.min.js"></script>

                            
                            
                        </div>

                    </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/php-auth-admin.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>