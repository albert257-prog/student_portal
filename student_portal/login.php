<?php
require_once __DIR__ . '/src/auth.php';


$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (!csrf_verify($_POST['csrf'] ?? '')) {
$error = 'Invalid CSRF token';
} else {
$email = trim($_POST['email']);
$pass = $_POST['password'];
if (login($email, $pass)) {
header('Location: dashboard.php');
exit;
} else {
$error = 'Invalid email or password';
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"><title>Login</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container">
<h1>Student Portal Login</h1>
<?php if($error): ?><div class="error"><?= esc($error) ?></div><?php endif; ?>
<form method="post">
<input type="hidden" name="csrf" value="<?= esc(csrf_token()) ?>">
<label>Email<input type="email" name="email" required></label>
<label>Password<input type="password" name="password" required></label>
<button type="submit">Login</button>
</form>
</main>
</body>
</html>