<?php
    session_start();
    $id = $_GET['id'];
    if($_SESSION['id'] == $id){
        include('../db.php');
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($con));
        $user = mysqli_fetch_assoc($query);
        echo'
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Verification Page</title>
        
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
            <link rel="stylesheet" href="../bootstrap/css/custom.css" />
        
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet" />
            <style>
                input::-webkit-outer-spin-button,
                input::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                }
                input[type=number] {
                    -moz-appearance:textfield;
                }
            </style>
        </head>
        <body>
            <header class="spacing-sm">
                <div class="container">
                    <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow-sm bg-white">
                        <a class="brand-text-icon ms-5" href="../index.php" type="link">
                            <span class="text-primary">Hotel</span><span class="text-black">yuk!</span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end me-5">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link myNavLink" type="link" href="../index.php">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link myNavLink" type="link" href="registerPage.php"> Register </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link myNavLink myNavLinkActive" type="link" href="loginPage.php"> Login </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <section class="container myContainer mt-5 pt-5" style="padding-top: 30px">
                <div class="d-flex justify-content-center">
                    <span class="brand-text-icon text-navy fs-4">Account Verification</span>
                </div>
                <div class="d-flex justify-content-center" style="margin-bottom: 30px">
                    <span class="text-gray">Verification code have been send to '.$user['email'].'</span>
                </div>
        
                <div class="d-flex justify-content-center" style="height: 200px">
                    <div class="section align-middle">
                        <a style="font-size: 50px" class="brand-text-icon" href="../index.php" type="link">
                            <span class="text-primary">Hotel</span><span class="text-navy">yuk!</span>
                        </a>
                        <div>
                            <span style="font-size: 26px" class="text-navy">Plan Your Next Stay</span>
                        </div>
                    </div>
                    <div class="vr" style="height: 200px"></div>
                    <div class="section">
                        <form action="../process/accountVerificationProcess.php?id='.$id.'" method="post">
                            <div class="mb-3">
                                <label for="verification_code" class="form-label">Verification Code</label>
                                <input type="number" class="form-control" placeholder="Verification Code" id="verification_code" name="verification_code"
                                    required/>
                            </div>
                            <button type="submit" class="btn btn-primary" name="verif">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
            <script src="../bootstrap/js/custom.js"></script>
        </body>
        </html>';
    }else {
        header("location: ../page/loginPage.php");
    }
?>