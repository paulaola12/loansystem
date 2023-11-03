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

         public function fetch_details($id){
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
                JOIN loan_types AS lt ON ll.loan_type_id = lt.id
                WHERE b.id = ?;
                ";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
         }

            public function edit($id, $type, $purpose, $amount, $plan, $authorise){
                $sql = "UPDATE loan_list SET loan_type_id = ?, plan_id = ?, purpose = ?, amount=?,status = ? WHERE loan_list.borrower_id = ? ";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> bindParam(1, $type, PDO::PARAM_INT);
                $stmt -> bindParam(2, $plan, PDO::PARAM_INT);
                $stmt -> bindParam(3, $purpose, PDO::PARAM_STR);
                $stmt -> bindParam(4, $amount, PDO::PARAM_INT);
                $stmt -> bindParam(5, $authorise, PDO::PARAM_INT);
                $stmt -> bindParam(6, $id, PDO::PARAM_INT);
                $response = $stmt -> execute();
                if($response){
                    return true;
                  }else{
                    return false;
                  }
               }

               public function delete($id){
                $sql = "DELETE FROM loan_list WHERE loan_list.borrower_id = ?";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt ->bindParam(1, $id, PDO::PARAM_INT);
                $result = $stmt -> execute();
                return $result;     
            }

            public function ref(){
                $sql = "SELECT * FROM loan_list";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute();
                $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }

            public function active(){
                $sql = "SELECT COUNT(*) AS active_loan FROM loan_list";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute();
                $response = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                return $response;
            }

            public function sumT(){
                $sql ="SELECT SUM(amount) AS total_amount FROM loan_list";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute();
                $sum = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                return $sum;
            }

     }
                // $type = new Loans();
                // $sum = $type -> sumT();
                // print_r($sum);
              

            // $type1 = new Loans();
            // $result = $type1 -> ref();
            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';

                // $type1 = new Loans();
                // echo $response = $type1 -> edit(6,2,"we are her",2000,1)

        //         $data = new Plan();
        // echo $response = $data -> edit(12, 20, 20, 20)
  


?>