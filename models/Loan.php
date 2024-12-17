<?php 
require_once 'config/database.php';

class Loan{
    private $id,$author, $title, $book_id, $user_id, $borrow_date, $return_date, $fine, $return_date_real;

    static function get(){
        global $pdo;
        $query = $pdo->query("SELECT loan.id, books.title, books.author, loan.borrow_date, loan.return_date FROM loan JOIN books ON books.id=loan.book_id JOIN users ON users.id=loan.user_id");
        return $query->fetchAll(PDO::FETCH_CLASS, 'Loan');
    }
    
    function store(){
        try {
            global $pdo;
            if (empty($_POST['book_id']) || empty($_POST['user_id']) || empty($_POST['borrow_date']) || empty($_POST['return_date'])) {
                throw new Exception("All fields are required");
            }

            $this->book_id = $_POST['book_id'];
            $this->user_id = $_POST['user_id'];
            $this->borrow_date = $_POST['borrow_date'];
            $this->return_date = $_POST['return_date'];

            $query = "INSERT INTO loan (book_id, user_id, borrow_date, return_date) VALUES (:book_id, :user_id, :borrow_date, :return_date)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':book_id', $this->book_id);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':borrow_date', $this->borrow_date);
            $stmt->bindParam(':return_date', $this->return_date);

            $stmt->execute();
            $_SESSION['success'] = "Peminjaman success";
            header('location: /peminjaman');
            exit;
        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }
    
    function getTitle(){
        return $this->title;
    }
    function getAuthor(){
        return $this->author;
    }
    function getBorrow(){
        return $this->borrow_date;
    }
    function getReturn(){
        return $this->return_date;
    }
}