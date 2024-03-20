<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tablepage.css">
    <link rel="stylesheet" href="../css/transitionhistory.css">
    <title>Transition History</title>
</head>
<body>
<?php include("../header.php")?>
     <header>
        <p class="name">Transition History</p>
    </header>
    <?php
$servername = "sql202.infinityfree.com";
$username = "if0_36139908";
$password = "n7FGTcs8BwAUdf";
$dbname = "if0_36139908_rtdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM record;";
$result = $conn->query($sql1);

if (!$result) {
    echo "No record found";
    exit;
}

echo "<table>";
echo "<tr><th>Sender A/C</th><th>Receiver A/C</th><th>Amount</th><th>Date and Time</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['sender'] . "</td>";
    echo "<td>" . $row['receiver'] . "</td>";
    echo "<td>" . $row['amt'] . "</td>";
    echo "<td>" . $row['date_time'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();
?>

</body>
</html>