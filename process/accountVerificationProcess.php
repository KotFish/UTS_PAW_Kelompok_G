<?php
    if(isset($_POST['verif'])){
        include('../db.php'); 
        $id = $_GET['id'];
        $ver_code = $_POST['verification_code'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($con));
        $user = mysqli_fetch_assoc($query);
        if($user['verification_code'] == $ver_code){
            if($user['verification_status'] == 0){
                $query = mysqli_query($con,
                        "UPDATE users 
                        SET verification_status = 1 WHERE id = '$id'")or die(mysqli_error($con));
                session_start();
                $_SESSION['isLogin'] = true;
                echo
                '<script>
                    window.location = "../page/dashboardPage.php?id='.$user['id'].'"
                </script>';
            }else {
                session_start();
                $_SESSION['isLogin'] = true;
                echo
                '<script>
                    window.location = "../page/dashboardPage.php?id='.$user['id'].'"
                </script>';
            }
        }else{
            echo
            '<script>
                alert("Verification Code Invalid");
                window.history.back()
            </script>';
        }
    }else{
        echo
        '<script>
            window.history.back()
        </script>';
    }
?>