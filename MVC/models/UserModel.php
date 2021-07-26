<?php
    class UserModel extends DB{
        function getUser(){
            $sql = "SELECT *FROM users";
            return mysqli_query($this->conn, $sql);
        }

        public function LoginUser($email, $password)
	    {
		    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		    
            $result = mysqli_query($this->conn, $sql);
            return $result;   
	    }

        public function RegisterUser($email, $password)
        {
            $sql = "INSERT INTO users VALUE('','$email', null, null, null, '$password')";
            $result = false;
            if(mysqli_query($this->conn, $sql)){
                return 1;
            }
            return 0;
        }

    }
?>