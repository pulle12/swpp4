<?php

$errors = [];
function getAllData() {
    include __DIR__ . "/../data/PHP-13 userdata.php";
    $result = [];
    foreach ($data as $user) {
        $result[] = [
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'birthdate' => $user['birthdate'],
        ];
    }
    return $result;
}

function getFilteredData($filter) {
    include __DIR__ . "/../data/PHP-13 userdata.php";
    $filter = strtolower($filter);
    $result = [];

    foreach ($data as $user) {
        if (
            str_contains(strtolower($user["firstname"]), $filter) ||
            str_contains(strtolower($user["lastname"]), $filter) ||
            str_contains(strtolower($user["email"]), $filter)
        ) {
            $result[] = [
                'firstname' => $user['firstname'],
                'lastname'  => $user['lastname'],
                'email'     => $user['email'],
                'birthdate' => $user['birthdate'],
            ];
        }
    }
    return $result;
}
?>