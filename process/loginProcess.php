<?php
    if(isset($_POST['login'])){
        include('../db.php'); 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($con));
        $user = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) == 0){
            echo
            '<script>
                alert("Username not found!");
                window.history.back()
            </script>';
        }else{
            if($user['verification_status'] == 1){
                if(password_verify($password, $user['password'])){
                    session_start();
                    $_SESSION['isLogin'] = true;
                    $_SESSION['id'] = $user['id'];
                    echo
                    '<script>
                        window.location = "../page/dashboardPage.php?id='.$user['id'].'"
                    </script>';
                }else {
                    echo
                    '<script>
                        alert("Username or Password Invalid");
                        window.history.back()
                    </script>';
                }
            }else{
                session_start();
                $_SESSION['id'] = $user['id'];
                echo
                '<script>
                    window.location = "../page/accountVerificationPage.php?id='.$user['id'].'"
                </script>';
            }
        }  
    }else{
        echo
        '<script>
            window.history.back()
        </script>';
    }
?>