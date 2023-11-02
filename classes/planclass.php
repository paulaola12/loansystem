<?php
    include_once "db.php";

    class Plan extends db{
        public function write($plan, $interest, $overdue){
            $sql = "INSERT INTO loan_plan(months,interest_percentage,penalty_rate) VALUES(?,?,?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $plan, PDO::PARAM_INT);
            $stmt -> bindParam(2, $interest, PDO::PARAM_INT);
            $stmt -> bindParam(3, $overdue, PDO::PARAM_INT);
            $result = $stmt -> execute();
            return $result;

        }

        public function fetch_loan($id){
            $sql = "SELECT * FROM loan_plan WHERE id = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function loanplan(){
            $sql = "SELECT * FROM loan_plan";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> execute();
            $response = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $response;
        }

       

        public function read(){
            $sql = "SELECT * FROM loan_plan";
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

        public function current_plans(){
            $sql = "SELECT COUNT(*) AS current_plans FROM loan_plan";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> execute();
            $plans = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $plans;
        }
    }
        // $type2 = new plan();
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