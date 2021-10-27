<?php
    session_start();
    if(isset($_GET['id']) && isset($_GET['r_id']) && $_SESSION['id'] == $_GET['id']){
        include ('../db.php');
        $id_user = $_GET['id'];
        $reservasi_id = $_GET['r_id'];
        $queryDelete = mysqli_query($con, "DELETE FROM reservations WHERE id = '$reservasi_id' AND id_user = '$id_user'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
                alert("Delete Success"); window.location = "../page/listMyReservationPage.php?id='.$id_user.'"
            </script>';
        }else{
            echo
            '<script>
                alert("Delete Failed");
                window.history.back()
            </script>';
        }
    }else {
        echo
        '<script>
            window.history.back()
        </script>';
    }
?>