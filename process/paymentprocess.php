<?php
session_start();
include_once "../classes/planclass.php";
    if($_POST){
        if(isset($_POST["btn"])){
            $ref = $_POST['ref'];
            $payee = $_POST['payee'];
            $amount = $_POST["amount"];
            $penalty = $_POST["penalty"];
            
            echo $ref, $payee, $amount, $penalty;
            // if(empty($loan_type) || empty($loan_desc)){
            //     $_SESION["edit"] ="All Fields are Required";
            //     header("location:../edit.php");
            // }

            // $edit = new LoanT();
            // $response = $edit -> edit($id, $loan_type, $loan_desc);
            // if($response){
            //     $_SESSION['edit'] = 'Update Was Successful';
            //     header('location:../types.php');
            // }

        }
    }
?>