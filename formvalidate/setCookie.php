<?php

setcookie('myCookie', 'Hello, Cookie!', time() + 3600, '/');

echo "Cookie 'myCookie' has been set.";
?>
