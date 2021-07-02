<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
        // Create connection
        $conn = new mysqli("localhost", "root", "taylorswift0809", "login_info");
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
?>