<?php
// This is the main entry point for the application.
// Include the necessary files
require_once 'config.php';
require_once 'funciones.php';
// Start the session
session_start();
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, redirect to the dashboard
    header('Location: dashboard.php');
    exit();
} else {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
