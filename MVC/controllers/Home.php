<?php
    class Home extends Controller{
        function show(){
            $test = $this->model("UserModel");
            $view = $this->view("index", [
                "users" => $test->getUser()
            ]);
            
        }
        function index(){
            echo "yen vy";

        }
    }
?>