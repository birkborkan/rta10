<?php
$conn=mysql_connect('localhost','root','rootroot') or die("error in connect to server");
$selectdb=mysql_select_db('rotanadb',$conn) or die("error in data base name");
date_default_timezone_set('Africa/Lagos');
?>