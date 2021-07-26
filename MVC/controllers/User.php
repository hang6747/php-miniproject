<?php
    class User extends Controller{
        public function show()
	    {
		   
		    $view = $this->view("index");
	}
    function kiemTra_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
       
    public function login()
	{
        $ten = $email = $gioi_tinh = $binh_luan = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ten = kiemTra_input($_POST["ten"]);
  $email = kiemTra_input($_POST["email"]);
  $website = kiemTra_input($_POST["website"]);
  $binh_luan = kiemTra_input($_POST["binh_luan"]);
  $gioi_tinh = kiemTra_input($_POST["gioi_tinh"]);
}
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