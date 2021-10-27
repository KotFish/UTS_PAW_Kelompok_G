<?php
    if(isset($_POST['register'])){
        include('../db.php');
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //enkripsi password pakai hash
        $email = $_POST['email'];
        $ver_code = rand(100000, 999999);
        $verify = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'")or die(mysqli_error($con)); //buat verif apakah username unik atau engga

        // Multiple recipients
        $to = $email; // note the comma

        // Subject
        $subject = 'Hotelyuk Account Verification';

        // Message
        $message = '
        <html>
            <head>
                <title>Hotelyuk Account Verification</title>
            </head>
            <body>
                <h2>Hello, '.$username.'</h2>
                <p>Welcome to Hotelyuk!, Your satisfy is our priority!</p>
                <h3><b>This is your account verification code : '.$ver_code.'</b></h3>
                <p>Thanks for choosing Hotelkuy!, we will always deliver the best services!</p>
            </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = 'To: '.$username.' '.$email;
        $headers[] = 'From: Hotelyuk <noreply@hotelyuk.com>';

        // Mail it
        // mail($to, $subject, $message, implode("\r\n", $headers));

        if(mysqli_num_rows($verify) == 0){
            //send the message, check for errors
            if (!(mail($to, $subject, $message, implode("\r\n", $headers)))) {
                echo
                '<script>
                    alert("Register Failed");
                    window.history.back()
                </script>';
            } else {
                $query = mysqli_query($con, "INSERT INTO users(username, password, email, verification_code, verification_status)VALUES('$username', '$password', '$email', '$ver_code', 0)") or die(mysqli_error($con)); 
                if ($query) {
                    echo
                    '<script>
                        alert("Register Success, Login and Verify your Account!"); 
                        window.location = "../page/loginPage.php"
                    </script>';
                } else {
                    echo
                    '<script>
                        alert("Register Failed");
                        window.history.back()
                    </script>';
                }
            }
        }else{
            echo
            '<script>
                alert("Username Has Been Taken");
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