<?php
    class User extends Controller{
        public function show()
	    {   
            $test = $this->model("UserModel");
            $view = $this->view("index", [
                "users" => $test->getUser()
            ]);
            // return $this->view("login");
	    }
        public function dangnhap()
	    {   
            return $this->view("login");
	    }
        public function dangki()
	    {   
            return $this->view("user_create");
	    }
    public function login()
	{
        $email = $_POST['email'];
        $password =($_POST['password']);
            if(isset($_POST["remember"])){
                setcookie("email", $email);
                setcookie("password", $password);
            }
            
            $userModel = $this->model("UserModel");
            $kq = $userModel->LoginUser($email, $password);
            if(mysqli_num_rows($kq)==0)
            {
                echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
            // header('Location: ../User');
            }
            else{
                $_SESSION['email'] = $email;
                header('Location: ../User');
            }
	}

    public function register(){
        if(isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password =  md5($_POST["password"]);
            $fullname = $_POST["fullname"];
            $avatar = $_POST["avatar"];
            $phone = $_POST["phone"];
            $userModel = $this->model("UserModel");
            $kq = $userModel->RegisterUser($email, $password, $fullname, $avatar, $phone);
            if($kq==1) {
                header('Location: ../User');
            }
            else{
                echo "<script>alert(' Email đã tồn tại')</script>";
                // header('Location: ../Home');
            }
        }
    }

    public function logout(){
        if (isset($_SESSION['email'])){
            unset($_SESSION['email']); 
            header('Location: ../User');
        }
    }

    
}
?>