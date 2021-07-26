<?php
    class Home extends Controller{
        function show(){
            $test = $this->model("UserModel");
            $test->getSV();
        }
        function index(){
            echo "yen vy";

        }
    }
?>