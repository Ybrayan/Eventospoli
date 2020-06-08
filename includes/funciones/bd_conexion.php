<?php
    $conn = new mysqli($host = 'localhost', $username = 'root', $passwd = null, $dbname = 'eventospoli');
    if ($conn->connect_error) {
        echo $error->$conn->connect_error;
    }
?>