<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<?php 
   if(isset($data['alert'])) {
     echo $data['alert'];
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
                   <a class="nav-link mr-5" style="color:white;" href="<?php echo $_SESSION['url']?>User"><h5><b>HOME PAGE</b></h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-5" href="<?php echo $_SESSION['url']?>User"  style="color:white;"><h5><b>LIST USER</b></h5></a>
                </li>
                <?php if (isset($_SESSION['email'])) { ?>
                <li class="nav-item">
                    <a class="nav-link mr-5" href="<?php echo $_SESSION['url']?>User/information/<?php while($row = mysqli_fetch_array($data["test"])){ echo $row["id"]; }?>"  style="color:white;"><h5><b>PROFILE</b></h5></a>
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
                       
                        <li><a href="<?php echo $_SESSION['url']?>User/logout" style="color:black; font-size:15px;" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    <?php }
                    else { ?>
                        <li><a href="<?php echo $_SESSION['url']?>User/dangnhap"style="color:black; font-size:15px;  "><i class="fa fa-user fa-fw"></i>Login</a></li>
                        <li><a href="<?php echo $_SESSION['url']?>User/dangki" style="color:black; font-size:15px;"><i class="fa fa-gear fa-fw"></i>Sign Up</a></li>
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

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-7 d-flex justify-content-center mb-5">
                        <h1 class="page-header">User Creat
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-6 border" style="padding-bottom:120px">
                        <form action="./register" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label><b>Email </b></label>
                              
                                <input type="email" class="form-control  <?php if(isset($_SESSION['errors']['email'])):?>is-invalid<?php endif?>" name="email" placeholder="Please Enter Email" />
                                <?php if(isset($_SESSION['errors']['email'])):?>
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    <?php echo $_SESSION['errors']['email']?>
                                    </div>
                                <?php endif?>
                            </div>
                            <div class="form-group">
                                <label><b>Fullname</b></label>
                                <input class="form-control  <?php if(isset($_SESSION['errors']['fullname'])):?>is-invalid<?php endif?>" name="fullname" placeholder="Please Enter Fullname" />
                                <?php if(isset($_SESSION['errors']['fullname'])):?>
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    <?php echo $_SESSION['errors']['fullname']?>
                                    </div>
                                <?php endif?>
                            </div>
                            <div class="form-group">
                                <label><b>Avatar</b></label>
                                <input type="file" name="avatar" />
                            </div>
                            <div class="form-group">
                                <label><b>Phone</b></label>
                                <input class="form-control" name="phone" placeholder="Please Enter Phone" />
                            </div>
                            <div class="form-group">
                                <label><b>Password</b></label>
                                <input type="password" class="form-control  <?php if(isset($_SESSION['errors']['password'])):?>is-invalid<?php endif?>" name="password" placeholder="Please Enter Password" />
                                    <?php if(isset($_SESSION['errors']['password'])):?>
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    <?php echo $_SESSION['errors']['password']?>
                                    </div>
                                <?php endif?>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="submit">Create</button>
                            <!-- <button type="reset" name="reset" class="btn btn-primary">Reset</button> -->
                        <form>
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
