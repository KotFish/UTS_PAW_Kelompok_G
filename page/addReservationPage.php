<?php
    $page = "MyReservation";
    include '../component/navbar.php'
?>
    <section class="container myContainer mt-5 pt-5" style="padding-top: 30px">
        <div class="d-flex justify-content-center">
            <span class="brand-text-icon text-navy fs-4">Add Reservation</span>
        </div>
        <div class="d-flex justify-content-center" style="margin-bottom: 30px">
            <span class="text-gray">Please fill up the blank fields below</span>
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
            <div class="vr" style="height: 500px;"></div>
            <div class="section">
                <?php
                    $min_masuk = date("Y-m-d");
                    echo'
                    <form action="../process/createReservationProcess.php?id='.$id.'" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kamar</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kamar" id="jenis_kamar">
                                <option selected value="Standard">Standard</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Superior">Superior</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kasur</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kasur" id="jenis_kasur">
                                <option selected value="Single">Single</option>
                                <option value="Double">Double</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Masuk</label>
                            <input required type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" aria-describedby="emailHelp" min="'.$min_masuk.'" onchange="setMinKeluar()">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Keluar</label>
                            <input required type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" aria-describedby="emailHelp">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="reservation">Tambah Reservasi</button>
                        </div>
                    </form>
                    ';
                ?>
            </div>
        </div>
    </section>
    <script src="../bootstrap/js/custom.js"></script>
    </body>
</html>
