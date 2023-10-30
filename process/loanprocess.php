<?php
session_start();
include_once '../classes/loans.php';

    if($_POST){
        if(isset($_POST["btn"])){
            $ref = $_POST['random'];
            $borrower = $_POST['borrower'];
            $plan = $_POST['loan_plans'];
            $type = $_POST['loan_type'];
            $amount = $_POST["loan_amount"];
            $purpose = $_POST["loan_purpose"];
           
            // echo $ref, $borrower, $plan, $type, $amount,$purpose ;

            if(empty($borrower) || empty($plan) || empty($type) || empty($amount) || empty($purpose)){
                $_SESSION["editprocess"] = "All fields must be filled";
                header('location:../loans.php');
                die();
             }

            $type1 = new Loans();
           $response = $type1 -> create($ref, $borrower, $plan, $type, $amount, $purpose);

       

        if($response){
            $_SESSION["editprocess"] = "Account Created Successfully";
            header('location:../loans.php');
            die(); 
        }

  

        }
    }
?>