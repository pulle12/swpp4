<?php

class Benutzer
{
    private $id;
    private $email;
    private $password;

    private $loggedIn;

    private $errors = [];

    /**
     * @param $id
     * @param $email
     * @param $password
     */
    public function __construct($id, $email, $password)
    {
        $this->id = $id;
        validateEmail($email);
        validatePassword($password);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
        if ($this->password < 5 || $this->password > 20) {
            $this->errors['password'] = "E-Mail muss zwischen 5 und 20 Zeichen lang sein";
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

    //Datenbank-Anbindung

	public static function get($email, $password) {
        return null;
        //Rückgabe: User-Objekt oder null
    }

	public function login() {
        return null;
        //Rückgabe: boolean
    }

	public static function logout() {
        return null;
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



}

?>