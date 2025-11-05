<?php
include 'connect-db.php'; // uses $db (PDO connection)

try {
    $query = "SELECT e.id, e.title, e.description, e.date, e.location, u.username AS created_by
          FROM event e
          JOIN users u ON e.created_by = u.id
          ORDER BY e.date ASC";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p>Error fetching events: " . htmlspecialchars($e->getMessage()) . "</p>";
    $events = [];
}
?>

<h2>Browse Events</h2>

<?php if (count($events) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Location</th>
            <th>Created By</th>
        </tr>
        <?php foreach ($events as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
                <td><?php echo htmlspecialchars($row['location']); ?></td>
                <td><?php echo htmlspecialchars($row['created_by']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No events found.</p>
<?php endif; ?>

<p><a href="index.php?page=home">Back to Home</a></p>
