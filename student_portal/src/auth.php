<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header('Location: login.php');
    exit;
}
// Optional: Check for session timeout here for added security
 if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
     session_unset(); session_destroy(); header('Location: login.php?timeout'); exit;
 }
 $_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time stamp
?>