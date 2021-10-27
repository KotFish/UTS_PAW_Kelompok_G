<?php
    $page = "MyReservation";
    include '../component/navbar.php';
?>
    <section class="container myContainer mt-5 pt-5" style="padding-top: 30px">
        <div class="d-flex justify-content-between">
            <span class="brand-text-icon text-navy fs-4">My Reservation</span>
            <?php
                $query = mysqli_query($con, "SELECT * FROM reservations WHERE id_user = '$id'") or die(mysqli_error($con));
                if (mysqli_num_rows($query) != 0) {
                    echo'
                    <a href="addReservationPage.php?id='.$id.'">
                        <button class="btn btn-primary">Add Reservation</button>
                    </a>';
                }
            ?>
        </div>
        <div class="d-flex" style="margin-bottom: 30px">
            <span class="text-gray">This page listing all of your reservation</span>
        </div>

        <div class="d-flex justify-content-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID Booking</th>
                        <th scope="col">Tanggal Booking</th>
                        <th scope="col">Jenis Kamar</th>
                        <th scope="col">Jenis Kasur</th>
                        <th scope="col">Nomor Kamar</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM reservations WHERE id_user = '$id'") or die(mysqli_error($con));
                        if (mysqli_num_rows($query) == 0) {
                            echo '<tr> <td class="text-center" colspan="9">
                                <a href="addReservationPage.php?id='.$id.'">
                                    <button class="btn btn-primary">Add Reservation</button>
                                </a>
                             </td> </tr>';
                        }else{
                            while($data = mysqli_fetch_assoc($query)){
                                echo'
                                <tr>
                                    <th scope="row">'.$data['id'].'</th>
                                    <td>'.$data['tanggal_booking'].'</td>
                                    <td>'.$data['jenis_kamar'].'</td>
                                    <td>'.$data['jenis_kasur'].'</td>
                                    <td>'.$data['nomor_kamar'].'</td>
                                    <td>'.$data['tanggal_masuk'].'</td>
                                    <td>'.$data['tanggal_keluar'].'</td>
                                    <td>'.$data['biaya'].'</td>
                                    <th scope="row">
                                        <a href="../process/deleteMyReservationProcess.php?id='.$id.'&r_id='.$data['id'].'" onClick="return confirm ( \'Are you sure want to delete this reservation?\')">
                                            <div class="btn btn-light"><i style="color: red" class="fa fa-trash"></i></div>
                                        </a>
                                    </td>
                                </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="../bootstrap/js/custom.js"></script>
</body>
</html>