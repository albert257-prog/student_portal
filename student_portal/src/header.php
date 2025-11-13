<?php 
// Ensure config is loaded before auth for database access/helpers (assuming auth uses DB)
include('config.php'); 
include('auth.php'); 
// Assuming helpers.php contains utility functions
include('helpers.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Portal - <?= isset($page_title) ? $page_title : 'Dashboard' ?></title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">
        <i class="bi bi-person-badge-fill me-2"></i> Student Portal
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="students.php"><i class="bi bi-people-fill me-1"></i> Students</a></li>
        <li class="nav-item">
          <a class="btn btn-outline-light ms-2" href="logout.php">
            <i class="bi bi-box-arrow-right me-1"></i> Logout (<?= htmlspecialchars($_SESSION['username'] ?? 'User') ?>)
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main class="container mt-4">