<?php

$db = new mysqli('localhost', 'root', '', 'ganjil');

function test_input($data) {
    global $db;

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $db->real_escape_string($data);

    return $data;
}