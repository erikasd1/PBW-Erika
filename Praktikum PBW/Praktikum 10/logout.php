<?php
session_start();
session_unset();
session_destroy();

echo "kamu udah logout bro. <a href='login.php'>login lagi</a>";
?>
