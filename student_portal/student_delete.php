<?php
include('includes/config.php'); 
include('includes/auth.php'); 
// require_role(['Admin']); // Only Admin can delete

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM students WHERE student_id = ?");
        $stmt->execute([$id]);

        // Redirect with success message (or simply redirect to list)
        header('Location: students.php?status=deleted');
        exit;
    } catch (PDOException $e) {
        // Log the error
        error_log("Delete error: " . $e->getMessage());
        header('Location: students.php?status=error');
        exit;
    }
} else {
    // Invalid ID provided
    header('Location: students.php?status=invalid_id');
    exit;
}
?>