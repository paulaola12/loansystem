<?php
 session_start();
include_once "../classes/loans.php";
    if($_POST){
        if(isset($_POST["btn"])){
            $id = $_POST['id'];
            $plan = $_POST["loanplan"];
            $type = $_POST['loantype'];
            $amount = $_POST["amount"];
            $purpose = $_POST['purpose'];

        //    echo $id,$plan,$type,$amount,$purpose;

        if(empty($amount) || empty($purpose)){
            $_SESSION["loanerror"] = "Please input all the required field";
            header('location:../loans.php');
            die(); 
        }
        if($plan == 0|| $type == 0){
            $_SESSION["loanerror"] = "Please input all the required field";
            header('location:../loans.php');
            die(); 
        }

        $type1 = new Loans();
        $response = $type1 -> edit($id, $type, $purpose, $amount, $plan);

        if($response){
        $_SESSION['loanerror'] = 'Update Was Successful';
         header('location:../loans.php');
        }

       

        }
    }
?>