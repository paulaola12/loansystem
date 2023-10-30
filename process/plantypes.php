<?php

session_start();
include "../classes/planclass.php";

if($_POST){
    if(isset($_POST["btn"])){
        $plan = $_POST['plan'];
        $interest = $_POST['interest'];
        $overdue = $_POST['overdue'];

        // echo $plan, $interest, $overdue;

        if(empty($plan) || empty($interest) || empty($overdue)){
            $_SESSION["plan_error"] = "Please input all the required field";
            header('location:../plans.php');
            die(); 
        }

        if($plan > 12 ){
            $_SESSION["plan_error"] = "Loan plan period cannot exceed 12 years";
            header('location:../plans.php');
            die(); 
        }

        if($interest > 100 ){
            $_SESSION["plan_error"] = "Interest cannot be more than 100%";
            header('location:../plans.php');
            die(); 
        }

        if($overdue > 100 ){
            $_SESSION["plan_error"] = "Overdue cannot be more than 100%";
            header('location:../plans.php');
            die(); 
        }

        $result = new plan();
        $result -> write($plan, $interest, $overdue);
        if($result){
            $_SESSION['plan_error'] = "Loan Plan Created Successfully";
            header('location:../plans.php');
            die();
        }

    }
}
?>