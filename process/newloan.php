
<?php
session_start();
 include "../classes/loantypewrite.php";
 include_once "../guards/cleaner.php";
 

  if($_POST){
        if(isset($_POST["btn"])){
            $loan_type = cleaner($_POST["loan_type"]);
            $loan_desc = cleaner($_POST["loan_desc"]);

            //validation

            if (empty($loan_type) || empty($loan_desc)){
              
              $_SESSION["add_error"] = "pls fill all requeired field";
              header("location:../types.php");
              die();
            }

            $type1 = new LoanT();
            $type1 -> add_Loan_Type($loan_type,$loan_desc);

            if($type1){
              $_SESSION["add_error"] ="Account Creation was successful";
              header("location:../types.php");
             die(); 
          }
          // if($customer1){
          //   $_SESSION["reg_update"] ="User Account Update was successful";
          //   header("location:../adminupdateuser.php");
          //  die();

        // } 

        //



        }
  };
?>