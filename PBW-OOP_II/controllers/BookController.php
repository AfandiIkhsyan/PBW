<?php
require_once 'models/BookModel.php';

class BookController {
    private $db;
    private $book;

    public function __construct($db) {
        $this->db = $db;
        $this->book = new BookModel($this->db);
    }

    public function listBooks() {
        $stmt = $this->book->getBooks();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }

    public function createBook($title, $author, $year) {
        $this->book->title = $title;
        $this->book->author = $author;
        $this->book->year = $year;
        
        if ($this->book->createBook()) {
            header("Location: dashboard.php");
        } else {
            echo "Gagal membuat buku";
        }
    }
}
?>
