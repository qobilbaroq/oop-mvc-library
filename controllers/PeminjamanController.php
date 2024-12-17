<?php
require 'Controller.php';
require_once 'models/Book.php';
require 'models/User.php';
require 'models/Loan.php';

class PeminjamanController extends Controller
{
    public static function index()
    {
        $data = Book::get();
        $data2 = User::listmember();
        $data3 = Loan::get();
        // var_dump($data3);
        if (count($_POST) > 0) {

            $book_id = $_POST['book_id'];
            $user_id = $_POST['user_id'];
            $borrow_date = $_POST['borrow_date'];
            $return_date = $_POST['return_date'];

            if ($book_id == '' || $user_id == '' || $borrow_date == '' || $return_date = '') {
                $_SESSION['error'] = "MUST BE FILLED";
                $_SESSION['book_id'] = $book_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['borrow_date'] = $borrow_date;
                $_SESSION['return_date'] = $return_date;

                header('location: /peminjaman');
                die();
            }

            $user = new Loan($book_id, $user_id, $borrow_date, $return_date);
            $user->store();
            die();
        }
        return self::view('views/peminjaman.php', $data, $data2, $data3);
    }
    
}

PeminjamanController::index();
