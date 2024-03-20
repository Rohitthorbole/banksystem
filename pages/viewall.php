<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tablepage.css">
    <link rel="stylesheet" href="../css/viewall.css">
    <title>viewall</title>
</head>

<body>
    <?php include("../header.php") ?>
    <header>
        <p class="name">Customer Information</p>
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

    $sql1 = "SELECT * FROM customer;";
    $result = $conn->query($sql1);

    if (!$result) {
        echo "Error: " . $conn->error;
        exit;
    }

    echo "<table>";
    echo "<tr><th>A/C</th><th>Name</th><th>Email</th><th>Current Amount</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='./display.php?id=" . $row['id'] . "' style='text-decoration:none;color:black;'>" . $row['id'] . "</a></td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['curr_amt'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $conn->close();
    ?>
    <div>
        <p class="tip">(Click on A/C Number to view detail of customer)</p>
    </div>
</body>
</html>