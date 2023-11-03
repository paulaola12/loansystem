<?php
session_start();
include_once '../classes/loans.php';
include_once "../guards/cleaner.php";

    if($_POST){
        if(isset($_POST["btn"])){
            $ref = $_POST['random'];
            $borrower = cleaner($_POST['borrower']);
            $plan = cleaner($_POST['loan_plans']);
            $type = cleaner($_POST['loan_type']);
            $amount = cleaner($_POST["loan_amount"]);
            $purpose = cleaner($_POST["loan_purpose"]);
           
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