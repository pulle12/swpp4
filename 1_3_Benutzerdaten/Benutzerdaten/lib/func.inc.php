<?php

$errors = [];
function getAllData(){
    require __DIR__ . "/../data/PHP-13 userdata.php";
    return $data;
}

function getFilteredData($filter) {
    require __DIR__ . "/../data/PHP-13 userdata.php";
    $filter = strtolower($filter);
    $result = [];
    foreach ($data as $user) {
        if (
            str_contains(strtolower($user["firstname"]), $filter) ||
            str_contains(strtolower($user["lastname"]), $filter) ||
            str_contains(strtolower($user["email"]), $filter)
        ) {
            $result[] = $user;
        }
    }
    return $result;
}

function validateUsers($users) {
    global $errors;
    foreach ($users as $user) {

    }
}
?>