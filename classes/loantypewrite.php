<?php
    include_once "db.php";

    class LoanT extends db{
        public function add_Loan_Type($loan_type, $loan_desc){
            $sql = "INSERT INTO loan_types(type_name, description) VALUES(?,?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $loan_type, PDO::PARAM_STR);
            $stmt-> bindParam(2, $loan_desc, PDO::PARAM_STR);
            $response = $stmt -> execute();

        }

        public function fetch_type_data(){
           $sql = "SELECT * FROM loan_types";
           $stmt = $this -> connect() -> prepare($sql);
           $stmt -> execute();
           $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
           foreach ($result as $row){
             $data[] = $row;
           }
           return $data;
        }

        public function edit($id, $loan_type, $loan_desc){
            $sql = "UPDATE loan_types SET type_name = ?, description = ? WHERE id = ? ";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $loan_type, PDO::PARAM_STR);
            $stmt -> bindParam(2, $loan_desc, PDO::PARAM_STR);
            $stmt -> bindParam(3, $id, PDO::PARAM_INT);
            $response = $stmt -> execute();
            return $response;
           }

           public function fetch_details($id){
            $sql = "SELECT * FROM loan_types WHERE id = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;

            }  

            public function loantype(){
                $sql = "SELECT * FROM loan_types";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute();
                $loant = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                return $loant;
    
                }  

            public function delete($id){
                $sql = "DELETE FROM loan_types WHERE id = ?";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt ->bindParam(1, $id, PDO::PARAM_INT);
                $result = $stmt -> execute();
                return $result;
                
            }
    };
        //  $type1 = new LoanT();
        //  echo $type1 -> add_Loan_Type("WE ARE HERE", "WE ARE HERE");

        //   $type1 = new LoanT();
        //  $type = $type1 -> fetch_details(1);
        //   print_r($type); 
        
        // $type = new LoanT();
        // echo $type -> delete(47);