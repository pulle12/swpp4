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
        $errors['tv'] = 'TV muss mindestens 1 sein.';
        return false;
    } else {
        return true;
    }
}

function validateRadio($radio)
{

    global $errors;

    if ($radio < 0) {
        $errors['radio'] = 'Radio muss mindestens 1 sein.';
        return false;
    } else {
        return true;
    }
}

function validateNewspaper($newspaper)
{

    global $errors;

    if ($newspaper < 0) {
        $errors['newspaper'] = 'Newspaper muss mindestens 1 sein.';
        return false;
    } else {
        return true;
    }
}