
<link rel="stylesheet" href="/css/header.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php
    echo '
    <div class="header">
        <nav>
        <ion-icon onclick="toggle()" class="ham" name="menu-outline"></ion-icon>
            <div class="main">
                <ul id = "myUl" class="">
                <li class="mainallcustome"><a href="/index.php">Home</a></li>
                <li class="mainallcustome"><a href="/pages/viewall.php">All Customer</a></li>
                <li class="mainallcustome"><a href="/pages/transfer.php">Transfer Money</a></li>
                <li class="mainallcustome"><a href="/pages/transitionhistory.php">Transition History</a></li>
                </ul>
                
            </div>
        </nav>
    </div>
    <script>
        function toggle(){
            let ul = document.getElementById("myUl");
            ul.classList.toggle("show");
            let ham = document.querySelector(".ham");
            let att = ham.getAttribute("name");
            let at = ( att == "menu-outline") ? "close-outline" : "menu-outline";

            ham.setAttribute("name",at);
        }
    </script>
    ';
?>

