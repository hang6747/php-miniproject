<?php
    class User extends Controller{
        public function show()
	    {
		   
		    $view = $this->view("user_create");
	    }
  
       
    public function login()
	{
        $email = $_POST['email'];
        $password = $_POST['password'];
      
        $userModel = $this->model("UserModel");
            // echo $_POST["email"];
        $kq = $userModel->LoginUser($email, $password);
        if(mysqli_num_rows($kq)==0)
        {
            echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
            header('Location: ./');
        }
        else{
            $view = $this->view("test");
        }
	}

    public function register(){
        if(isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password =  md5(md5($_POST["password"]));
            $fullname = $_POST["fullname"];
            $avatar = $_POST["avatar"];
            $phone = $_POST["phone"];
            $userModel = $this->model("UserModel");
            $kq = $userModel->RegisterUser($email, $password, $fullname, $avatar, $phone);
            if($kq==1) {
                header('Location: ./');
            }
            else{
                echo "<script>alert('Trùng Email')</script>";
            }
        }
    }

    
}
?>