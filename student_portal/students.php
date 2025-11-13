<?php 
$page_title = "Manage Students";
include('includes/header.php'); 
include('includes/config.php'); 
// Add permission check (e.g., only Admin/Lecturer can view)
// require_role(['Admin', 'Lecturer']); 

// Fetch all students from the database
try {
    $stmt = $pdo->query("SELECT * FROM students ORDER BY student_id DESC");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Could not retrieve student data.";
}

?>

<h3 class="mb-4 text-primary"><i class="bi bi-people-fill me-2"></i> Student Records</h3>

<?php if (isset($error_message)): ?>
    <div class="alert alert-danger" role="alert"><?= $error_message ?></div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="student_create.php" class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i> Add New Student
    </a>
    <div class="input-group w-50">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <input type="text" id="searchInput" class="form-control" placeholder="Search students...">
    </div>
</div>

<div class="table-responsive shadow-sm rounded-3">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['student_id']) ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><span class="badge bg-secondary"><?= htmlspecialchars($student['course']) ?></span></td>
                <td>
                    <a href="student_edit.php?id=<?= $student['student_id'] ?>" class="btn btn-sm btn-info text-white me-2" title="Edit">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('student_delete.php?id=<?= $student['student_id'] ?>')" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($students)): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No student records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>