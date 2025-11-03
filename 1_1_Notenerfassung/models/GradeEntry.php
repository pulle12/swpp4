<?php

namespace models;

use DateTime;

class GradeEntry
{
    private $name = '';
    private $email = '';
    private $examDate = '';
    private $subject = '';
    private $grade = '';

    private $errors = [];

    public function __construct()
    {

    }

    public static function getAll()
    {
        $grades = [];

        if (isset($_SESSION['grades'])) {
            foreach ($_SESSION['grades'] as $grade) {
                $grades[] = unserialize($grade);
            }
        }

        return $grades;
    }

    public static function deleteAll()
    {
        if (isset($_SESSION['grades'])) {
            unset($_SESSION['grades']);
        }
    }

    public function save()
    {
        if ($this->validate()) {
            $s = serialize($this);
            $_SESSION['grades'][] = $s;
            return true;
        }

        return false;
    }

    public function validate()
    {
        return $this->validateName($this->name) & $this->validateEmail($this->email) & $this->validateExamDate($this->examDate) & $this->validateGrade($this->grade) & $this->validateSubject($this->subject);
    }

    private function validateName()
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

    private function validateExamDate()
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

    private function validateSubject()
    {
        if ($this->subject != 'm' && $this->subject != 'e' && $this->subject != 'd') {
            $this->errors['subject'] = "Fach ungültig";
            return false;
        } else {
            return true;
        }

    }

    private function validateGrade()
    {
        if (!is_numeric($this->grade) || $this->grade < 1 || $this->grade > 5) {
            $this->errors['grade'] = "Note ungültig";
            return false;
        } else {
            return true;
        }
    }

    private function validateEmail()
    {
        if ($this->email != "" && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "E-Mail ungültig";
            return false;
        } else {
            return true;
        }
    }

    public function getExamDateFormatted()
    {
        return date_format(date_create($this->examDate), 'd.m.Y');
    }

    public function getSubjectFormatted()
    {
        switch ($this->subject) {
            case 'm':
                return 'Mathematik';
            case 'e':
                return 'Englisch';
            case 'd':
                return 'Deutsch';
            default :
                return null;
        }
    }

    public function hasError($field)
    {
        return isset($this->errors[$field]);
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


}