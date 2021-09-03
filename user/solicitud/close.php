<?php
session_start();
session_destroy();
header(locate:'../../index.php');
?>