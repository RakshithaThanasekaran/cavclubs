<?php
include 'connect-db.php'; // keep consistent naming convention

$query = "SELECT e.id, e.title, e.description, e.date, e.location, u.username AS created_by
          FROM events e
          JOIN users u ON e.created_by = u.id
          ORDER BY e.date ASC";

$result = $conn->query($query);
?>

<h2>Browse Events</h2>

<?php if ($result && $result->num_rows > 0): ?>
    <table border ="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
            <th>Created By</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
                <td><?php echo htmlspecialchars($row['location']); ?></td>
                <td><?php echo htmlspecialchars($row['created_by']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No events found.</p>
<?php endif; ?>

<p><a href="index.php?page=home">Back to Home</a></p>

<?php
$conn->close();
?>
