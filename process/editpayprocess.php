<?php
session_start();
include_once "../classes/planclass.php";
include_once "../classes/payments.php";
include_once "../guards/cleaner.php";
    if($_POST){
        if(isset($_POST["btn"])){
            $id = $_POST['id'];
            $payee = cleaner($_POST['payee']);
            $lid = cleaner($_POST['lid']);
            $amount = cleaner($_POST['amount']);

            // echo $id, $payee, $lid, $amount;

            if(empty($id) || empty($payee) || empty($lid) || empty($amount)){
                $_SESION["payments"] ="All Fields are Required";
                header("location:../payments.php");
            }

            $data = new Payments();
            $response = $data -> edit($id, $lid, $payee, $amount, $penalty);
            if($response){
                $_SESSION['payments'] = 'Update Was Successful';
                header('location:../payments.php');
            }

        }
    }
?>