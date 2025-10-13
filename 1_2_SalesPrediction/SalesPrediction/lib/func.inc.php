<?php

$errors = [];
function validate($tv, $radio, $newspaper)
{
    return validateTV($tv) & validateRadio($radio) & validateNewspaper($newspaper);
}

function validateTV($tv)
{

    global $errors;

    if ($tv < 0) {
        $errors['tv'] = 'Die Zahl muss mindestens 1 sein.';
        return false;
    } else {
        return true;
    }
}

function validateRadio($radio)
{

    global $errors;

    if ($radio < 0) {
        $errors['tv'] = 'Die Zahl muss mindestens 1 sein.';
        return false;
    } else {
        return true;
    }
}

function validateNewspaper($newspaper)
{

    global $errors;

    if ($newspaper < 0) {
        $errors['tv'] = 'Die Zahl muss mindestens 1 sein.';
        return false;
    } else {
        return true;
    }
}