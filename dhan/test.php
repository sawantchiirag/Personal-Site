<?php
// Save break slot if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars(trim($_POST['name']));
  $type = htmlspecialchars(trim($_POST['type']));
  $slot = htmlspecialchars(trim($_POST['slot']));
  $date = date('Y-m-d H:i:s');

  $entry = "$date | @$name | $type | $slot\n";
  file_put_contents("chat_break_slots.txt", $entry, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat Team Break Slots</title>
  <style>
    body { font-family: Arial, sans-serif; background: #eef9ff; padding: 30px; }
    .container { max-width: 800px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    h2, h3 { color: #0077b6; }
    select, button { width: 100%; padding: 10px; margin-top: 10px; }
    pre { background: #f1f1f1; padding: 15px; border-radius: 6px; overflow-x: auto; margin-top: 20px; white-space: pre-wrap; }
    .note { margin-top: 10px; font-size: 14px; color: #555; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Chat Team Break Slots</h2>
    <form method="post">
      <select name="name" required>
        <option value="">-- Select Agent Name --</option>
        <?php
        $names = [
          "Pranit Jadhav", "Akash Gupta", "Sachin Kanojia", "Raj Raval", "Tejal Jadhav", "Akshay Gunaji Kotkar",
          "Shubham Singh", "Vaibhav Lad", "Iqbal Shaikh", "Vedant Padhiar", "Pranay Rakshe", "Rekha Chawan",
          "Madiya Khatri", "Om Gaikwad", "Atul Kumar Tiwari", "Aparna Marick", "Hiten Narsana", "Siddesh Shetty",
          "Bhavisha Mistry", "Jash Damania", "Madhura Lingayat", "Mrunmayi Vaity"
        ];
        foreach ($names as $name) {
          echo "<option value=\"$name\">$name</option>";
        }
        ?>
      </select>

      <select name="type" required>
        <option value="Morning">Morning (10:00 AM - 12:00 PM)</option>
        <option value="Lunch">Lunch (1:00 PM - 4:30 PM)</option>
      </select>

      <select name="slot" required>
        <?php
        $slots = [
          "10:00 AM - 10:15 AM", "10:15 AM - 10:30 AM", "10:30 AM - 10:45 AM", "10:45 AM - 11:00 AM",
          "11:00 AM - 11:15 AM", "11:15 AM - 11:30 AM", "11:30 AM - 11:45 AM", "11:45 AM - 12:00 PM",
          "1:00 PM - 1:15 PM", "1:15 PM - 1:30 PM", "1:30 PM - 1:45 PM", "1:45 PM - 2:00 PM",
          "2:00 PM - 2:15 PM", "2:15 PM - 2:30 PM", "2:30 PM - 2:45 PM", "2:45 PM - 3:00 PM",
          "3:00 PM - 3:15 PM", "3:15 PM - 3:30 PM", "3:30 PM - 3:45 PM", "3:45 PM - 4:00 PM",
          "4:00 PM - 4:15 PM", "4:15 PM - 4:30 PM"
        ];
        foreach ($slots as $slot) {
          echo "<option value=\"$slot\">$slot</option>";
        }
        ?>
      </select>

      <button type="submit">Submit Break Slot</button>
    </form>

    <h3>📋 All Chat Team Break Slots</h3>
    <pre>
<?php
if (file_exists("chat_break_slots.txt")) {
  echo htmlspecialchars(file_get_contents("chat_break_slots.txt"));
} else {
  echo "No break slots submitted yet.";
}
?>
    </pre>
  </div>
</body>
</html>
