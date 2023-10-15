<?php

setcookie('myCookie', '', time() - 3600, '/');

echo "Cookie 'myCookie' has been deleted.";
?>
