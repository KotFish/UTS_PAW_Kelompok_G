<?php
    if(isset($_POST['reservation'])){
        include('../db.php');
        $id_user = $_GET['id'];
        $tgl_booking = date("Y-m-d");
        $jenis_kamar = $_POST['jenis_kamar'];
        $jenis_kasur = $_POST['jenis_kasur'];
        $no_kamar = rand(1, 200);
        $tgl_masuk = $_POST['tgl_masuk'];
        $tgl_keluar = $_POST['tgl_keluar'];
        $durasi_reservasi = floor((strtotime($tgl_keluar) - strtotime($tgl_masuk)) / (60 * 60 * 24)); //hitung durasi reservasi
        
        //kalkulasi biaya
        if($jenis_kamar == "Standard"){
            $biaya = 1000000;
        }elseif($jenis_kamar == "Deluxe"){
            $biaya = 2000000;
        }else{
            $biaya = 3000000;
        }

        if($jenis_kasur == "Double"){
            $biaya = $biaya + 500000;
        }

        if($durasi_reservasi >= 1){
            $biaya = $biaya * $durasi_reservasi;
        }

        $query = mysqli_query($con,
        "INSERT INTO reservations(id_user, tanggal_booking, jenis_kamar, jenis_kasur, nomor_kamar, tanggal_masuk, tanggal_keluar, biaya)
            VALUES('$id_user', '$tgl_booking', '$jenis_kamar', '$jenis_kasur', '$no_kamar', '$tgl_masuk', '$tgl_keluar', '$biaya')")or die(mysqli_error($con));

        if($query){
            echo
            '<script>
                alert("Reservation Success"); window.location = "../page/listMyReservationPage.php?id='.$id_user.'"
            </script>';
        }else{
            echo
            '<script>
                alert("Reservation Failed");
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