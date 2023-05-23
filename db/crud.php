<?php
    class crud{
        // private database object
        private $db;
        // constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        // function to insert a new record into attendee database
        public function insertattendees($fname,$lname,$dob,$email,$contact,$specialty){
            try {
                // define sql statement to be executed
                $sql="INSERT INTO attendee(firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id) VALUES(:fname,:lname,:dob,:email,:contact,:specialty)"; // here we use palceholders to avoid sqlinjection
                // prepare the sql statemnet for execution
                $stmt=$this->db->prepare($sql);
                // bind all placeholders to the actual value
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                // execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }
  
        }

        public function editattendee($id,$fname,$lname,$dob,$email,$contact,$specialty){
            try {
                // define sql statement to be executed
                $sql="update attendee set firstname=:fname,lastname=:lname,dateofbirth=:dob,emailaddress=:email,contactnumber=:contact,specialty_id=:specialty
                where attendee_id=:id"; // here we use palceholders to avoid sqlinjection
                // prepare the sql statemnet for execution
                $stmt=$this->db->prepare($sql);
                // bind all placeholders to the actual value
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                // execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }


        }

        public function getattendees(){
            try{
                $sql="SELECT * FROM attendee a inner join specialties s on a.specialty_id = s.specialty_id";
                $results=$this->db->query($sql);
                return $results;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }

            }
        
        public function deleteattendee($id){
            try {
                $sql="delete from attendee where attendee_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }
        }

        public function getattendeedetails($id){
            try{
                $sql="SELECT * FROM attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $results=$stmt->fetch();
                return $results;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }

        }
        public function getspecialties(){
            try{
                $sql="SELECT * FROM specialties";
                $results=$this->db->query($sql);
                return $results;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }

        }

        
    }
?>