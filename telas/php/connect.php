<?php
require("app.php");

$app = new App("localhost", "root", "123456", "biblioteca");
$conn = $app->connectDB();
?>
