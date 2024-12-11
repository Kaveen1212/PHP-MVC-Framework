<?php
class M_Users {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Register the user
    public function register($data) {
        $this->db->query('INSERT INTO Users(profile_image, name, email, password) VALUES (:profile_image, :name, :email, :password)');
        
        // Bind values
        $this->db->bind(':profile_image', $data['profile_image_name']); 
        $this->db->bind(':name', $data['name']); 
        $this->db->bind(':email', $data['email']); 
        $this->db->bind(':password', $data['password']); 

        // Execute the query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Find the user by email
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM Users WHERE email = :email');
        
        // Bind the email value
        $this->db->bind(':email', $email);

        // Fetch the result
        $row = $this->db->single();

        // Check if any row exists
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Login the user
    public function login($email, $password) {
        $this->db->query('SELECT * FROM Users WHERE email = :email');
        
        // Bind the email value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }
        else{
            return false;
        }
    }
}
?>
