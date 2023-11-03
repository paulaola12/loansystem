<?php
session_start();
include_once "../classes/planclass.php";
include_once "../guards/cleaner.php";
    if($_POST){
        
        if(isset($_POST["btn"])){
            $id = $_POST['ida'];
            $loan_type = cleaner($_POST['loan_type']);
            $loan_desc = cleaner($_POST["description"]);

            if(empty($loan_type) || empty($loan_desc)){
                $_SESION["edit"] ="All Fields are Required";
                header("location:../edit.php");
            }

            $edit = new LoanT();
            $response = $edit -> edit($id, $loan_type, $loan_desc);
            if($response){
                $_SESSION['edit'] = 'Update Was Successful';
                header('location:../types.php');
            }

        }
    }
?>