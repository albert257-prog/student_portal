<?php
require_once __DIR__ . '/../src/auth.php';
require_once __DIR__ . '/../src/db.php';
if (!check_auth()) header('Location: login.php');


$id=(int)($_GET['id']??0);
$stmt=$pdo->prepare('SELECT * FROM students WHERE id=?');
$stmt->execute([$id]);
$student=$stmt->fetch();
if(!$student) die('Not found');


if($_SERVER['REQUEST_METHOD']==='POST' && csrf_verify($_POST['csrf'])){
$stmt=$pdo->prepare('UPDATE students SET student_number=?,first_name=?,last_name=?,email=?,course=?,year=? WHERE id=?');
$stmt->execute([
$_POST['student_number'],$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['course'],$_POST['year'],$id
]);
header('Location: students.php');
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Edit Student</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body>
<nav><a href="students.php">Back</a></nav>
<main class="container">
<h1>Edit Student</h1>
<form method="post">
<input type="hidden" name="csrf" value="<?= esc(csrf_token()) ?>">
<label>Student #<input name="student_number" value="<?= esc($student['student_number']) ?>" required></label>
<label>First Name<input name="first_name" value="<?= esc($student['first_name']) ?>" required></label>
<label>Last Name<input name="last_name" value="<?= esc($student['last_name']) ?>" required></label>
<label>Email<input name="email" value="<?= esc($student['email']) ?>"></label>
<label>Course<input name="course" value="<?= esc($student['course']) ?>"></label>
<label>Year<input type="number" name="year" value="<?= (int)$student['year'] ?>"></la