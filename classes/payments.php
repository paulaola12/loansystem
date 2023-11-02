<?php
    include_once "db.php";

    class Payments extends db{
        public function write($id, $payee, $amount, $penalty){
            $sql = "INSERT INTO payments (loan_id, Payee, amount, penalty_amount) VALUES(?,?,?,?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $id, PDO::PARAM_INT);
            $stmt -> bindParam(2, $payee, PDO::PARAM_STR);
            $stmt -> bindParam(3, $amount, PDO::PARAM_INT);
            $stmt -> bindParam(4, $penalty, PDO::PARAM_INT);
            $result = $stmt -> execute();
            return $result;
        }
       

        public function read(){
            $sql = "SELECT payments.id, payments.amount, payments.payee, payments.penalty_amount, loan_list.ref_no
            FROM payments
            JOIN loan_list ON payments.loan_id = loan_list.id;
            ";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row){
                $data[] = $row;
            };
            return $data;
           
        }


           public function delete($id){
            $sql = "DELETE FROM payments WHERE id = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt ->bindParam(1, $id, PDO::PARAM_INT);
            $result = $stmt -> execute();
            return $result;
            
        }

        public function fetch($id){
            $sql = "SELECT * FROM payments WHERE id = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
            $response = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $response;
        }
        
        public function edit($id, $lid, $payee, $amount, $penalty){
            $sql = "UPDATE payments SET loan_id = ?, payee = ?, amount= ?, penalty_amount = ? WHERE id = ? ";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $lid, PDO::PARAM_INT);
            $stmt -> bindParam(2, $payee, PDO::PARAM_STR);
            $stmt -> bindParam(3, $amount, PDO::PARAM_INT);
            $stmt -> bindParam(4, $penalty, PDO::PARAM_INT);
            $stmt -> bindParam(5, $id, PDO::PARAM_INT);
            $response = $stmt -> execute();
            return $response;
           }
       
    }
    
            //  $data = new Payments();
            // echo $response = $data -> edit($id, $lid, $payee, $amount, $penalty)
?>