# coded by Security Flaws (IT-G)
# 2023

<?php
require_once('Class.php');

$user = new User();

// Create user
$user->createUser("Security Flaws", "mandagodson@hotmail.com");

// Update user
$user->updateUser(1, "Godson Titus", "it-g@example.com");

// Delete user
$user->deleteUser(1);
?>
