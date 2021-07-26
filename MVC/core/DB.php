<?php
    class DB{
        public $conn;
        protected $severname = "localhost:3308";
        protected $username = "root";
        protected $password = "linhchi";
        protected $database = "sun";

        public function __construct()
        {
            $this->conn = mysqli_connect($this->severname, $this->username, $this->password, $this->database);
            // if(!$this->conn){
            //     echo "Kết nối thành công!";
            // }else {
            //     echo "Kết nối thất bại";
            // }

        }

        public function CreateTableUser(){
            $sql = "CREATE TABLE users (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                email VARCHAR(30) NOT NULL UNIQUE,
                fullname VARCHAR(30) ,
                avatar VARCHAR(20),
                phone VARCHAR(15),
                password VARCHAR(15) NOT NULL
            )";
            if(mysqli_query($this->conn, $sql)){
                echo "Tạo bảng thành công.";
            } else{
                echo "ERROR: Không thể thực thi. " . mysqli_error($this->conn);
            }

        }

    }

?>  