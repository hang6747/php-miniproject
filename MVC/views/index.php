<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>LIST USER</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
 
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php 
                    if (isset($_SESSION['email'])) {
                        echo "<a class='navbar-brand' href=''>" . $_SESSION['email'];
                    }
                    else {
                        echo "<a class='navbar-brand' href=''> NONE" ;
                    }
                ?>
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            <?php if(isset($_SESSION['errors']['success'])){                
                             echo $_SESSION['errors']['success']; 
                           $_SESSION['errors']['success']=NULL;
                   }
                  if(isset($_SESSION['errors']['logout'])) {
                             echo $_SESSION['errors']['logout'];
                             $_SESSION['errors']['logout']=NULL;
                            }
                            
                             if(isset($_SESSION['errors']['update'])) {
                                echo $_SESSION['errors']['update'];
                                $_SESSION['errors']['update']=NULL;
                            }
                            if(isset($_SESSION['errors']['register'])) {
                                echo $_SESSION['errors']['register'];
                                $_SESSION['errors']['register']=NULL;
                            }
                           ?>
                  

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <?php 
                    if (isset($_SESSION['email'])) { ?>
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="./User/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    <?php }
                    else { ?>
                        <li><a href="./User/dangnhap"><i class="fa fa-user fa-fw"></i>Login</a></li>
                        <li><a href="./User/dangki"><i class="fa fa-gear fa-fw"></i>Sign Up</a></li>
                     <?php } ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./User">List User</a>
                                </li>
                                <li>
                                    <a href="./User/dangki">Create User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Email</th>
                                <th>Fullname</th>
                                <th>phone</th>
                                <th>C-R-U-D</th>                   
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_array($data["users"])){ ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["fullname"]; ?></td>
                                <td><?php echo $row["phone"]; ?> </td>
                                <td class="center">
                                    <button><a href="./User/information/<?php echo $row["id"]; ?>"><i class="fa fa-eye"></i></button>
                                    <button><a href="./User/update/<?php echo $row["id"]; ?>"><i class="fa fa-pencil"></i></button>
                                    <button>
                                        <a  class="delete" href="./User/delete/<?php echo $row["id"]; ?>" >
                                     <i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
    <script src="public/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="public/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

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
