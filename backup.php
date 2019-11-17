

<?php
ob_start();
session_start();
        include"connect.php";

    BACKUP DATABASE rotanadb
TO DISK = 'D:\tana\testDB.bak'
WITH DIFFERENTIAL; 

ob_end_flush();
?>