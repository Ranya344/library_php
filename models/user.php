<?php

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $password;
    public $is_admin;

    public function __construct($db) {
        $this->conn = $db;
    }
   
    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            return [
                'id' => $user['id'],
                'email' => $user['email'],
                'is_admin' => $user['is_admin']
            ];
        }
        return false;
    }

    public function getUserByEmail($email) {
        try {
            $query = "SELECT id, email, password, is_admin FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($query);
           
            $email = htmlspecialchars(strip_tags($email));
            

            $stmt->execute([$email]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error getting user by email: " . $e->getMessage());
            return false;
        }
    }

    public function create() {
 
        $check_query = "SELECT id FROM users WHERE email = ?";
        $check_stmt = $this->conn->prepare($check_query);
        $check_stmt->execute([$this->email]);
        
        if ($check_stmt->fetch()) {
            return false;
        }
    
      
        $query = "INSERT INTO users (username,email, password, is_admin) VALUES (?, ?, ?, ?)";
        
        try {
            $stmt = $this->conn->prepare($query);
            
            $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
            
            return $stmt->execute([
                $this->email,
                $hashed_password,
                0  
            ]);
        } catch(PDOException $e) {
            return false;
        }
    }
   
    public function getAllUsers() {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->query($query);  
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }
    }
   
    public function updateWithPassword() {
        $query = "UPDATE users 
                  SET email = :email, 
                      password = :password,
                      is_admin = :is_admin 
                  WHERE id = :id";
    
        $stmt = $this->conn->prepare($query);
    
    
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->is_admin = htmlspecialchars(strip_tags($this->is_admin));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
   
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":is_admin", $this->is_admin);
        $stmt->bindParam(":id", $this->id);
    
        return $stmt->execute();
    }
    
public function getUserById($id) {
    $query = "SELECT id, email, is_admin, created_at FROM users WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function delete() {
    try {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    } catch(PDOException $e) {
        error_log("Error in deleteUser: " . $e->getMessage());
        return false;
    }
}
}