<?php
session_start();

$conn = new PDO(
    "mysql:host=localhost;dbname=modern_dashboard",
    "root",
    ""
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
