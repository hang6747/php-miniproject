<?php
    class User extends Controller{
        public function show()
	    {
		   
		    $view = $this->view("index");
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
        }
        else{
            $view = $this->view("test");
        }
	}

    public function register(){
        if(isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $userModel = $this->model("UserModel");
            $kq = $userModel->RegisterUser($email, $password);
            echo $kq;
        }
    }

    
}
?>