<?php
    class crud{
        private $db;

        function __construct($conn){
            $this -> db = $conn;
        }


        public function insertfeedback($user_id, $f_desc){
            try {

                // define sql statement to be executed
                $sql = " INSERT INTO feedback (f_desc,user_id) VALUES (:fdesc,:userid) "; // hude l parameters henne l placeholders 
               
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':fdesc', $f_desc);
                $stmt->bindparam(':userid', $user_id);

                // execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;   
            }

        }

        public function insertrating($user_id, $user_rating){
            try {

                // define sql statement to be executed
                $sql = " INSERT INTO rating (user_id,user_rating) VALUES (:userid,:userrating) "; // hude l parameters henne l placeholders 
               
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':userid', $user_id);
                $stmt->bindparam(':userrating', $user_rating);

                // execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;   
            }

        }
        //get all feedbacks from database
        public function getfeedback(){
            $sql = "SELECT * FROM `feedback`;";
            $result = $this->db->query($sql);
            return $result;
        }
        public function getuser(){
            $sql = "SELECT * FROM `user`;";
            $result = $this->db->query($sql);
            return $result;
        }

        public function insertuser($user_name, $user_nb,$user_email,$user_pass,$user_type,$user_image){
            try {

                // define sql statement to be executed
                $sql = " INSERT INTO user (user_name, user_nb,user_email,user_pass,user_type,user_image) VALUES (:username, :usernb,:useremail,:userpass,:usertype,:userimage) "; // hude l parameters henne l placeholders 
               
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':username', $user_name);
                $stmt->bindparam(':usernb', $user_nb);
                $stmt->bindparam(':useremail', $user_email);
                $stmt->bindparam(':userpass', $user_pass);
                $stmt->bindparam(':usertype', $user_type);
                $stmt->bindparam(':userimage', $user_image);

                // execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;   
            }
        }

    }



?>