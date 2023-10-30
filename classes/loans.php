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

        public function fetch_loan_data(){
            $sql = "SELECT 
                    b.id AS borrower_id, 
                    b.firstname, 
                    b.middlename, 
                    b.lastname, 
                    b.contact_no, 
                    b.email, 
                    b.address, 
                    ll.id AS loan_id, 
                    ll.ref_no, 
                    lt.type_name AS loan_type, 
                    ll.purpose, 
                    ll.amount, 
                    lp.months AS loan_months, 
                    lp.interest_percentage, 
                    lp.penalty_rate, 
                    ll.status
                FROM borrowers AS b
                JOIN loan_list AS ll ON b.id = ll.borrower_id
                JOIN loan_plan AS lp ON ll.plan_id = lp.id
                JOIN loan_types AS lt ON ll.loan_type_id = lt.id;
                ";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[] = $row;
            }
            return $data;
         }

     
       
    }

    $type1 = new Loans();
    $data = $type1 -> fetch_loan_data();
    echo '<pre>';
    print_r($data);
    echo '</pre>';

?>