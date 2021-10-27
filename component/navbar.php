<?php
    session_start();
    $id = $_GET['id'];
    if ($_SESSION['isLogin'] && $_SESSION['id'] == $id) {
        include('../db.php');
        $queryNavbar = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($con));
        $navbarValue = mysqli_fetch_assoc($queryNavbar);
        echo'
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>User Page</title>

                <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
                <link rel="stylesheet" href="../bootstrap/css/custom.css" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet" />
            </head>

            <body>
                <header class="spacing-sm">
                    <div class="container">
                        <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow-sm bg-white">
                            <a class="brand-text-icon ms-5" href="dashboardPage.php?id='.$id.'" type="link">
                                <span class="text-primary">Hotel</span><span class="text-black">yuk!</span>
                            </a>
                            <div class="collapse navbar-collapse justify-content-end me-5">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link myNavLink';if($page == "Home"){echo' myNavLinkActive';} echo'" type="link" href="dashboardPage.php?id='.$id.'">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link myNavLink';if($page == "MyReservation"){echo' myNavLinkActive';} echo'" type="link" href="listMyReservationPage.php?id='.$id.'">
                                            My Reservation 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a  class="nav-link myNavLink';if($page == "MyProfile"){echo' myNavLinkActive';} echo'" type="link" href="myProfilePage.php?id='.$id.'">
                                            '.$navbarValue['username'].'\'s Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link myNavLink" type="link" href="../process/logoutProcess.php">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
        ';
    }else {
        header("location: ../page/loginPage.php");
    }
?>