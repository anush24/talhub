<?php
$servername = "localhost";
$username = "root";

// Create connection
$link = new mysqli($servername, $username,"","talhub1");

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

?>