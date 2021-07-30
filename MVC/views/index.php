<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>LIST USER</title>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
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
    <div class="pos-f-t container-fluid">
  <div class="collapse " id="navbarToggleExternalContent">
    <div class="bg-dark pt-2" style="padding-bottom:-20px;">
    <nav class="navbar navbar-expand-md navbar-light">
    <div class="container-fluid d-flex flex-md-wrap justify-content-around">
        <div class=" " id="collapsingNavbar" >
            <ul class="nav navbar-nav d-flex justify-content-around mt-2">
                <li class="nav-item ">
                   <a class="nav-link mr-5" style="color:white;" href="<?php echo $_SESSION['url']?>User"><h5><b>HOME PAGE</b></h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-5" href="<?php echo $_SESSION['url']?>User"  style="color:white;"><h5><b>LIST USER</b></h5></a>
                </li>
                <?php if (isset($_SESSION['email'])) { ?>
                <li class="nav-item">
                    <a class="nav-link mr-5" href="<?php echo $_SESSION['url']?>User/information/  <?php while($row = mysqli_fetch_array($data["test"])){ echo $row["id"]; }?>" style="color:white;"><h5><b>PROFILE</b></h5></a>
                </li>
                <?php } ?>
                <li class="dropdown mt-2">
                    <a class="dropdown-toggle" style="color:white;" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> 
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <?php 
                    if (isset($_SESSION['email'])) { ?>
                    
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

          
    <!-- <div id="wrapper"  class="container-fluid row ">
   -->
             
        <!-- Page Content -->
        <div id="page-wrapper" class=" d-flex container-fluid" >
            
            <div class = "user col-2 d-flex justify-content-center" style = "background-color: #cccccc;"  >
            
                <div class="mt-4">
                <?php while($row = mysqli_fetch_array($data["kq"])){ 
				if(($row["avatar"]!=NULL)){  ?>
                       <img class ="ml-5" src = "<?php echo $_SESSION['url']?>public/upload/images/<?php echo $row["avatar"]; ?>" style="border-radius:50%; height:130px; width:130px;">       
                      
                <?php } else { ?>
                    <img class='ml-5 ' src ="<?php echo $_SESSION['url']?>public/upload/images/avatar.png" style="border-radius:50%; height:130px; width:130px;"> 
              <?php
                    }
                }
                    ?>
              
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo "<a class='navbar-brand col-10 mt-3' href=''>" . $_SESSION['email'];
                    }
                    else {
                        echo "<a class='navbar-brand col-10 ml-5 mt-3' href=''> NONE" ;
                    }
                    ?>
                    <div >
                        <a href="<?php echo $_SESSION['url']?>User/dangki" class="ml-5"><b>CREATE USER </b> <i class="fa fa-plus" aria-hidden="true"></i></a>

                    </div>
                 

                   
                </div>
                

                
            </div>
         
            <div class="row col-10  d-flex justify-content-center mt-5">
                <div class="col-lg-12 d-flex justify-content-center  mb-3  ">
                    <h1 class="page-header">USER MANAGE </h1>
                </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th class="text-align" style="font-size: 25px;">ID</th>
                                <th style="font-size: 22px;">Email</th>
                                <th style="font-size: 22px;">Fullname</th>
                                <th style="font-size: 22px;">Phone</th>
                                <?php if(isset($_SESSION['email'])) { ?>
                                <th style="font-size: 25px;">C-R-U-D</th>   
                                <?php } ?>                
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_array($data["users"])){ ?>
                        
                            <tr class="odd gradeX" align="center">
                                <td  style="font-size: 15px;"><b><?php echo $row["id"]; ?></b></td>
                                <td  style="font-size: 15px;"><?php echo $row["email"]; ?></td>
                                <td  style="font-size: 15px;" ><?php echo $row["fullname"]; ?></td>
                                <td  style="font-size: 15px;"><?php echo $row["phone"]; ?> </td>
                                <?php if(isset($_SESSION['email'])) { ?>
                                <td class="center">
                                  
                                    <a href="<?php echo $_SESSION['url']?>User/information/<?php echo $row["id"]; ?>"><i class="fa fa-eye mr-3"></i> </a>
                                        <a  class="delete" href="<?php echo $_SESSION['url']?>User/delete/<?php echo $row["id"]; ?>" >
                                     <i class="fa fa-trash-o"></i></a>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                       
                        </tbody>
                    </table>
                   
                    <div class="d-flex flex-row"> 
                        <?php 
                            $total_page = $data["sotrang"];
                            for($t=1; $t<=$total_page; $t++){
                                echo "<button><a href='./User/Show/$t'>$t </a></button> ";
                            }                    
                        ?>
                    <div class="d-flex flex-row">
                    
                </div>
                <!-- /.row -->
         
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
