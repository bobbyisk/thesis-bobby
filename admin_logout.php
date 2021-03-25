<?php
session_start();
session_destroy();

echo "<script type='text/javascript'>alert('Logged out.')</script>";
echo "<script language='javascript' type='text/javascript'> location.href='admin_login.php' </script>";
?>