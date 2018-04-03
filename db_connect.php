<?php
    // create a database connection
    $db = pg_connect("host=localhost port=5432 dbname=cs2102-project user=postgres password=e0282843");
    if (!$db) {
        die("Could not connect to database");
    }
?>
