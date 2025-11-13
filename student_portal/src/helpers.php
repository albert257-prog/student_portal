<?php
// src/helpers.php
session_start();


function esc($str) {
return htmlspecialchars($str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}


function set_flash($key, $msg) {
$_SESSION['_flash'][$key] = $msg;
}
function get_flash($key) {
if(!empty($_SESSION['_flash'][$key])) {
$m = $_SESSION['_flash'][$key];
unset($_SESSION['_flash'][$key]);
return $m;
}
return null;
}


// CSRF token
function csrf_token() {
if (empty($_SESSION['csrf_token'])) {
$_SESSION['csrf_token'] = bin2hex(random_bytes(24));
}
return $_SESSION['csrf_token'];
}
function csrf_verify($token) {
return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}