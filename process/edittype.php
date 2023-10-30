<?php
session_start();
include_once "../classes/planclass.php";
    if($_POST){
        if(isset($_POST["btn"])){
            $id = $_POST['id'];
            $plan = $_POST['months'];
            $interest = $_POST['interest'];
            $overdue = $_POST["overdue"];

        //    echo $id, $plan, $interest;

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
            if($response){
                $_SESSION['plan_error'] = 'Update Was Successful';
                header('location:../plans.php');
            }

            $data = new Plan();
            $response = $data -> edit($id, $plan, $interest, $overdue);

        }
    }
?>