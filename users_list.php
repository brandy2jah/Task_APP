<?php
// users_list.php
include 'conf.php';

// connect
$conn = new mysqli($conf['DB_HOST'], $conf['DB_USER'], $conf['DB_PASS'], $conf['DB_NAME']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// query users
$sql = "SELECT username, email FROM users ORDER BY username ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h2>Registered Users</h2>";
    echo "<ol>"; // auto-numbered list
    while ($row = $result->fetch_assoc()) {
        $uname = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');
        $uemail = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
        echo "<li>{$uname} — {$uemail}</li>";
    }
    echo "</ol>";
} else {
    echo "No users found.";
}

$conn->close();
?>
