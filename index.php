<?php
    $severname = "localhost";
    $username = "root";
    $password = "linhchi";
    $database = "sun";

    $conn = mysqli_connect($severname, $username, $password, $database);
    if(!$conn){
        echo "Kết nối thành công!";
    }else {
        echo "Kết nối thất bại";
    }
    $sql = "CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(30) NOT NULL UNIQUE,
        fullname VARCHAR(30) ,
        avatar VARCHAR(20),
        phone VARCHAR(15),
        password VARCHAR(15) NOT NULL
    )";
    if(mysqli_query($conn, $sql)){
        echo "Tạo bảng thành công.";
    } else{
        echo "ERROR: Không thể thực thi. " . mysqli_error($conn);
    }
    mysqli_close($conn);

?>