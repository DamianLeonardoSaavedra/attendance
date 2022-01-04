    <?php
    class crud
    {
        // Private database object\
        private $db;

        //Constructor to initialize private variable to the database connection
        function __construct($conn)
        {
            $this->db = $conn;
        }

        // Function to insert a new record into the database attendee.
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty)
        {
            try {
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth,emailaddress,contactnumber,specialty_id) 
                    VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
                //Prepare the sql statement to be executed
                $stmt = $this->db->prepare($sql);
                // Bind all the placeholders to the actual value
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                // Execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty)
        {
            try {
                $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,
                `emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id ";
                $stmt = $this->db->prepare($sql);
                // Bind all the placeholders to the actual value
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                // Execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        public function deleteAttendee($id)
        {
            try {
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees()
        {
            try {
                $sql = "SELECT * FROM `attendee` a inner join 
                specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
           
        }

        public function getSpecialties()
        {
            try {
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }



        public function getAttendeeDetails($id)
        {
            try {
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
    }
