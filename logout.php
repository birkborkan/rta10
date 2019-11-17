<?php
session_start();
session_unset(!isset($_SESSION['global_admin']));
session_unset(!isset($_SESSION['admin']));

?>