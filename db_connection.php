<?php

define ("DB_HOST", "localhost"); // set database host
define ("DB_USER", "root"); // set database user
define ("DB_PASS",""); // set database password
define ("DB_NAME","tpo"); // set database name

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


?>