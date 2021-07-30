<?php
    class User extends Controller{
     //    public function show()
	    // {    if(empty($_SESSION['email'])){
     //        if(isset($_COOKIE['email'])){   
     //            $email = $_COOKIE['email'];
     //            $password = $_COOKIE['password'];
     //            $userModel = $this->model("UserModel");
     //            $kq = $userModel->LoginUser($email, $password);
     //            if(mysqli_num_rows($kq)!=0)
     //            {
     //                $_SESSION['email'] = $email;
     //            }
     //            }
     //        }  
     //        $test = $this->model("UserModel");
     //        $view = $this->view("index", [
     //            "users" => $test->getUser(),
     //            "count" => $test->countUser()
     //        ]);
	    // }

//phan trang
        public function show($page)
        {    if(empty($_SESSION['email'])){
            if(isset($_COOKIE['email'])){   
                $email = $_COOKIE['email'];
                $password = $_COOKIE['password'];
                $userModel = $this->model("UserModel");
                $kq = $userModel->LoginUser($email, $password);
                if(mysqli_num_rows($kq)!=0)
                {
                    $_SESSION['email'] = $email;
                }
                }
            }  
            $test = $this->model("UserModel");

            $total = mysqli_num_rows($test->getUser1());
            $limit = 8;
            $start = ($page - 1)*$limit;
            $so_trang = ceil($total/$limit);
            $view = $this->view("index", [
                "users" => $test->getUser($start, $limit),
                "count" => $test->countUser(),
                "sotrang" => $so_trang
            ]);
        }
        
        public function dangnhap()
	    {   
            return $this->view("login");
	    }
        public function dangki()
	    {   
            return $this->view("user_create");
	    }
       
        public function information($id)
        {          
            $test = $this->model("UserModel");
            $read = $test->readUser($id); 
            $view = $this->view("user_read", [
                "users" => $read
            ]);
        }

        public function delete($id)
        {          
            $test = $this->model("UserModel");
            $test->deleteUser($id); 
            header('Location: http://localhost/php-miniproject/User');
        }

        
    public function login()
	{
        $errors = [];
        if (isset($_POST))
        {
            if (empty($_POST['email']))
            {
                $errors['email'] = "Email is required!";
            }
    
            if (empty($_POST['password']))
            {
                $errors['password'] = "Password is required!";
            }
    
            if ($errors)
            {
                $_SESSION['errors'] = $errors;
                $_SESSION['data'] = $_POST;
                header("location: ../User/dangnhap");
                exit();
            }
            unset($_SESSION['errors']);
            unset($_SESSION['data']);
        }


        if(isset($_POST["submit"])){
            $email = $_POST['email'];
            $password =($_POST['password']);
                if(isset($_POST["remember"])){
                    setcookie("email", $email, time()+3600);
                    setcookie("password", $password, time()+3600);
                }
                $userModel = $this->model("UserModel");
                $kq = $userModel->LoginUser($email, $password);
                if(mysqli_num_rows($kq)==0)
                {
                    $errors['er']  = "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
                    $_SESSION['errors'] = $errors;
                    header('Location: ../User/dangnhap');
                }
                else{
                    $_SESSION['email'] = $email;
                    $errors['success']  = "<script>alert('Đăng nhập thành công')</script>";
                    $_SESSION['errors'] = $errors;
                    header('Location: ../User');
                }
	    }

       
        
       
    }

    public function register(){
        $errors = [];
        if (isset($_POST))
        {
            if (empty($_POST['email']))
            {
                $errors['email'] = "Email is required!";
            }
    
            if (empty($_POST['password']))
            {
                $errors['password'] = "Password is required!";
            }
            if (empty($_POST['fullname']))
            {
                $errors['fullname'] = "Fullname is required!";
            }
    
            if ($errors)
            {
                $_SESSION['errors'] = $errors;
                $_SESSION['data'] = $_POST;
                header("location: ../User/dangki");
                exit();
            }
            unset($_SESSION['errors']);
            unset($_SESSION['data']);
        }
        if(isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password =  md5($_POST["password"]);
            $fullname = $_POST["fullname"];
            $avatar = $_POST["avatar"];
            $phone = $_POST["phone"];
            $userModel = $this->model("UserModel");
            $kq = $userModel->RegisterUser($email, $password, $fullname, $avatar, $phone);
            if($kq==1) {
                $errors['register']  = "<script>alert('Đăng kí tài khoản thành công')</script>";
                $_SESSION['errors'] = $errors;
                header('Location: ../User');
            }
            else{
                $alert = "<script>alert('Email đã tồn tại ')</script>";
                        $test = $this->model("UserModel");
                        $view = $this->view("user_create", [
                            
                            "alert" => $alert,
                        ]);
            }
        }
    }

    public function logout(){
        $errors=[];
        if(isset($_COOKIE['email'])){
            setcookie("email", "", time()-36000);
            setcookie("password", "", time()-36000);
        }
        
        if (isset($_SESSION['email'])){
            unset($_SESSION['email']); 
            $errors['logout']  = "<script>alert('Đã đăng xuất')</script>";
            $_SESSION['errors'] = $errors;
            header('Location: ../User');

        }
    }

        public function update($id)
            {   
                $test = $this->model("UserModel");
                $read = $test->readUser($id); 
                $view = $this->view("user_update", [
                    "users" => $read
                ]);
            }

        public function chinhsua($id)
        {   
            $errors = [];
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $avatar = $_POST['avatar'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $test = $this->model("UserModel");
                    $kq = $test->updateUser($id,$email, $password, $fullname, $avatar, $phone);
                    if($kq==1) {
                        $errors['update']  = "<script>alert('Update thành công')</script>";
                        $_SESSION['errors'] = $errors;
                        header('Location: http://localhost/php-miniproject/User');
                    }
                    else{
                        $alert = "<script>alert('Email đã tồn tại ')</script>";
                        $test = $this->model("UserModel");
                        $read = $test->readUser($id); 
                        $view = $this->view("user_update", [
                            "users" => $read,
                            "alert" => $alert,
                        ]);
                    }
                }   
        }
    
}
?>
