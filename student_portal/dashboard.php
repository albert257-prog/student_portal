<?php 
$page_title = "Dashboard";
include('includes/header.php'); 
include('includes/db.php'); 
// The db.php file is assumed to contain logic to fetch data using $pdo defined in config.php
// For a compelling portfolio, replace the dummy data in main.js with a real AJAX call or PHP data structure!

// Example PHP logic to fetch data for the chart (replace with actual logic)
/*
$stmt = $pdo->query("SELECT course, COUNT(*) as count FROM students GROUP BY course");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$chart_labels = json_encode(array_column($data, 'course'));
$chart_data = json_encode(array_column($data, 'count'));
*/

?>
<h3 class="mb-4 text-primary">
    <i class="bi bi-speedometer2 me-2"></i> Dashboard Overview
</h3>

<div class="row g-4">
  <div class="col-lg-6">
    <div class="card shadow p-3 h-100">
      <h5 class="card-title text-center text-muted">Students per Course</h5>
      <canvas id="studentChart"></canvas>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow p-4 h-100 bg-light border-primary border-3 border-start">
      <h4 class="card-title">Welcome Back, <?= htmlspecialchars($_SESSION['username'] ?? 'User'); ?>!</h4>
      <p class="text-muted mb-4">You are currently logged in as **<?= htmlspecialchars($_SESSION['role'] ?? 'Admin'); ?>**. Use the navigation to manage student records and view real-time statistics.</p>
      
      <div class="d-grid gap-2">
        <a href="students.php" class="btn btn-primary btn-lg">
            <i class="bi bi-people me-2"></i> Manage Students
        </a>
        <a href="export_csv.php" class="btn btn-outline-success">
            <i class="bi bi-file-earmark-spreadsheet me-2"></i> Export Data
        </a>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script src="assets/js/main.js"></script>
<?php include('includes/footer.php'); ?>