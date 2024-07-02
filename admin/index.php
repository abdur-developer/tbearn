<?php require "admin.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sys_set['name']." - Admin" ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        a {
           text-decoration: none;
        }
        .package{
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        .package th, .package td{
            padding: 12px 15px;
        }
        .package thead tr{
            background-color: #009879;
            color: white;
            text-align: left;
        }
        .package tbody tr{
            border-bottom: 1px solid #dddddd;
        }
        .package tbody tr:nth-of-type(even){
            background-color: #f3f3f3;
        }
        .package tbody tr:last-of-type{
            border-bottom: 2px solid #009879;
        }
        .package tbody tr:hover{
            background-color: #f1f1f1;
        }
        @media (max-width: 600px){
            .package thead{ display: none;}
            .package, .package tbody, .package tr, .package td{
                display: block;
                width: 100%;
            } 
            .package tr{
                margin-bottom: 15px;
            }
            .package td{
                text-align: left;
                padding: 10px 15px;
                position: relative;
                border: none;
                border-bottom: 2px solid #dddddd;
            }
            .package td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }
        }
        </style>
</head>

<body>
    <?php
    if(isset($_REQUEST['error'])){
        $error = $_REQUEST['error'];
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '$error'
                });
        </script>
        ";
    }
    if(isset($_REQUEST['success'])){
        $success = $_REQUEST['success'];
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'WOW...',
                text: '$success'
                });
        </script>
        ";
    }
    ?>
  
    <!-- for header part -->
    <header>

        <div class="logosec">
            <div class="logo"><?= $sys_set['name'] ?></div>
            <img src="../img/menu.png"
                class="icn menuicn" 
                id="menuicn" 
                alt="menu-icon">
        </div>

        <form class="searchbar">
            <input type="number" name="search" placeholder="Search by number">
            <div class="searchbtn">
                <input type="image" src="../img/search.png" class="icn srchicn" width="20px">
            </div>
        </form>
        
        <div class="message">
            <!-- <div class="circle"></div>
            <img src="../img/notification.png" 
                 class="icn" 
                 alt=""> -->
            <div class="dp">
                <a href="?q=profile" class="x">
                    <img src="../img/profile.png" class="dpicn" alt="dp">
                </a>
            </div>
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <a href="../admin" class="nav-option option1">
                        <img src="../img/dashboard.svg"
                            class="nav-img" 
                            alt="dashboard">
                        <h3> Dashboard</h3>
                    </a>

                    <a href="?q=user" class="nav-option option2">
                        <img src="../img/users.png"
                            class="nav-img" 
                            alt="articles">
                        <h3> Users</h3>
                    </a>

                    <a href="?q=withdraw" class="nav-option option3">
                        <img src="../img/withdraw.webp"
                            class="nav-img" 
                            alt="report">
                        <h3> Withdraw</h3>
                    </a>

                    <a href="?q=deposit" class="nav-option option4">
                        <img src="../img/deposit.webp"
                            class="nav-img" 
                            alt="institution">
                        <h3> Deposit</h3>
                    </a>

                    <a href="?q=package" class="nav-option option4">
                        <img src="../img/package.webp"
                            class="nav-img" 
                            alt="institution">
                        <h3> Package</h3>
                    </a>

                    <a href="?q=slider" class="nav-option option4">
                        <img src="../img/transactions.webp"
                            class="nav-img" 
                            alt="institution">
                        <h3> Slider</h3>
                    </a>

                    <a href="?q=profile" class="nav-option option5">
                        <img src="../img/profile.webp"
                            class="nav-img" 
                            alt="blog">
                        <h3> Profile</h3>
                    </a>

                    <a href="?q=setting" class="nav-option option6">
                        <img src="../img/set.avif"
                            class="nav-img" 
                            alt="settings">
                        <h3> Settings</h3>
                    </a>

                    <a href="logout.php" class="nav-option logout">
                        <img src="../img/out.svg"
                            class="nav-img" 
                            alt="logout">
                        <h3>Logout</h3>
                    </a>

                </div>
            </nav>
        </div>
        <div class="main">

            <form class="searchbar2" action="" method="post">
                <input type="number" name="search" class="ed" placeholder="Search by number">
                <div class="searchbtn">
                    <input type="image" src="../img/search.png" class="icn srchicn" width="20px">
                  </div>
            </form>

            

            <?php 
            if(isset($_REQUEST['q'])){
                $q = $_REQUEST['q'];
                if($q == 'user'){
                    include "sec/user.php";
                }elseif($q == 'deposit'){
                    include "sec/deposit.php";
                }elseif($q == 'withdraw'){
                    include "sec/withdraw.php";
                }elseif($q == 'profile'){
                    include "sec/profile.php";
                }elseif($q == 'package'){
                    include "sec/package.php";
                }elseif($q == 'setting'){
                    include "sec/setting.php";
                }elseif($q == 'user_details'){
                    include "sec/user_details.php";
                }elseif($q == 'slider'){
                    include "sec/slider.php";
                }
            }else{
                include "sec/dashboard.php";
            }
            ?>
        </div>
    </div>

    <script>
        let menuicn = document.querySelector(".menuicn");
        let nav = document.querySelector(".navcontainer");

        menuicn.addEventListener("click", () => {
            nav.classList.toggle("navclose");
        })

    </script>
</body>
</html>
