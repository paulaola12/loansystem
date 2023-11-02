<?php
session_start();
include_once "../classes/payments.php";
    if($_POST){
        if(isset($_POST["btn"])){
            $id = $_POST['ref'];
            $payee = $_POST['payee'];
            $amount = $_POST["amount"];
            $penalty = $_POST["penalty"];
            
            // echo $id, $payee, $amount, $penalty;

            if(empty($id) || empty($payee) || empty($amount) || empty($penalty)){
                $_SESION["payments"] ="All Fields are Required";
                header("location:../payments.php");
            }

             $result = new payments();
             $response = $result -> write($id, $payee, $amount, $penalty);
             if($response){
                $_SESSION["payments"] = "Account Created Successfully";
                header("location:../payments.php");
               }


        }
    }
?>