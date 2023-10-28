<?php
// unset($_SESSION['user']);
session_unset();
header("Location: $URL");
?>