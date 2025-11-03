<?php

namespace models;

class GradeEntry
{
    private $name = '';
    private $email = '';
    private $examDate = '';
    private $subject = '';
    private $grade = '';

    private $errors = [];

    public function __construct() {

    }

    public static function getAll() {

    }

    public static function deleteAll() {

    }

    public function save() {
        if($this->validate()) {
            //speichern

            return true;
        }

        return false;
    }

    function validate()
    {
        return $this->validateName($this->name) & $this->validateEmail($this->email) & $this->validateExamDate($this->examDate) & $this->validateGrade($this->grade) & $this->validateSubject($this->subject);
    }

    function validateName()
    {
        if (strlen($this->name) == 0) {
            $this->errors['name'] = "Name darf nicht leer sein";
            return false;
        } else if (strlen($this->name) > 20) {
            $this->errors['name'] = "Name zu lang";
            return false;
        } else {
            return true;
        }
    }

    function validateExamDate()
    {
        try {
            if (strlen($this->examDate) == "") {
                $this->errors['examDate'] = "Prüfungsdatum darf nicht leer sein";
                return false;
            } else if (new DateTime($this->examDate) > new DateTime()) {
                $this->errors['examDate'] = "Prüfungsdatum darf nicht in der Zukunft liegen";
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            $this->errors['examDate'] = "Prüfungsdatum ungültig";
            return false;
        }
    }

    function validateSubject()
    {
        if ($this->subject != 'm' && $this->subject != 'e' && $this->subject != 'd') {
            $this->errors['subject'] = "Fach ungültig";
            return false;
        } else {
            return true;
        }
    }

    function validateGrade()
    {
        if (!is_numeric($this->grade) || $this->grade < 1 || $this->grade > 5) {
            $this->errors['grade'] = "Note ungültig";
            return false;
        } else {
            return true;
        }
    }

    function validateEmail()
    {
        if ($this->email != "" && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "E-Mail ungültig";
            return false;
        } else {
            return true;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getExamDate(): string
    {
        return $this->examDate;
    }

    public function setExamDate(string $examDate): void
    {
        $this->examDate = $examDate;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): void
    {
        $this->grade = $grade;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(array $errorss): void
    {
        global $errors;
        $this-> $errors = $errorss;
    }


}