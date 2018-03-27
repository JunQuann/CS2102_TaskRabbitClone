<?php

session_start();
if(!$_SESSION['logged_in']) {
    header('Location: sign_in.php');
}

?>