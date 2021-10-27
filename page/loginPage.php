<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In Page</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../bootstrap/css/custom.css" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet" />
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
            <span class="brand-text-icon text-navy fs-4">Log In</span>
        </div>
        <div class="d-flex justify-content-center" style="margin-bottom: 30px">
            <span class="text-gray">Please fill up the blank fields below</span>
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
            <div class="vr"></div>
            <div class="section">
                <form action="../process/loginProcess.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username"
                            aria-describedby="emailHelp" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" placeholder="Password" class="form-control" id="password" name="password"
                            required />
                    </div>
                    <div class="mb-3">
                        <span class="form-text">Don't Have any Account ?<a href="registerPage.php" class="text-navy">
                                Sign Up</a></span>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Sign In</button>
                </form>
            </div>
        </div>
    </section>
    <script src="../bootstrap/js/custom.js"></script>
</body>
</html>