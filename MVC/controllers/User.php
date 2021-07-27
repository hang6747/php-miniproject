<?php
    class User extends Controller{
        public function show()
        {
            // $test = $this->model("UserModel");
            // $view = $this->view("index", [
            //     "users" => $test->getUser()
            // ]);
            $view = $this->view("login");
        }
       
        public function login()
        {  
           
            if(isset($_POST["submit"])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $userModel = $this->model("UserModel");
                // echo $_POST["email"];
                $kq = $userModel->LoginUser($email, $password);
                if(mysqli_num_rows($kq)==0)
                    {
                        echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
                        header('Location: ./User');
                    }
                else{
                    header('Location: ./User');
                }
            }
        }

    public function register(){
        // require_once('../views/user_create.php');
        
        if(isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password =  md5(md5($_POST["password"]));
            $fullname = $_POST["fullname"];
            $avatar = $_POST["avatar"];
            $phone = $_POST["phone"];
            $userModel = $this->model("UserModel");
            $kq = $userModel->RegisterUser($email, $password, $fullname, $avatar, $phone);
            if($kq==1) {
                header('Location: ./User/login');
            }
            else{
                echo "<script>alert('Trùng Email')</script>";
            }
        }
        $view = $this->view("user_create");
    }

    
}
?>