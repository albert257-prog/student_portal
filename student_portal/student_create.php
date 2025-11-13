<?php 
$page_title = "Create Student";
include('includes/header.php'); 
include('includes/config.php'); 
// require_role(['Admin']); // Only Admin can create

$name = $email = $course = $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    if (empty($name) || empty($email) || empty($course)) {
        $message = ['type' => 'danger', 'text' => 'All fields are required.'];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = ['type' => 'danger', 'text' => 'Invalid email format.'];
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO students (name, email, course) VALUES (:name, :email, :course)");
            $stmt->execute(['name' => $name, 'email' => $email, 'course' => $course]);
            $message = ['type' => 'success', 'text' => 'Student added successfully!'];
            // Clear fields on success
            $name = $email = $course = '';
        } catch (PDOException $e) {
            $message = ['type' => 'danger', 'text' => 'Database error: ' . $e->getMessage()];
        }
    }
}
?>

<h3 class="mb-4 text-success"><i class="bi bi-person-plus-fill me-2"></i> Add New Student</h3>

<?php if (isset($message)): ?>
    <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
        <?= $message['text'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card shadow p-4 col-md-8 mx-auto">
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
        </div>
        <div class="mb-4">
            <label for="course" class="form-label">Course</label>
            <select class="form-select" id="course" name="course" required>
                <option value="">Select Course</option>
                <option value="IT" <?= ($course == 'IT' ? 'selected' : '') ?>>Information Technology</option>
                <option value="Business" <?= ($course == 'Business' ? 'selected' : '') ?>>Business Management</option>
                <option value="Design" <?= ($course == 'Design' ? 'selected' : '') ?>>Graphic Design</option>
                <option value="Engineering" <?= ($course == 'Engineering' ? 'selected' : '') ?>>Mechanical Engineering</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success me-2">
            <i class="bi bi-save me-1"></i> Save Student
        </button>
        <a href="students.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
    </form>
</div>

<?php include('includes/footer.php'); ?>