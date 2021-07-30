<?php
    class UserModel extends DB{
        // function getUser(){
        //     $sql = "SELECT *FROM users";
        //     return mysqli_query($this->conn, $sql);
        // }

//phan trang
        function getUser1(){
            $sql = "SELECT *FROM users";
            return mysqli_query($this->conn, $sql);
        }
        function getUser($start, $limit){
            $sql = "SELECT *FROM users LIMIT $start, $limit";
            return mysqli_query($this->conn, $sql);
        }


        public function LoginUser($email, $password)
	    {
		    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		    
            $result = mysqli_query($this->conn, $sql);
            return $result;   
	    }

        public function RegisterUser($email, $password, $fullname, $avatar, $phone)
        {
            $sql = "INSERT INTO users VALUE('','$email', '$fullname','$avatar' ,'$phone', '$password')";
            if(mysqli_query($this->conn, $sql)){
                return 1;
            }
            return 0;
        }

        public function readUser($id)
        {
            $sql = "SELECT * FROM users WHERE id = '$id' ";
            $result = mysqli_query($this->conn, $sql);
            return $result;   
        }
        public function findUserEmail($email)
        {
            $sql = "SELECT * FROM users WHERE email = '$email' ";
            $result = mysqli_query($this->conn, $sql);
            return $result;   
        }


        public function deleteUser($id){
            $sql = "DELETE FROM users WHERE id='$id' ";

            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function updateUser($id,$email, $password, $fullname, $avatar, $phone){
            $sql = "UPDATE users 
                        SET email='$email', fullname='$fullname', avatar='$avatar', phone='$phone', password='$password'
                        WHERE id='$id' 
                    ";
            
           if(mysqli_query($this->conn, $sql)) {
               return 1;
           }
            return 0;
        }

        public function countUser()
        {
            $sql = "SELECT COUNT(*) AS 'total' FROM users ";
            
            $result = mysqli_query($this->conn, $sql);
            return $result;   
        }

    }
?>
