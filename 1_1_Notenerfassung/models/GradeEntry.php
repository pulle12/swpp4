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
            //speuch 3:47

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

    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }


}