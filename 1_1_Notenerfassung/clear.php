<?php

use models\GradeEntry;

session_start();

if (isset($_POST['clear'])) {
    require_once("models/GradeEntry.php");
    GradeEntry::deleteAll();

    header("Location: index.php");
    //exit; nur wenn danach was kommt.
} else {
    http_response_code(405);
}
?>