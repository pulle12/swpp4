<?php

class Benutzer
{
    private $id;
    private $email;
    private $password;

    /**
     * @param $id
     * @param $email
     * @param $password
     */
    public function __construct($id, $email, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
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





    //Validierung

    //Anmeldung

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

	public static function isLoggedIn() {
        return null;
        //Rückgabe: boolean
    }

}

?>