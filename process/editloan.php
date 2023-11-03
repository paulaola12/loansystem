<?php
 session_start();
include_once "../classes/loans.php";
include_once "../guards/cleaner.php";
    if($_POST){
        if(isset($_POST["btn"])){
            $id = $_POST['id'];
            $plan = cleaner($_POST["loanplan"]);
            $type = cleaner($_POST['loantype']);
            $amount = cleaner($_POST["amount"]);
            $purpose = cleaner($_POST['purpose']);
            $authorise = cleaner($_POST['authorise']);

           echo $id,$plan,$type,$amount,$purpose,$authorise;

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
        $response = $type1 -> edit($id, $type, $purpose, $amount, $plan,$authorise);

        if($response){
        $_SESSION['loanerror'] = 'Update Was Successful';
         header('location:../loans.php');
        }

       

        }
    }
?>