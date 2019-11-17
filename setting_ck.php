<?php
ob_start();
session_start();
include"connect.php";

  echo "<a href='setting.php'> back</a>";
ob_end_flush();
mysql_free_result($q);
mysql_close($conn);
?>