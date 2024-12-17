<?php
require_once 'config/database.php';
class User
{
    private $id, $name, $username, $password, $role_id;

    // public function __construct($name, $username, $password, $role_id){
    //     $this->name = $name;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->role_id = $role_id;
    // }

    public function auth($username, $password)
    {
        try {
            global $pdo;

            $select = "SELECT * FROM users WHERE username='" . $username . "'";
            $query = $pdo->query($select);
            $user = $query->fetchAll(PDO::FETCH_CLASS, 'User');

            if (count($user) == 0) {
                $_SESSION['error'] = "User has not registered";
                header('location: /login');
                die;
            }


            if (password_verify($password, $user[0]->password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['username'] = $this->username;
                header("location: /membership");
                die();
            }

            $_SESSION['error'] = "Password Wrong!!!";
            header('location: /login');
        } catch (PDOException $e) {
            echo $user . "<br>" . $e->getMessage();
        }
    }
    public function register()
    {
        try {
            global $pdo;
            if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])) {
                throw new Exception("All fields are required");
            }

            $this->name = $_POST['name'];
            $this->username = $_POST['username'];
            $this->password = $_POST['password'];

            $select = "SELECT * FROM users WHERE username = :username";
            $stmt = $pdo->prepare($select);
            $stmt->bindParam(':username', $this->username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "Username sudah dipakai, silakan pilih username lain.";
                header('location: /register');
                exit;
            }

            $query = "INSERT INTO users (name, username, password, role_id) VALUES (:name, :username, :password, :role_id)";
            $stmt = $pdo->prepare($query);

            $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindValue(':role_id', 2, PDO::PARAM_INT);

            $stmt->execute();
            $_SESSION['success'] = "Register Success";
            header('location: /register');
            exit;
        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }
    static function listmember()
    {
        global $pdo;
        $query = $pdo->query("SELECT * FROM users WHERE role_id = 2");
        return $query->fetchAll(PDO::FETCH_CLASS, 'User');
    }
    public function getName(){
        return $this->name;
    }
    public function getId(){
        return $this->id;
    }
}
