<?php
// src/db.php
$config = require __DIR__ . '/config.php';
$db = $config['db'];
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8mb4";
try {
$pdo = new PDO($dsn, $db['user'], $db['pass'], [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
]);
} catch (PDOException $e) {
// don't display $e->getMessage() in production
die('Database connection failed.');
}