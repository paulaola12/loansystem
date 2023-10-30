<?php
include_once "../classes/loantypewrite.php";

    if($_POST){
        if(isset($_POST["btn"])){
            $id = $_POST["id"];

            $type = new LoanT();
            $type -> delete($id);
        }
    }
?>