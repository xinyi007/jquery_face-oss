<?php
session_start();
$face = $_SESSION['face'];
echo "<img src='".$face."'><br>".$face."";
?>