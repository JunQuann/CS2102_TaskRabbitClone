<?php
    // create a database connection
    $db = pg_connect("host=localhost port=5432 dbname=CS2102 user=postgres password=Geremias!8");
    if (!$db) {
        die("Could not connect to database");
    }
?>
