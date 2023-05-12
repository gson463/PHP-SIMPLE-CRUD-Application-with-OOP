# coded by Security Flaws (IT-G)
# 2023


<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "crud";

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

class User extends Database {
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        $users = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public function createUser($name, $email) {
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        $result = $this->conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($id, $name, $email) {
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
        $result = $this->conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id='$id'";
        $result = $this->conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
