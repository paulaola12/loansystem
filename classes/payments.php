<?php
    include_once "db.php";

    class Payments extends db{
        public function write($ref, $payee, $amount, $penalty){
            $sql = "INSERT INTO payments (months,interest_percentage,penalty_rate) VALUES(?,?,?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $plan, PDO::PARAM_INT);
            $stmt -> bindParam(2, $interest, PDO::PARAM_INT);
            $stmt -> bindParam(3, $overdue, PDO::PARAM_INT);
            $result = $stmt -> execute();
            return $result;

        }
       

        public function read(){
            $sql = "SELECT payments.id, payments.amount, payments.payee, payments.penalty_amount, loan_list.ref_no
            FROM payments
            JOIN loan_list ON payments.id = loan_list.id;
            ";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row){
                $data[] = $row;
            };
            return $data;
           
        }

        public function edit($id, $plan, $interest, $overdue){
            $sql = "UPDATE loan_plan SET months = ?, interest_percentage = ?, penalty_rate = ? WHERE id = ? ";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $plan, PDO::PARAM_STR);
            $stmt -> bindParam(2, $interest, PDO::PARAM_STR);
            $stmt -> bindParam(3, $overdue, PDO::PARAM_INT);
            $stmt -> bindParam(4, $id, PDO::PARAM_INT);
            $response = $stmt -> execute();
            return $response;
           }


           public function delete($id){
            $sql = "DELETE FROM loan_plan WHERE id = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt ->bindParam(1, $id, PDO::PARAM_INT);
            $result = $stmt -> execute();
            return $result;
            
        }
    }
        // $type2 = new payments();
        // $result = $type2 -> read();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';

        // $result = new plan();
        // echo $result -> write(1, 5, 10);

        // $datar = new plan();
        // $result = $datar -> fetch_loan(3);
        // print_r($result)

        // $data = new Plan();
        // echo $response = $data -> edit(12, 20, 20, 20)
?>