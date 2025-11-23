<?php

class Benutzer
{
    private $email;
    private $password;

    private $loggedIn;

    private $errors = [];

    /**
     * @param $email
     * @param $password
     */
    public function __construct()
    {

    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function validate()
    {
        return $this->validateEmail() & $this->validatePassword();
    }

    public function validateEmail() {
        if ($this->email != "" && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "E-Mail ungültig";
            return false;
        } else {
            if(strlen($this->email) < 5 || strlen($this->email) > 30) {
                $this->errors['email'] = "E-Mail muss zwischen 5 und 30 Zeichen lang sein";
                return false;
            } else {
                return true;
            }
        }
    }

    public function validatePassword() {
        if (strlen($this->password) < 5 || strlen($this->password) > 20) {
            $this->errors['password'] = "Passwort muss zwischen 5 und 20 Zeichen lang sein";
            return false;
        } else {
            return true;
        }
    }

    public function hasError($field)
    {
        return isset($this->errors[$field]);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

	public static function get($email, $password, $conn) {
        $user = null;
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $user = new self();

        }
        return $user;
    }

	public function login($conn) {
        if ($this->validate()) {
            $user = Benutzer::get($this->getEmail(), $this->getPassword(), $conn);
            if ($user !== null) {
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $this->getEmail();
                $_SESSION['password'] = $this->getPassword();
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

	public static function logout() {
        $_SESSION = [];
        session_destroy();
        setcookie(session_name(), '', time() - 3600, '/');
        return true;
    }

    /**
     * @return mixed
     */
    public function getLoggedIn()
    {
        return $this->loggedIn;
    }

    /**
     * @param mixed $loggedIn
     */
    public function setLoggedIn($loggedIn): void
    {
        $this->loggedIn = $loggedIn;
    }

    public function save($conn)
    {
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $this->email, $this->password);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}

?>