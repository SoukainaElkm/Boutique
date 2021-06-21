<?php
    session_start();
    $_SESSION = array();
    setcookie(session_name(), '', time() - 1);
    session_destroy();
    echo "<script> window.location.replace(\"login.php\"); </script>";
?>