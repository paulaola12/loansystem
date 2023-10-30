<?php
    include_once "db.php";

    class Borrow extends db{
        public function add_borrower($first, $last, $middle, $contact, $address, $email, $tax){
            $sql = "INSERT INTO borrowers(firstname,middlename,lastname,contact_no,address,email,tax_id) VALUES(?,?,?,?,?,?,?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $first, PDO::PARAM_STR);
            $stmt-> bindParam(2, $last, PDO::PARAM_STR);
            $stmt -> bindParam(3, $middle, PDO::PARAM_STR);
            $stmt -> bindParam(4, $contact, PDO::PARAM_INT);
            $stmt-> bindParam(5, $address, PDO::PARAM_STR); 
            $stmt-> bindParam(6, $email, PDO::PARAM_STR);
            $stmt -> bindParam(7, $tax, PDO::PARAM_INT);
            $response = $stmt -> execute();

        }

        public function fetch_type_data(){
           $sql = "SELECT * FROM borrowers";
           $stmt = $this -> connect() -> prepare($sql);
           $stmt -> execute();
           $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
           foreach ($result as $row){
             $data[] = $row;
           }
           return $data;
        }

        public function edit($id, $first, $last, $middle, $contact, $address, $email, $tax){
            $sql = "UPDATE borrowers SET firstname = ?,middlename = ? ,lastname = ?, 
            contact_no = ?, address = ?, email = ?,tax_id = ? WHERE id = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $first, PDO::PARAM_STR);
            $stmt-> bindParam(2, $last, PDO::PARAM_STR);
            $stmt -> bindParam(3, $middle, PDO::PARAM_STR);
            $stmt -> bindParam(4, $contact, PDO::PARAM_INT);
            $stmt-> bindParam(5, $address, PDO::PARAM_STR); 
            $stmt-> bindParam(6, $email, PDO::PARAM_STR);
            $stmt -> bindParam(7, $tax, PDO::PARAM_INT);
            $stmt -> bindParam(8, $id, PDO::PARAM_INT);
            $response = $stmt -> execute();
            return $response;
           }

           public function fetch_details($id){
            $sql = "SELECT * FROM borrowers WHERE id = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> bindParam(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
            }  

            public function fetch_borrowers(){
                $sql = "SELECT * FROM borrowers";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute();
                $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                return $result;
                }  
    

            public function delete($id){
                $sql = "DELETE FROM borrowers WHERE id = ?";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt ->bindParam(1, $id, PDO::PARAM_INT);
                $result = $stmt -> execute();
                return $result;
                
            }
    };
 

        //   echo $type1 -> add_borrower('jude', 'carrista', 'caristatu', 90, 'kasko', 'sss@gmaail.com',1122);
        // print_r($data);

        // $type1 = new Borrow();
        // echo $type1 -> edit(40,"teras", "teras", "meras", 909090, "24,hrhr,jjff", "23@gmail.com",12322);