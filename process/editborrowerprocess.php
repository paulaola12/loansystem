<?php
session_start();
include_once "../classes/borrowerclass.php";
    if($_POST){
        if(isset($_POST["btn"])){
            $id = $_POST['id'];
            $first = $_POST['firstname'];
            $last = $_POST['lastname'];
            $middle = $_POST["middlename"];
            $address = $_POST['address'];
            $contact= $_POST["contact_no"];
            $email = $_POST['email'];
            $tax = $_POST["tax_id"];

             echo $first, $last, $middle, $address, $contact, $email, $tax;

            if(empty($first) || empty($last)  || empty($middle) || empty($address)  || empty($contact)  || empty($email)  || empty($tax)){
             $_SESION["borrower"] ="All Fields are Required";
              header("location:../borrowers.php");
               }

               $type1 = new Borrow();
               echo $type1 -> edit($id, $first, $last, $middle, $contact, $address, $email, $tax);
               if($type1){
                $_SESSION["borrower"] = "Account Updated Successfully";
                header("location:../borrowers.php");
               }

        }
    }
?>