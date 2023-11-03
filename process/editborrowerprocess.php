<?php
session_start();
include_once "../classes/borrowerclass.php";
include_once "../guards/cleaner.php";
    if($_POST){
        $first = cleaner($_POST['firstname']);
        if(isset($_POST["btn"])){
            $id = $_POST['id'];
            $first = cleaner($_POST['firstname']);
            $last = cleaner($_POST['lastname']);
            $middle = cleaner($_POST["middlename"]);
            $address = cleaner($_POST['address']);
            $contact= cleaner($_POST["contact_no"]);
            $email = cleaner($_POST['email']);
            $tax = cleaner($_POST["tax_id"]);

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