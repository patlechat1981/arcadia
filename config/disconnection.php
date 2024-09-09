<?php
 session_start(); 
session_unset();
session_destroy();
setcookie('token', '', time()-3444, '/', null, false, true);

header('location: /ZOOARCARDIA2/index.php');



?>