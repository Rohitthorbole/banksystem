<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $customerId = $_GET['id'];

    $sql = "SELECT * FROM customer WHERE id = $customerId;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $amt = $row['curr_amt'];
    } else {
        echo "Customer not found.";
    }
} else {
    echo "Invalid request. No customer ID provided.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tablepage.css">
    <link rel="stylesheet" href="../css/display.css">
    <title>display</title>
</head>
<body>
    <?php include("../header.php")?>
<?php
    echo "
    <header>
        <p class='name'>Customer Information</p>
    <header>";

    echo"
     <div class='information'>
      <label class='info'>A/C No : $id<label><br>
      <label class='info'>Name : $name<label><br>
      <label class='info'>Email : $email<label><br>
      <label class='info'>Balance : $amt<label><br>
     </div>
    ";

    echo "
        <p class='name'>Transition History</p>
    ";
    $servername = "sql202.infinityfree.com";
    $username = "if0_36139908";
    $password = "n7FGTcs8BwAUdf";
    $dbname = "if0_36139908_rtdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM record WHERE sender=$id OR receiver=$id;";
$result = $conn->query($sql1);

if (!$result) {
    echo "No record found";
    exit;
}

echo "<table class='info'>";
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
