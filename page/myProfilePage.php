<?php
    $page = "MyProfile";
    include '../component/navbar.php'
?>
    <section class="container myContainer mt-5 pt-5" style="padding-top: 30px">
            <div class="d-flex justify-content-center">
                <span class="brand-text-icon text-navy fs-4">My Profile</span>
            </div>
            <div class="d-flex justify-content-center" style="margin-bottom: 30px">
                <span class="text-gray">This page show your profile</span>
            </div>

            <div class="d-flex justify-content-center" style="height: 200px">
                <div class="section align-middle">
                    <?php
                        echo'
                            <a style="font-size: 50px" class="brand-text-icon" href="dashboardPage.php?id='.$id.'" type="link">
                                <span class="text-primary">Hotel</span><span class="text-navy">yuk!</span>
                            </a>
                        ';
                    ?>
                    <div>
                        <span style="font-size: 26px" class="text-navy">Plan Your Next Stay</span>
                    </div>
                </div>
                <div class="vr" style="height: 400px;"></div>
                <div class="section">
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($con));
                        $data = mysqli_fetch_assoc($query);
                        echo '
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input disabled class="form-control" id="username" name="username" aria-describedby="emailHelp" value="'.$data['username'].'">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input disabled type="password" class="form-control" id="password" name="password" value="'.$data['password'].'">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input disabled type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="'.$data['email'].'">
                            </div>
                            <a href="editProfilePage.php?id='.$id.'">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary">Edit My Profile</button>
                                </div>
                            </a>
                        ';
                    ?>
                </div>
            </div>
    </section>
    <script src="../bootstrap/js/custom.js"></script>
    </body>
</html>