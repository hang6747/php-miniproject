<?php
    class User extends Controller{
        public $url = "http://localhost:7882/sun/php-miniproject/";
        public function __construct()
        {
            if(empty($_SESSION['email'])){
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
            $_SESSION['url'] = $this->url;
        }
        public function show()
	    {   
            $test = $this->model("UserModel");
            $email = NULL;
            if (isset($_SESSION["email"]))
            {
                $email = $_SESSION["email"];
            }
          
            $view = $this->view("index", [
                "users" => $test->getUser(),
                "test" => $test->findUserEmail($email),
                "kq"   => $test->findUserEmail($email),
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
            $url1 = $this->url ."/User";
            header("Location: $url1");
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
                $url1 = $this->url."User/dangnhap";
                header("location: $url1");
                exit();
            }
            unset($_SESSION['errors']);
            unset($_SESSION['data']);
        }
        if(isset($_POST["submit"])){
            $email = $_POST['email'];
            $password = $_POST["password"];
                if(isset($_POST["remember"])){
                    setcookie("email", $email, time()+3600);
                    setcookie("password", $password, time()+3600);
                }
                $userModel = $this->model("UserModel");
                $kq = $userModel->LoginUser($email, $password);
                if(mysqli_num_rows($kq)==0)
                {
                    $errors['er']  ="<script>alert ('Sai email hoặc mật khẩu !')</script>";
                    $_SESSION['errors'] = $errors;
                    $url1 = $this->url."User/dangnhap";
                    header("location: $url1");
                }
                else{
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $errors['success']  = "<script>alert('Đăng nhập thành công')</script>";
                    $_SESSION['errors'] = $errors;
                    $url1 = $this->url."User";
                header("location: $url1");
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
                $url1 = $this->url."User/dangki";
                header("location: $url1");
                exit();
            }
            unset($_SESSION['errors']);
            unset($_SESSION['data']);
        }
        if(isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password =  $_POST["password"];
            $fullname = $_POST["fullname"];
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
            $avatar= $_FILES['avatar']['name'];
            $imageFileType = pathinfo($avatar,PATHINFO_EXTENSION);
            if (in_array($imageFileType,$allowtypes ))
            {
                $target = "public/upload/images/".basename($avatar);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $target);    
            }
            else{
                $avatar= NULL;
            }
            $phone = $_POST["phone"];
            $userModel = $this->model("UserModel");
            $kq = $userModel->RegisterUser($email, $password, $fullname, $avatar, $phone);
            if($kq==1) {
                $errors['register']  = "<script>alert('Đăng kí thành công ')</script>";
                $_SESSION['errors'] = $errors;
                $url1 = $this->url."User";
                header("location: $url1");
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
            $url1 = $this->url."User";
            header("location: $url1");

        }
    }

  
        public function chinhsua($id)
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
                $url1 = $this->url."information/".$id;
                header("location: $url1");
                exit();
            }
            unset($_SESSION['errors']);
            unset($_SESSION['data']);
        }
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $allowtypes    = array('jpg', 'png');
                    $avatar= $_FILES['avatar']['name'];
                    $imageFileType = pathinfo($avatar,PATHINFO_EXTENSION);
                    if (in_array($imageFileType,$allowtypes ))
                    {
                        $target = "public/upload/images/".basename($avatar);
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $target);    
                    }
                    else{
                        $avatar= NULL;
                        
                    }
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $test = $this->model("UserModel");
                    $kq = $test->updateUser($id,$email, $password, $fullname, $avatar, $phone);
                    if($kq==1) {
                        $errors['update']  = "<script>alert('Update thành công')</script>";
                        $_SESSION['errors'] = $errors;
                        $url1 = $this->url."User";
                        header("location: $url1");
                    }
                    else{
                        $errors['update']  = "<script>alert('Email đã tồn tại!')</script>";
                        $_SESSION['errors'] = $errors;
                        $test = $this->model("UserModel");
                        $read = $test->readUser($id); 
                        $view = $this->view("user_read", [
                            "users" => $read,
                           
                        ]);
                    }
                }   
        }
    
}
?>
