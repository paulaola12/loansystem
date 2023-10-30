<?php
include_once "db.php";

    class Loans extends db{

        public function create($ref, $borrower, $plan, $type, $amount,$purpose){
            $sql = 'INSERT INTO loan_list(ref_no, loan_type_id, borrower_id, purpose, amount, plan_id) VALUES(?,?,?,?,?,?)';
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $ref, PDO::PARAM_INT);
            $stmt -> bindParam(2, $type, PDO::PARAM_INT);
            $stmt -> bindParam(3, $borrower, PDO::PARAM_INT);
            $stmt -> bindParam(4, $purpose, PDO::PARAM_STR);
            $stmt -> bindParam(5, $amount, PDO::PARAM_INT);
            $stmt -> bindParam(6, $plan, PDO::PARAM_INT);
            $response = $stmt -> execute();
            return $response;
        }
       
    }

?>