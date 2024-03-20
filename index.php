<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/index.css">
   <title>Main</title>
   <style>
      .image{
         display: flex;
         justify-content: center;
      }
      .container{
         display: flex;
         justify-content: center;
         flex-direction: column;
      }
      .select{
         display: flex;
         justify-content: center;
         align-items: center;
      }

   </style>
</head>

<body>
   <?php include("header.php") ?>
   <div class="main"> 
      
      <p class="name">Basic Banking System</p>
      <p class="welcome">Welcome!</p>
   </div>
   <div class="image">
      <div class='container'>
      <a href="/pages/viewall.php"><img src="/images/viewall.jpg" alt=""></a>
      <p class="select" style=""><a class="select" href="/pages/viewall.php">View All Customers</a></p>
      </div>
      <div class='container'>
      <a href="/pages/transfer.php"><img src="/images/transfer.jpg" alt=""></a>
      <p class="select" style=""><a class="select" href="/pages/transfer.php">Transfer Money</a></p>
      </div>
      <div class='container'>
      <a href="/pages/transitionhistory.php"><img src="/images/transactionhistory.avif" alt=""></a>
      <p class="select" style=""><a class="select" href="/pages/transitionhistory.php">Transaction History</a></p>

      </div>
   </div>
   <div class="link">
   </div>
</body>

</html>