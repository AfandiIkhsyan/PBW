<?php
class BookModel {
    private $conn;
    private $table_name = 'books';

    public $id;
    public $title;
    public $author;
    public $year;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getBooks() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function createBook() {
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, author=:author, year=:year";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":year", $this->year);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
