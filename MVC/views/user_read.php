<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
    
    <!-- <link href="public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <!-- <link href="public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <!-- <link href="public/dist/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <!-- <link href="public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <!-- DataTables CSS -->
    <!-- <link href="public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"> -->

    <!-- DataTables Responsive CSS -->
    <!-- <link href="public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet"> -->
</head>

<body>
<?php if(isset($_SESSION['errors']['update'])){                
                             echo $_SESSION['errors']['update']; 
                             $_SESSION['errors']['update'] = NULL;
                            }
                             ?>

    <div id="wrapper">

    <div class="pos-f-t container-fluid">
  <div class="collapse " id="navbarToggleExternalContent">
    <div class="bg-dark pt-2" style="padding-bottom:-20px;">
    <nav class="navbar navbar-expand-md navbar-light">
    <div class="container-fluid d-flex flex-md-wrap justify-content-around">
        <div class=" " id="collapsingNavbar" >
            <ul class="nav navbar-nav d-flex justify-content-around">
                <li class="nav-item ">
                   <a class="nav-link mr-5" style="color:white;" href="http://localhost:7882/sun/php-miniproject/User"><h5><b>HOME PAGE</b></h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-5" href="http://localhost:7882/sun/php-miniproject/User"  style="color:white;"><h5><b>LIST USER</b></h5></a>
                </li>
                <?php if (isset($_SESSION['email'])) { ?>
                <li class="nav-item">
                    <a class="nav-link mr-5" href="#"  style="color:white;"><h5><b>PROFILE</b></h5></a>
                </li>
                <?php } ?>
                <li class="dropdown mt-2">
                    <a class="dropdown-toggle" style="color:white;" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> 
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <?php 
                    if (isset($_SESSION['email'])) { ?>
                        <li><a href="#" style="color:black; font-size:15px; "><i class="fa fa-gear fa-fw" ></i> Update Profile</a></li>
                       
                        <li><a href="./User/logout" style="color:black; font-size:15px;" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    <?php }
                    else { ?>
                        <li><a href="./User/dangnhap"style="color:black; font-size:15px;  "><i class="fa fa-user fa-fw"></i>Login</a></li>
                        <li><a href="./User/dangki" style="color:black; font-size:15px;"><i class="fa fa-gear fa-fw"></i>Sign Up</a></li>
                     <?php } ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
        </div>
    </div>
</nav>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <h1 class="page-header">User Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">

                            <div class="container mt-5 mb-5">


	<div class="row mt-3 d-flex justify-content-evenly container">
		<div class=" ml-5 pl-4 profile col-4 d-flex flex-column ">
			<div class=" ml-5 pl-2 mb-2">
				<h4 style="margin-left: 29px;">Profile</h4>
			</div>
			<div class ="image mb-3">
            <?php while($row = mysqli_fetch_array($data["users"])){ 
				if(($row["avatar"]!=NULL)){  ?>
					<img src="<?php echo "http://localhost:7882/sun/php-miniproject/public/upload/images/" . $row["avatar"]; ?>" style="width:230px; height:230px;float:left; border-radius:50% ; margin-right: 50px;" >
				<?php } else { ?>
					<img src="http://localhost:7882/sun/php-miniproject/public/upload/images/avatar.png" style="width:230px; height:230px;float:left; border-radius:50% ; margin-right: 50px;" >
				<?php } ?>
			</div>
			<div class="user-name d-flex justify-content-center flex-column align-items-center" style="margin-left:-84px">
				<h5><?php echo $row["fullname"]; ?> </h5>

				<p style="border-bottom: 1px solid #DCDCDC;"><?php echo $row["email"];?></p>
			</div>
			<div class="phone">
				<p style="border-bottom: 1px solid #DCDCDC;" ><img src="http://localhost:7882/sun/php-miniproject/public/upload/images/phone.jpg" style="height: 30px; width: 30px;" class="mr-2">  <?php echo $row["phone"];?></p>
			</div>
			
		</div>		

       		<div class="col-6 ml-5">
				   <h4 style="margin-left: 200px;" class="mb-4"> Edit User</h4>
                   <form action="../chinhsua/<?php echo $row["id"]; ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="email" class="form-control  <?php if(isset($_SESSION['errors']['email'])):?>is-invalid<?php endif?>" name="email" value=<?php echo $row["email"]; ?> placeholder="Please Enter Email" />
                                <?php if(isset($_SESSION['errors']['email'])):?>
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    <?php echo $_SESSION['errors']['email']?>
                                    </div>
                                <?php endif?>
                            </div>
                            <div class="form-group">
                                <label><b>Fullname</b></label>
                                <input class="form-control" name="fullname" value="<?php echo $row["fullname"] ?>" placeholder="<?php echo $row["fullname"] ?>" />
                            </div>
                            <div class="form-group">
                                <label><b>Avatar</b></label>
                                <input type="file" value="<?php echo $row["avatar"] ?>" name="avatar" />
                            </div>
                            <div class="form-group">
                                <label><b>Phone</b></label>
                                <input class="form-control" name="phone" value="<?php echo $row["phone"] ?>" placeholder="Please Enter Phone" />
                            </div>
                            <div class="form-group">
                                <label><b>Password</b></label>
                                <input type="password" class="form-control  <?php if(isset($_SESSION['errors']['password'])):?>is-invalid<?php endif?>" name="password" value="<?php echo $row["password"] ?>" placeholder="Please Enter Password" />
                                    <?php if(isset($_SESSION['errors']['password'])):?>
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    <?php echo $_SESSION['errors']['password']?>
                                    </div>
                                <?php endif?>
                            </div>
                    <div class=" d-flex align-items-center flex-column">
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Send</button>
                    </div>
                </form>
                </div>
       		</div>
	</div>
    <?php } ?>
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

 
    <!-- DataTables JavaScript -->
    <!-- <script src="public/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
