<?php
//Logout

session_start();
session_unset();
session_destroy();

header("Location: read.php");

