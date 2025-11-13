<?php
require_once __DIR__ . '/../src/helpers.php';
require_once __DIR__ . '/../src/auth.php';
require_once __DIR__ . '/../src/db.php';
if (!check_auth()) header('Location: login.php');


$stmt = $pdo->query('SELECT student_number, first_name, last_name, email, course, year FROM students');
$rows = $stmt->fetchAll();


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="students_'.date('Y-m-d').'.csv"');
$output = fopen('php://output','w');
// header
fputcsv($output, ['Student #','First Name','Last Name','Email','Course','Year']);