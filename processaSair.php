<?php
    session_start();
    session_destroy();
    $_SESSION = array(); 
    include_once 'index.html';
?>
