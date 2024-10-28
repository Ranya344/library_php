<?php
class Book {
    private $conn;
    private $table_name = "books";

    public $id;
    public $title;
    public $author;
    public $category;
    public $publication_year;
    public $description;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO books (tittle, author, category,publication_year, description, image) 
                  VALUES (:tittle, :author, :category, :publication_year, :description, :image)";
    
        $stmt = $this->conn->prepare($query);
    
        $this->tittle = htmlspecialchars(strip_tags($this->tittle));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->publication_year = htmlspecialchars(strip_tags($this->publication_year));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->image = htmlspecialchars(strip_tags($this->image));
    
        $stmt->bindParam(":tittle", $this->tittle);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":publication_year", $this->publication_year);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
    
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function getAllBooks() {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            error_log("Books found: " . print_r($result, true));
            
            return $result;
        } catch(PDOException $e) {
            error_log("Error in getAllBooks: " . $e->getMessage());
            return [];
        }
    }
    public function getBookById($id) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return false;
        }
    }
    public function update() {
        $query = "UPDATE books 
                  SET tittle = :tittle, 
                      author = :author, 
                      category = :category, 
                      image = :image 
                  WHERE id = :id";
    
        $stmt = $this->conn->prepare($query);

        $this->tittle = htmlspecialchars(strip_tags($this->tittle));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        $stmt->bindParam(":tittle", $this->tittle);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":id", $this->id);
    
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function delete() {
        try {

            $query = "SELECT image FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$this->id]);
            $book = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            
            if($stmt->execute([$this->id])) {

                if (!empty($book['image'])) {
                    $image_path = '../public/images/' . $book['image'];
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                return true;
            }
            return false;
        } catch(PDOException $e) {
            error_log("Error in deleteBook: " . $e->getMessage());
            return false;
        }
    }
}