<?php
include 'connect-db.php'; 

// If form submitted:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;

    if (!$user_id) {
        $message = "Missing user ID.";
    } else {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $message = "User deleted successfully.";
        } else {
            $message = "Failed to delete user.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!-- Frontend UI -->
<h2>Delete User</h2>

<?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label>User ID:</label>
    <input type="number" name="user_id" required>
    <button type="submit">Delete User</button>
</form>

<p><a href="index.php?page=home">Back to Home</a></p>
