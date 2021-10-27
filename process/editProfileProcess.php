<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        $id = $_GET['id'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $check = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'")or die(mysqli_error($con));
        $data_before = mysqli_fetch_assoc($check);

        if($data_before['username'] == $username){
            $query = mysqli_query($con,
            "UPDATE users 
            SET password = '$password', email = '$email' WHERE id = '$id'")or die(mysqli_error($con));
            if($query){
                echo
                '<script>
                    alert("Edit Profile Success"); window.location = "../page/myProfilePage.php?id='.$id.'"
                </script>';
            }else{
                echo
                '<script>
                    alert("Edit Profile Failed");
                    window.history.back()
                </script>';
            }
        }else{
            $verify = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($con)); //buat verif apakah username unik atau engga
            if(mysqli_num_rows($verify) == 0){
                $query = mysqli_query($con,
                "UPDATE users 
                SET username = '$username', password = '$password', email = '$email' WHERE id = '$id'")or die(mysqli_error($con));
                if($query){
                    echo
                    '<script>
                        alert("Edit Profile Success"); window.location = "../page/myProfilePage.php?id='.$id.'"
                    </script>';
                }else{
                    echo
                    '<script>
                        alert("Edit Profile Failed");
                        window.history.back()
                    </script>';
                }
            }else{
                echo
                '<script>
                    alert("Username Has Been Taken");
                    window.history.back()
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