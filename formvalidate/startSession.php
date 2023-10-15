<?php

session_start();

$_SESSION['lastAccessTime'] = time();


if (isset($_SESSION['lastAccessTime'])) {
   
    $currentTime = time();
    $lastAccessTime = $_SESSION['lastAccessTime'];
    $timeout = 60; 
    
    if (($currentTime - $lastAccessTime) > $timeout) {
        echo "Session has timed out.";
    } else {
        echo "Session is active.";
    }
} else {
    echo "Session not started.";
}
?>
