<?php
require("app.php");

$app = new App("localhost", "root", "123456789", "biblioteca");
$conn = $app->connectDB();
?>