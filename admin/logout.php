<?php
session_start();
// cerrar session
session_destroy();

// eviar a login alert = 2
header('Location: login.php?alert=2');
?>