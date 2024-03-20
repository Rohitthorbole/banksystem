<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/transfer.css">
    <title>transfer</title>
</head>
<body>
<?php include("../header.php")?>
    <main>
        <header>
        <p class="name">Transfer Money</p>
        </header>
        <form action="transfer.php" method="POST">
            <div class="in">
                <label class="input">Sender's A/C Number :</label><input type="text" name="sender"><br>
                <label class="input">Receiver's A/C Number :</label><input type="text" name="receiver"><br>
                <label class="input">Amount :</label><input type="number" name="amt"><br>
                <input type="submit" value="Transfer"><br>
            </div>
        </form> 
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rec = $_POST['receiver'];
        $amt = $_POST['amt'];
        $send = $_POST['sender'];

        if($send==$rec)
        {
            echo'<p class="name" style="color:red">Invalid</p>';
        }
        elseif($amt<=0){
            echo'<p class="name" style="color:red">Amount should be greater then zero</p>';
        }
        else{
        
            $servername = "sql202.infinityfree.com";
            $username = "if0_36139908";
            $password = "n7FGTcs8BwAUdf";
            $dbname = "if0_36139908_rtdb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $checkBalance = "SELECT curr_amt FROM customer WHERE id = $send";
        $balanceResult = $conn->query($checkBalance);

        if ($balanceResult->num_rows > 0) {
            $senderBalance = $balanceResult->fetch_assoc()['curr_amt'];

            if ($amt > $senderBalance) {
                echo "<p class='name' style='color:orange'>Insufficient Balance";
            } else {
               
                $sql1 = "UPDATE customer SET curr_amt = (curr_amt + $amt) WHERE id = $rec;";
                $result1 = $conn->query($sql1);

                if (!$result1) {
                    echo "Error updating receiver's amount: " . $conn->error;
                }

                
                $sql2 = "UPDATE customer SET curr_amt = (curr_amt - $amt) WHERE id = $send";
                $result2 = $conn->query($sql2);

                if (!$result2) {
                    echo "Error updating sender's amount: " . $conn->error;
                }

                
                $sql3 = "INSERT INTO record (sender, receiver, amt) VALUES ('$send', '$rec', '$amt')";
                $result3 = $conn->query($sql3);

                if (!$result3) {
                    echo "Error inserting record: " . $conn->error;
                } else {
                    echo "<p class='name' style='color:green'>Transfer successful!<p>";
                }
            }
        } else {
            echo "Error checking sender's balance: " . $conn->error;
        }

        $conn->close();
    }
        }
        ?>
    </body>
</html>
