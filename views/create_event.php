<?php
include 'connect-db.php'; // uses $db (PDO connection)
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['createEventBtn'])) {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $month_date = $_POST['month_date'] ?? '';
    $day_date = $_POST['day_date'] ?? '';
    $year_date = $_POST['year_date'] ?? '';
    $start_time = $_POST['start_time'] ?? '';
    $end_time = $_POST['end_time'] ?? '';
    $venue_id = $_POST['venue_id'] ?? '';
    $cio_id = $_POST['cio_id'] ?? '';
    $computing_ID = $_POST['computing_ID'] ?? '';

    // Validate required fields
    if (!$title || !$month_date || !$day_date || !$year_date || !$start_time || !$end_time || !$venue_id || !$cio_id || !$computing_ID) {
        $message = "Missing required fields. Please fill out all fields.";
    } else {
        try {
            $stmt = $db->prepare(
                "INSERT INTO event (title, description, month_date, day_date, year_date, start_time, end_time, venue_id, cio_id, computing_ID)
                 VALUES (:title, :description, :month_date, :day_date, :year_date, :start_time, :end_time, :venue_id, :cio_id, :computing_ID)"
            );
            $stmt->execute([
                ':title' => $title,
                ':description' => $description,
                ':month_date' => $month_date,
                ':day_date' => $day_date,
                ':year_date' => $year_date,
                ':start_time' => $start_time,
                ':end_time' => $end_time,
                ':venue_id' => $venue_id,
                ':cio_id' => $cio_id,
                ':computing_ID' => $computing_ID
            ]);
            $message = "Event created successfully!";
        } catch (PDOException $e) {
            $message = "Failed to create event: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>

<h2>Create a New Event</h2>

<?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form method="post" action="">
  <input type="text" name="title" placeholder="Event Title" required>
  <textarea name="description" placeholder="Event Description"></textarea>

  <input type="number" name="month_date" placeholder="Month (e.g. 11)" min="1" max="12" required>
  <input type="number" name="day_date" placeholder="Day (e.g. 5)" min="1" max="31" required>
  <input type="number" name="year_date" placeholder="Year (e.g. 2025)" min="2024" required>

  <input type="time" name="start_time" required>
  <input type="time" name="end_time" required>

  <input type="text" name="venue_id" placeholder="Venue ID" required>
  <input type="text" name="cio_id" placeholder="CIO ID" required>
  <input type="text" name="computing_ID" placeholder="Creator Computing ID" required>

  <button type="submit" name="createEventBtn">Create Event</button>
</form>

<p><a href="index.php?page=home">Back to Home</a></p>
