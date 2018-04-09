<?php
    // create a database connection
    $db = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=prin");
    if (!$db) {
        die("Could not connect to database");
    }
?>
