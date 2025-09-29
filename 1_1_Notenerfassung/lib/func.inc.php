<?php

$errors = [];
function validate($name, $email, $examDate, $grade, $subject) {
    return validateName($name);
}

function validateName($name) {

    global $errors;

    if(strlen($name) == 0) {
        $errors['name'] = "Name darf nicht leer sein";
        return false;
    } else if(strlen($name) > 20) {
        $errors['name'] = "Name zu lang";
        return false;
    } else {
        return true;
    }
}